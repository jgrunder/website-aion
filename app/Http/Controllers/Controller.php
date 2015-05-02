<?php namespace App\Http\Controllers;

use App\Models\Loginserver\AccountVote;
use Carbon\Carbon;
use Illuminate\Foundation\Bus\DispatchesCommands;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;

abstract class Controller extends BaseController {

	use DispatchesCommands, ValidatesRequests;

    /**
     * Set global Variables for ALL view
     */
    public function __construct()
    {
        $this->serversTest();
        $this->accountVotes();
    }

    /**
     * Set Variables $accountVotes
     */
    private function accountVotes()
    {
        if(Session::has('connected')) {
            $accountId = Session::get('user.id');
            $votesInConfig = Config::get('aion.vote.links');
            $votesAvailable = [];

            foreach ($votesInConfig as $key => $value) {
                $vote = AccountVote::where('account_id', $accountId)->where('site', $key)->first();
                $date = Carbon::parse($vote->date);

                if ($vote === null) {
                    $votesAvailable[] = [
                        'id'     => $key,
                        'status' => true
                    ];
                } else {

                    if ($date->diffInHours(Carbon::now()) >= 2) {
                        $votesAvailable[] = [
                            'id'     => $key,
                            'status' => true
                        ];
                    } else {
                        $votesAvailable[] = [
                            'id'     => $key,
                            'status' => false
                        ];
                    }
                }

            }

            View::share('accountVotes', $votesAvailable);
        }
    }

    /**
     * Set Variables $serversStatus
     */
    private function serversTest()
    {
        $servers        = Config::get('aion.servers');
        $serversStatus  = [];

        foreach ($servers as $key => $server) {
            $check = @fsockopen($server['ip'], $server['port'], $errno, $errstr, 1.0);

            $serversStatus[$key] = ($check) ? true : false;

            @fclose($check);
        }

        View::share('serversStatus', $serversStatus);
    }

}
