<?php

namespace App\Http\Controllers;

use App\Models\Loginserver\AccountData;

class HomeController extends Controller
{

    /**
     * GET /
     */
	public function index()
	{
		return view('home.index', [
            'users' => AccountData::all()
        ]);
	}

}
