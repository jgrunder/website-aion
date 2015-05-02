<?php

namespace App\Http\Controllers;

use App\Http\Requests\ConnectUserRequest;
use App\Http\Requests\SubscribeUserRequest;
use App\Models\Loginserver\AccountData;
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
    public function createAccount(SubscribeUserRequest $request)
    {
        AccountData::create([
            'name'      => $request->input('username'),
            'password'  => $request->input('password'),
            'email'     => $request->input('email')
        ]);

        return redirect()->route('home')->with('success', 'Your are now subscribe');
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
    public function connect(ConnectUserRequest $request)
    {
        Session::put('connected', true);
        Session::put('user', $request->except('_token'));

        return redirect()->route('home')-with('success', 'Your are now login');
    }

}
