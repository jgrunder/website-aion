<?php

namespace App\Http\Controllers;

use App\Models\Webserver\News;
use Artesaos\SEOTools\Facades\SEOMeta;

class HomeController extends Controller
{

    /**
     * GET /
     */
	public function index()
	{
        // SEO
        SEOMeta::setTitle('Accueil');

		return view('home.index', [
            'news' => News::all()
        ]);
	}

    /**
     * GET /news/{slug
     */
    public function news($slug)
    {
        $news = News::where('slug', '=', $slug)->get();

        // SEO
        SEOMeta::setTitle('Article');
        SEOMeta::setDescription($news[0]->title);

        if($news->count() == 0){
            return redirect(route('home'))->with('error', "L'article que vous demandez n'existe pas");
        }

        return view('home.index', [
            'full' => true,
            'news' => $news
        ]);
    }

}
