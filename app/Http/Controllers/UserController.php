<?php

namespace App\Http\Controllers;

use App\Http\Requests\ConnectUserRequest;
use App\Http\Requests\SubscribeUserRequest;
use App\Models\Loginserver\AccountData;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{

	/**
	 * GET /user/subscribe
	 */
    public function subscribe()
    {
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
        Session::flush();

        return redirect(route('home'))->with('success', 'Vous êtes maintenant déconnecté');
    }

    /**
     * GET /user/acount
     */
    public function account()
    {
        return view('user.account', [
            'user' => Session::get('user')
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
