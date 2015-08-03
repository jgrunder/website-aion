<?php

namespace App\Http\Controllers;

use App\Models\Webserver\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{

    /**
     * GET /admin
     */
    public function index()
    {
        return view('admin.index');
    }

    /**
     * GET /admin/news
     */
    public function news()
    {
        return view('admin.news.index', [
            'news' => News::get()
        ]);
    }

    /**
     * GET /admin/news-delete/{id}
     */
    public function newsDelete($id)
    {
        News::destroy($id);
        return redirect()->back();
    }

    /**
     * GET/POST /admin/news-add/
     */
    public function newsAdd(Request $request)
    {
        if($request->isMethod('post')){

            News::create([
                'title'         => $request->input('title'),
                'slug'          => $request->input('slug'),
                'text'          => $request->input('content'),
                'account_id'    => Session::get('user.id')
            ]);

            return redirect(route('admin.news'));
        }

        return view('admin.news.add');
    }

    /**
     * GET/POST /admin/news-edit/{id}
     */
    public function newEdit(Request $request, $id)
    {
        if($request->isMethod('get')) {
            $news = News::find($id)->first();

            return view ('admin.news.edit', [
                'news' => $news
            ]);

        }
        else {
            News::where('id', '=', $id)->update([
                'title'         => $request->input('title'),
                'slug'          => $request->input('slug'),
                'text'          => $request->input('content')
            ]);

            return redirect(route('admin.news'));
        }
    }

    /**
     * GEt /admin/config
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

}
