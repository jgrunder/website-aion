<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\Loginserver\AccountData;
use App\Models\Loginserver\AccountVote;
use Carbon\Carbon;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;

class VoteController extends Controller {

    /**
     * GET /stats/online
     *
     * @param $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function index($id)
    {

        $account_id     = Session::get('user.id');
        $toll_per_vote  = Config::get('aion.vote.toll_per_vote');
        $accountVote    = AccountVote::where('account_id', $account_id)
                                     ->where('site', $id)
                                     ->first();

        if($accountVote === null){

            AccountData::where('id', $account_id)->increment('toll', $toll_per_vote);

            AccountVote::create([
                'account_id' => $account_id,
                'site'       => $id,
                'date'       => Carbon::now()
            ]);

        } else {

            $oldDate = Carbon::parse($accountVote->date);

            if($oldDate->diffInHours(Carbon::now()) >= 2){

                AccountData::where('id', $account_id)->increment('toll', $toll_per_vote);

                AccountVote::update('date', Carbon::now())->where('account_id', $account_id);

            } else {
                return redirect(route('home'))->with('error', "You can't vote for this website, you must wait two hours");
            }
        }

        return redirect(route('home'))->with('success', 'You win '.$toll_per_vote.' for the vote');

    }

}
