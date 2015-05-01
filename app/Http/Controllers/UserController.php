<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{

	/**
	 * GET /user/subscribe
	 */
    public function subscribe()
    {
        return view('user.subscribe');
    }

    /**
	 * POST /user/subscribe
	 */
    public function createAccount(Request $request)
    {
    	dd($request->all());
    }

    /**
     * GET /user/login
     */
    public function login()
    {
        return view('user.login');
    }

    /**
     * POST /user/login
     */
    public function connect(Request $request)
    {
        dd($request->all());
    }

}
