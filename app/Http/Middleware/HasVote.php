<?php namespace App\Http\Middleware;

use App\Models\Loginserver\AccountData;
use App\Models\Loginserver\AccountVote;
use Carbon\Carbon;
use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;

class HasVote {

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Session::has('connected')){

            $accountId      = Session::get('user.id');
            $votesInConfig  = Config ::get('aion.vote.links');
            $realPerVote    = (!Config::get('aion.vote.boost')) ? Config::get('aion.vote.real_per_vote') : Config::get('aion.vote.real_per_vote') + 50;
            $referer        = $request->headers->get('referer');

            foreach ($votesInConfig as $key => $value) {
                if($referer === $value['referer']){
                    $vote = AccountVote::where('account_id', $accountId)->where('add', 0)->where('site', $key)->first();

                    if($vote){
                        AccountData::IncrementVoteCount($accountId);
                        AccountData::AddReal($accountId, $realPerVote);
                        AccountVote::where('account_id', $accountId)->where('add', 0)->where('site', $key)->update(['add' => 1]);
                    }

                }
            }

        }

        return $next($request);
    }

}
