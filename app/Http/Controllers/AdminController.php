<?php

namespace App\Http\Controllers;

class AdminController extends Controller
{

    /**
     * GET /admin
     */
    public function index()
    {
        return view('admin.index');
    }

}
