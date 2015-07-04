<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Config;

class LanguageController extends Controller
{

    /**
     * GET /language/{language}
     *
     * @param $language
     *
     * @return $this
     */
    public function change($language)
    {
        // Check if we have this language
        foreach(Config::get('aion.languages') as $languageConfig) {

            if($languageConfig === $language) {
                return redirect(route('home'))->withCookie(cookie()->forever('language', $language));
            }

        }

        return redirect()->back()->with('error', "This language is not support yet");


    }

}
