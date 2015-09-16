<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\Loginserver\AccountData;
use App\Models\Loginserver\AccountVote;
use Carbon\Carbon;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Session;

class VoteController extends Controller {

    /**
     * GET /vote/{id}
     *
     * @param $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function index($id)
    {

        $accountId      = Session::get('user.id');
        $realPerVote    = Config::get('aion.vote.real_per_vote');
        $votesLinks     = Config::get('aion.vote.links');
        $accountVote    = AccountVote::where('account_id', $accountId)
                                     ->where('site', $id)
                                     ->first();

        if($accountVote === null){

            AccountData::AddNewVote($accountId);
            AccountData::AddReal($accountId, $realPerVote);

            AccountVote::create([
                'account_id' => $accountId,
                'site'       => $id,
                'date'       => Carbon::now()
            ]);

        } else {

            $oldDate = Carbon::parse($accountVote->date);

            if($oldDate->diffInHours(Carbon::now()) >= 2){

                AccountData::AddNewVote($accountId);
                AccountData::AddReal($accountId, $realPerVote);

                AccountVote::where('account_id', $accountId)->where('site', $id)->update(['date' => Carbon::now()]);

            } else {
                return redirect(route('home'))->with('error', Lang::get('flashmessage.vote.wait_time'));
            }
        }

        return redirect($votesLinks[$id]['link']);

    }

}
