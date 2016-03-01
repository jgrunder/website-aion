<?php namespace App\Http\Controllers;

use App\Models\Gameserver\Ladder;
use App\Models\Gameserver\Player;
use App\Models\Loginserver\AccountData;
use App\Models\Loginserver\AccountVote;
use Carbon\Carbon;
use Illuminate\Foundation\Bus\DispatchesCommands;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;

abstract class Controller extends BaseController {

	use DispatchesCommands, ValidatesRequests;

    /**
     * @var $protected
     */
    protected $language;

    /**
     * Set global Variables for ALL view
     */
    public function __construct()
    {
        $this->serversTest();
        $this->accountVotes();
        $this->countPlayersOnline();
        $this->accountReal();
        $this->topVotes();
        $this->topBg();
        $this->getLanguageFromCookie();
    }

    /**
     * Set Variables $countPlayersOnline
     */
    private function countPlayersOnline()
    {
			$count_asmodians  = Player::online()->remember(5)->where('race', '=', 'ASMODIANS')->count();
			$count_elyos 		  = Player::online()->remember(5)->where('race', '=', 'ELYOS')->count();

			View::share('countPlayersOnlineAsmodians', $count_asmodians);
			View::share('countPlayersOnlineElyos', $count_elyos);
    }

    /**
     * Set Variables $accountVotes
     */
    private function accountReal()
    {
        if(Session::has('connected')) {
            $user = AccountData::me(Session::get('user.id'))->first(['real']);
            Session::put('user.real', $user['real']);
        }
        else {
            Session::put('user.real', 0);
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
                        $diff = $date->addHours(2)->subHours(Carbon::now()->hour)->subMinutes(Carbon::now()->minute);
                        $votesAvailable[] = [
                            'id'            => $key,
                            'status'        => false,
                            'diff_hours'    => ($diff->format('g') == 12) ? null : $diff->format('g'),
                            'diff_minutes'  => $diff->format('i')
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
        $voters = AccountData::remember(10)->where('vote', '>', 0)->orderBy('vote', 'DESC')->take(3)->get();
        View::Share('topVotes', $voters);
    }

    /**
     * Set Variables $topBg
     */
    private function topBg()
    {
        $topBg = Ladder::remember(10)->orderBy('rank', 'DESC')->with('name')->take(5)->get();
        View::Share('topBg', $topBg);
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
                $check      = @fsockopen($server['ip'], $server['port'], $errno, $errstr, 1.0);
                $expiresAt  = Carbon::now()->addMinutes(5);

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

    /**
     * Get Language from Cookie
     */
    private function getLanguageFromCookie()
    {
        if (Cookie::has('language')){
            $this->language = Cookie::get('language');
        } else {
            $this->language = 'fr';
        }
    }

}
