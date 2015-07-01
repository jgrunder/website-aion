<?php

namespace App\Http\Controllers;

use App\Http\Requests\ConnectUserRequest;
use App\Http\Requests\SubscribeUserRequest;
use App\Models\Loginserver\AccountData;
use App\Models\Gameserver\Player;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Session;
use Artesaos\SEOTools\Facades\SEOMeta;

class UserController extends Controller
{

	/**
	 * GET /user/subscribe
	 */
    public function subscribe()
    {
        // SEO
        SEOMeta::setTitle(Lang::get('seo.subscribe.title'));

        return view('user.subscribe');
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

        return redirect()->route('user.account')->with('success', 'Vous êtes maintenant inscrit et connecté');

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
            return redirect(route('user.account'))->with('success', 'Vous êtes maintenant connecté');
        } else {
            return redirect(route('home'))->with('error', 'Votre compte n\'existe pas')->withInput();
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

        return redirect(route('home'))->with('success', 'Vous êtes maintenant déconnecté');
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
    }

}
