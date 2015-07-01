<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Artesaos\SEOTools\Facades\SEOMeta;

class PageController extends Controller {

    /**
     * GET /page/contactus
     */
    public function contactUs()
    {
        // SEO
        SEOMeta::setTitle('Contactez-nous');
        SEOMeta::setDescription('Un problème sur le serveur ? Venez nous en parler nous sommes ouverts à toutes discussions.');

        return view('page.contactus');
    }

    /**
     * GET /page/join-us
     */
    public function joinUs()
    {
        // SEO
        SEOMeta::setTitle('Nous rejoindre');
        SEOMeta::setDescription('Vous souhaitez nous rejoindre ? Pas de soucis, cette page vous explique pas à pas comment rejoindre le serveur RealAion !');

        return view('page.joinus');
    }

    /**
     * GET /page/teamspeak
     */
    public function teamspeak()
    {
        // SEO
        SEOMeta::setTitle('Teamspeak');
        SEOMeta::setDescription('Venez discuter sur notre serveur Teamspeak 3.');

        return view('page.teamspeak');
    }

    /**
     * GET /page/rules
     */
    public function rules()
    {
        // SEO
        SEOMeta::setTitle('Règlement');
        SEOMeta::setDescription('Retrouvez le règlement du serveur et gardez-le en tête pour éviter de futur problème.');

        return view('page.rules');
    }

    /**
     * GET /page/rules
     */
    public function team()
    {
        // SEO
        SEOMeta::setTitle('Equipe du serveur');
        SEOMeta::setDescription('Le serveur RealAion ne vit que grâce à ses bénévoles qui sont présents pour vous aider en cas de besoin !');

        return view('page.team');
    }

    /**
     * GET /page/error
     */
    public function error()
    {
        // SEO
        SEOMeta::setTitle('Erreur');
        SEOMeta::setDescription("Vous vous trouvez actuellement sur une page qui n'existe pas ou qui a été supprimée.");

        return view('page.error');
    }

    /**
     * GET /page/rates
     */
    public function rates()
    {
        // SEO
        SEOMeta::setTitle('Rates');
        SEOMeta::setDescription("Retrouvez les informations à propos du serveur Realaion comme les rates du serveur.");

        return view('page.rates');
    }

}
