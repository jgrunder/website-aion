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

        if(Session::has('connected')){
            $this->accountVotes();
        }

    }

    /**
     * Set Variables $accountVotes
     */
    private function accountVotes()
    {
        $accountId      = Session::get('user.id');
        $votesInConfig  = Config::get('aion.vote.links');
        $votesAvailable = [];

        foreach($votesInConfig as $key => $value){
            $vote = AccountVote::where('account_id', $accountId)->where('site', $key)->first();
            $date = Carbon::parse($vote->date);

            if($vote === null){
                $votesAvailable[] = [
                    'id'      => $key,
                    'status'  => true
                ];
            } else {

                if($date->diffInHours(Carbon::now()) >= 2){
                    $votesAvailable[] = [
                        'id'      => $key,
                        'status'  => true
                    ];
                } else {
                    $votesAvailable[] = [
                        'id'      => $key,
                        'status'  => false
                    ];
                }
            }

        }

        View::share('accountVotes', $votesAvailable);
    }

}
