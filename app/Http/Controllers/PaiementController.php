<?php

namespace App\Http\Controllers;

use App\Events\UserWasPurchasedShopPoint;
use App\Models\Loginserver\AccountData;
use App\Models\Webserver\LogsAllopass;
use App\Models\Webserver\LogsPaypal;
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

                    AccountData::me(Session::get('user.id'))->increment('points', Config::get('aion.allopass.pointsGiven'));
                    event(new UserWasPurchasedShopPoint(Session::get('user.id')));
                    return redirect(route('allopass'))->with('success', "Votre compte a été crédité de ".Config::get('aion.allopass.pointsGiven'));

                }

                return redirect(route('allopass'))->with('error', "Une erreur c'est produite. Merci de contacter un administrateur");

            }

            return redirect(route('allopass'))->with('error', 'Votre code allopass a déjà été utilisé');


        }

        return redirect(route('allopass'))->with('error', 'Code invalide. Merci de contacter un administrateur');

    }

    /**
     * GET /paypal
     */
    public function paypal()
    {
        return view('paiement.paypal', [
            'step' => 1,
            'uid'  => Session::get('user.id')
        ]);
    }

    /**
     * GET /paypal-ipn
     */
    public function paypalIpn()
    {

        $emailAccount   = Config::get('aion.paypal.email');
        $req            = 'cmd=_notify-validate';

        foreach ($_POST as $key => $value) {
            $value = urlencode(stripslashes($value));
            $req .= "&$key=$value";
        }

        $header = "POST /cgi-bin/webscr HTTP/1.0\r\n";
        $header .= "Host: www.paypal.com\r\n";
        $header .= "Content-Type: application/x-www-form-urlencoded\r\n";
        $header .= "Content-Length: " . strlen($req) . "\r\n\r\n";
        $fp = fsockopen('ssl://www.paypal.com', 443, $errno, $errstr, 30);

        $item_name        = $_POST['item_name'];
        $item_number      = $_POST['item_number'];
        $payment_status   = $_POST['payment_status'];
        $payment_amount   = $_POST['mc_gross'];
        $payment_tax      = $_POST['tax'];
        $payment_ht       = $payment_amount - $payment_tax;
        $payment_currency = $_POST['mc_currency'];
        $address          = $_POST['address_street'];
        $country          = $_POST['address_country'];
        $city             = $_POST['address_city'];
        $name             = $_POST['address_name'];
        $txn_id           = $_POST['txn_id'];
        $receiver_email   = $_POST['receiver_email'];
        $payer_email      = $_POST['payer_email'];
        parse_str($_POST['custom'],$custom);

        if($fp){
            fputs ($fp, $header . $req);
            while (!feof($fp)) {
                $res = fgets ($fp, 1024);
                if (strcmp ($res, "VERIFIED") == 0) {

                    // Check the payment status
                    if ($payment_status == "Completed") {

                        // Check if it's RealAion who win money
                        if ($emailAccount == $receiver_email) {

                            $reals  = $custom['reals'];
                            $uid    = $custom['uid'];

                            // Check if it's the good payment number
                            if($payment_ht = $reals / 5000) {

                                // Increment tolls
                                AccountData::me($uid)->increment('real', $reals);

                            }
                        }
                    }

                    // Add logs in database
                    LogsPaypal::create([
                        'id_account' => $uid,
                        'price'	     => $payment_ht,
                        'status'     => $payment_status,
                        'tax'	       => $payment_tax,
                        'email'	     => $payer_email,
                        'txnid'      => $txn_id,
                        'amount'     => $reals,
                        'name'       => $name,
                        'country'    => $country,
                        'city'	     => $city,
                        'address'    => $address
                    ]);

                    event(new UserWasPurchasedShopPoint($uid));

                }
            }
        }


    }

    /**
     * GET /paypal-valid
     */
    public function paypalValid()
    {
        return view('paiement.paypal', [
            'step' => 2
        ]);
    }

}
