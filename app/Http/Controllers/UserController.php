<?php

namespace App\Http\Controllers;

use App\Http\Requests\ConnectUserRequest;
use App\Http\Requests\SubscribeUserRequest;
use App\Models\Gameserver\Player;
use App\Models\Loginserver\AccountData;
use App\Models\Webserver\Pages;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{

	/**
	 * GET /user/subscribe
	 */
    public function subscribe()
    {
        // SEO
        SEOMeta::setTitle(Lang::get('seo.subscribe.title'));

        $content = Pages::where('page_name', '=', 'teamspeak')->first([$this->language]);

        return view('user.subscribe', [
            'content' => $content[$this->language]
        ]);
    }

    /**
     * POST /user/subscribe
     *
     * @param SubscribeUserRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function createAccount(SubscribeUserRequest $request)
    {
        // SEO
        SEOMeta::setTitle(Lang::get('seo.subscribe.title'));

        $user = AccountData::create([
                'name'      => $request->input('username'),
                'pseudo'    => $request->input('pseudo'),
                'password'  => base64_encode(sha1($request->input('password'), true)),
                'email'     => $request->input('email')
        ]);

        $this->createSession($user);

        return redirect()->route('user.account')->with('success', Lang::get('flashMessage.user.subscribe_and_logged'));

    }

    /**
     * GET /user/login
     */
    public function login()
    {
        // SEO
        SEOMeta::setTitle(Lang::get('seo.login.title'));

        return view('user.login');
    }

    /**
     * POST /user/login
     *
     * @param ConnectUserRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function connect(ConnectUserRequest $request)
    {
        // SEO
        SEOMeta::setTitle(Lang::get('seo.login.title'));

        $user = AccountData::activated()
                ->where('name', $request->get('username'))
                ->where('password', base64_encode(sha1($request->get('password'), true)))
                ->first();

        if($user !== null){
            $this->createSession($user);
            return redirect(route('user.account'))->with('success', Lang::get('flashMessage.user.logged'));
        } else {
            return redirect(route('home'))->with('error', Lang::get('flashMessage.user.no_account'))->withInput();
        }

    }

    /**
     * GET /user/logout
     */
    public function logout()
    {
        // SEO
        SEOMeta::setTitle(Lang::get('seo.logout.title'));

        Session::flush();

        return redirect(route('home'))->with('success', Lang::get('flashMessage.user.logout'));
    }

    /**
     * GET /user/acount
     */
    public function account()
    {
        // SEO
        SEOMeta::setTitle(Lang::get('seo.account.title'));

        $players = Player::where('account_id', '=', Session::get('user.id'))->get();

        return view('user.account', [
            'user'      => Session::get('user'),
            'players'   => $players
        ]);
    }

    /**
     * Create Session with information
     *
     * @param $user
     */
    private function createSession($user)
    {
        Session::put('connected', true);
        Session::put('user.id', $user->id);
        Session::put('user.name', $user->name);
        Session::put('user.pseudo', $user->pseudo);
        Session::put('user.email', $user->email);
        Session::put('user.access_level', $user->access_level);
    }

}
