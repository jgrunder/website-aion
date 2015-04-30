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
}
