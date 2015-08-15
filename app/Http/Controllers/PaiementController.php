<?php

namespace App\Http\Controllers;

use App\Models\Loginserver\AccountData;
use App\Models\Webserver\LogsAllopass;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Session;

class PaiementController extends Controller {

    /**
     * GET /user/allopass
     */
    public function allopass()
    {
        return view('paiement.allopass');
    }

    /**
     * GET /allopass/success
     */
    public function allopassSuccess(Request $request)
    {
        $recall = htmlentities($request::input('RECALL'));
        $datas  = htmlentities($request::input('DATAS'));

        // Recall is empty so redirect with error message
        if(trim($recall) == ""){
            return redirect(route('allopass'))->with('error', 'Paramètres allopass invalident');
        }

        // Contain the allopass code
        $recall = urlencode($recall);

        // Code of the document Allopass
        $auth = urlencode(Config::get('aion.allopass.documentId'));

        // Read status
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_HEADER, 0);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_URL, "http://payment.allopass.com/api/checkcode.apu?code=$recall&auth=$auth");

        $r = curl_exec($curl);
        curl_close($curl);

        if (substr($r, 0, 2) == 'OK') {

            // Check if code is in our database
            if (LogsAllopass::check($recall) === null){

                if (LogsAllopass::insert($recall, Session::get('user.id')) !== null) {

                    AccountData::where('id', Session::get('user.id'))->increment('toll', Config::get('aion.allopass.tollGiven'));
                    return redirect(route('allopass'))->with('success', "Votre compte a été crédité de ".Config::get('aion.allopass.tollGiven')." toll");

                }
                else {
                    return redirect(route('allopass'))->with('error', "Une erreur c'est produite. Merci de contacter un administrateur");
                }

            }
            else {
                return redirect(route('allopass'))->with('error', 'Votre code allopass a déjà été utilisé');
            }

        }
        else {
            return redirect(route('allopass'))->with('error', 'Code invalide. Merci de contacter un administrateur');
        }

    }

}
