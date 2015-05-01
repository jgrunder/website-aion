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

}
