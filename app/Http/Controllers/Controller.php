<?php namespace App\Http\Controllers;

use App\Models\Gameserver\Player;
use App\Models\Loginserver\AccountVote;
use App\Models\Loginserver\AccountData;
use Carbon\Carbon;
use Illuminate\Foundation\Bus\DispatchesCommands;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Cache;
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
        $this->countPlayersOnline();
				$this->accountToll();
        $this->topVotes();
    }

    /**
     * Set Variables $countPlayersOnline
     */
    private function countPlayersOnline()
    {
			$count_asmodians = Player::online()->where('race', '=', 'ASMODIANS')->count();
			$count_elyos 		 = Player::online()->where('race', '=', 'ELYOS')->count();
			View::share('countPlayersOnlineAsmodians', $count_asmodians);
			View::share('countPlayersOnlineElyos', $count_elyos);
    }

		/**
     * Set Variables $accountVotes
     */
		private function accountToll()
		{
			if(Session::has('connected')) {
				$user = AccountData::where('id', Session::get('user.id'))->first();
				Session::put('user.toll', $user['toll']);
			}
			else {
				Session::put('user.toll', 0);
			}
		}

    /**
     * Set Variables $accountVotes
     */
    private function accountVotes()
    {
        if(Session::has('connected')) {
            $accountId      = Session::get('user.id');
            $votesInConfig  = Config ::get('aion.vote.links');
            $votesAvailable = [];

            foreach ($votesInConfig as $key => $value) {
                $vote = AccountVote::where('account_id', $accountId)->where('site', $key)->first();

                if ($vote === null) {
                    $votesAvailable[] = [
                        'id'     => $key,
                        'status' => true
                    ];
                } else {
                    $date = Carbon::parse($vote->date);
                    if ($date->diffInHours(Carbon::now()) >= 2) {
                        $votesAvailable[] = [
                            'id'     => $key,
                            'status' => true
                        ];
                    } else {
                        $votesAvailable[] = [
                            'id'     => $key,
                            'status' => false,
                            'diff'	 => Carbon::now()->diffForHumans($date)// TODO : Not sure ...
                        ];
                    }
                }

            }

            View::share('accountVotes', $votesAvailable);
        }
    }

    /**
     * Set Variables $topVotes
     */
    private function topVotes()
    {
        $voters = AccountData::where('vote', '>', 0)->orderBy('vote', 'DESC')->take(3)->get();
        View::Share('topVotes', $voters);
    }

    /**
     * Set Variables $serversStatus
     */
    private function serversTest()
    {
        $servers        = Config::get('aion.servers');
        $serversStatus  = [];

        foreach ($servers as $key => $server) {

            if(Cache::has('status.'.$key)){
                $serversStatus[] = [
                    'name'   => $key,
                    'status' => Cache::get('status.'.$key)
                ];
            } else {
                $check = @fsockopen($server['ip'], $server['port'], $errno, $errstr, 1.0);

                $expiresAt = Carbon::now()->addMinutes(5);

                Cache::put('status.'.$key, ($check) ? true : false, $expiresAt);

                $serversStatus[] = [
                    'name'   => $key,
                    'status' => ($check) ? true : false
                ];

                @fclose($check);
            }

        }

        View::share('serversStatus', $serversStatus);
    }

}
