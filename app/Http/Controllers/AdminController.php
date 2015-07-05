<?php

namespace App\Http\Controllers;

use App\Models\Webserver\News;

class AdminController extends Controller
{

    /**
     * GET /admin
     */
    public function index()
    {
        return view('admin.index');
    }

    /**
     * GET /admin/news
     */
    public function news()
    {
        return view('admin.news', [
            'news' => News::get()
        ]);
    }

    /**
     * GEt /admin/news-delete/{id}
     */
    public function newsDelete($id)
    {
        News::destroy($id);
        return redirect()->back();
    }

}
