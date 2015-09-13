<?php

namespace App\Http\Controllers;

use App\Models\Gameserver\Player;
use App\Models\Loginserver\AccountData;
use App\Models\Webserver\LogsAllopass;
use App\Models\Webserver\News;
use App\Models\Webserver\Pages;
use App\Models\Webserver\ShopCategory;
use App\Models\Webserver\ShopHistory;
use App\Models\Webserver\ShopItem;
use App\Models\Webserver\ShopSubCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class AdminController extends Controller
{

    /**
     * GET /admin/config
     */
    public function config(Request $request)
    {
        if($request->isMethod('post')) {
            $configs = $request->except('_token');

            foreach ($configs as $key => $value) {
                $keyReplace = str_replace('aion_', 'aion.', $key);
                Config::set($keyReplace, $value);
            }

        }

        return view('admin.config', [
            'configs' => Config::get('aion')
        ]);
    }

    /**
     * GET /admin/logs/{name}
     */
    public function logs($name)
    {
        $logsConfig      = Config::get('aion.logs');
        $logsPath        = $logsConfig['path'];
        $logsFiles       = $logsConfig['files'];
        $userAccessLevel = Session::get('user.access_level');

        foreach ($logsFiles as $key => $value) {

            // Check if the name are in the config
            if ($name.$value['extension'] == $value['file'].$value['extension']) {

                // Check User accessLevel
                if ($userAccessLevel >= $value['access_level']){

                    // Check if file exist
                    if (file_exists($logsPath.$value['file'].$value['extension'])){

                        $logContent = "";
                        $handle     = @fopen($logsPath.$value['file'].$value['extension'], "r");

                        if ($handle) {
                            while (($buffer = fgets($handle, 4096)) !== false) {
                                $logContent .= $buffer;
                            }
                            fclose($handle);
                        }

                        return view('admin.logs', [
                            'logName'      => $name,
                            'logExtension' => $value['extension'],
                            'logContent'   => $logContent
                        ]);

                    }

                }

            }
        }

        return redirect(route('admin'));
    }

    /**
     * POST /admin/search
     */
    public function search(Request $request)
    {
        $searchValue = $request->input('search_value');
        $searchType  = $request->input('search_type');

        switch ($searchType){
            case 'character':
                $results = Player::where('name', 'LIKE', '%'.$searchValue.'%')->paginate(15);
                break;
            case 'shop_item':
                $results = ShopItem::where('name', 'LIKE', '%'.$searchValue.'%')->paginate(15);
                break;
            default:
                $results = Player::where('name', 'LIKE', '%'.$searchValue.'%')->paginate(15);
                break;

        }

        return view('admin.search', [
            'searchType' => $searchType,
            'results'    => $results
        ]);

    }

    /**
     * GET /admin/allopass
     */
    public function allopass()
    {
        return view('admin.allopass', [
           'allopass' => LogsAllopass::orderBy('created_at', 'DESC')->get()
        ]);
    }

    /**
     * GET/POST /admin/page/{$name}
     */
    public function pageEdit(Request $request, $name)
    {

        if ($request->isMethod('POST')){
            Pages::where('page_name', '=', $name)->update([
                'fr'     => $request->input('fr'),
                'en'     => $request->input('en')
            ]);
        }

        $page = Pages::where('page_name', '=', $name)->first();

        return view('admin.page', [
           'page' => $page
        ]);
    }

}
