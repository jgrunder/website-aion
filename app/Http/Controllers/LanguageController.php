<?php

namespace App\Http\Controllers;

class LanguageController extends Controller
{

    /**
     * GET /language
     */
    public function change($language)
    {
        return redirect(route('home'))->withCookie(cookie()->forever('language', $language));
    }

}
