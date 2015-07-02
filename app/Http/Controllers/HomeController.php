<?php

namespace App\Http\Controllers;

use App\Models\Webserver\News;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Illuminate\Support\Facades\Lang;

class HomeController extends Controller
{

    /**
     * GET /
     */
	public function index()
	{
        // SEO
        SEOMeta::setTitle(Lang::get('seo.home.title'));
        SEOMeta::setDescription(Lang::get('seo.home.description'));
        OpenGraph::setDescription(Lang::get('seo.home.description'));

		return view('home.index', [
            'news' => News::paginate(3)
        ]);
	}

    /**
     * GET /news/{slug
     */
    public function news($slug)
    {
        $news = News::where('slug', '=', $slug)->get();

        // SEO
        SEOMeta::setTitle(Lang::get('seo.news.title'));


        if($news->count() == 0){
            return redirect(route('home'))->with('error', Lang::get('flashmessage.news.fail_id'));
        }

        SEOMeta::setDescription($news[0]->title);
        OpenGraph::setDescription($news[0]->title);

        return view('home.index', [
            'full' => true,
            'news' => $news
        ]);
    }

}
