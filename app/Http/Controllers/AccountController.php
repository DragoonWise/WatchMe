<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateAccount;
use Auth;
use Request;
use Hash;

class AccountController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function account()
    {
        return view('account');
    }

    public function update(UpdateAccount $request)
    {
        $user = Auth::user();
        if (Request::has("update")) {
            $user->login = Request::input('login');
            $user->email = Request::input('email');
            if ($request->filled('password')) {
                $user->password = Hash::make(Request::input('password'));
            }
        }
        if (Request::has("parental_control_hidden")) {
            if (Request::input('parental_control') == null) {
                $user->parental_control = 0;
            } else {
                $user->parental_control = 1;
            }
        }
        $user->save();
        return redirect('/account');
    }

    public function subscription()
    {
        return view('subscription');
    }

    public function log()
    {
        return view('log');
    }
}
