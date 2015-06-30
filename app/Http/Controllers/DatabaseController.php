<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Support\Facades\Cache;

class DatabaseController extends Controller {

    /**
     * GET /database/item/{id}
     */
    public function item($id)
    {
      $key = 'item_'.$id;

      if(Cache::has($key)){
          echo Cache::get($key);
      } else {

        $value = file_get_contents('http://aiondatabase.net/tip.php?id=item--'.$id.'&l=fr&nf=on');
        $value = str_replace('src="/', 'src="http://aiondatabase.net/', $value);

        Cache::forever('item_'.$id, $value);

        echo $value;
      }
    }

}
