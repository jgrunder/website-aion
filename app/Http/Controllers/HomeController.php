<?php

namespace App\Http\Controllers;

use App\Models\Loginserver\AccountData;

class HomeController extends Controller
{

	public function index()
	{
		return view('home.index', [
            'users' => AccountData::all()
        ]);
	}

}
