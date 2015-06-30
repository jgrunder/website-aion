<?php

namespace App\Http\Controllers;

use App\Models\Webserver\News;

class HomeController extends Controller
{

    /**
     * GET /
     */
	public function index()
	{
		return view('home.index', [
        'news' => News::all()
    ]);
	}

}
