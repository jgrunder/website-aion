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

        $accountId     = Session::get('user.id');
        $tollPerVote    = Config::get('aion.vote.toll_per_vote');
        $accountVote    = AccountVote::where('account_id', $accountId)
                                     ->where('site', $id)
                                     ->first();

        if($accountVote === null){

            AccountData::Vote($accountId, $tollPerVote);

            AccountVote::create([
                'account_id' => $accountId,
                'site'       => $id,
                'date'       => Carbon::now()
            ]);

        } else {

            $oldDate = Carbon::parse($accountVote->date);

            if($oldDate->diffInHours(Carbon::now()) >= 2){

                AccountData::Vote($accountId, $tollPerVote);

                AccountVote::update('date', Carbon::now())->where('account_id', $accountId);

            } else {
                return redirect(route('home'))->with('error', "You can't vote for this website, you must wait two hours");
            }
        }

        return redirect(route('home'))->with('success', 'You win '.$tollPerVote.' for the vote');

    }

}
