<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

class UserController extends BaseController
{
    /**
     * ROUTE : GET /user/subscribe
     * Subscribe Page
     */
    public function subscribe()
    {
        return view('user.subscribe');
    }

    /**
     * ROUTE : GET /user/login
     * Login Page
     */
    public function login()
    {
        return view('user.login');
    }

}
