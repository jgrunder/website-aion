<?php

namespace App\Http\Controllers;

use App\Http\Requests;

class PaiementController extends Controller {

    /**
     * GET /user/allopass
     */
    public function allopass()
    {
        return view('paiement.allopass');
    }

}
