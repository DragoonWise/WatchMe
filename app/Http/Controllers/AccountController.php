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
        $user->login = Request::input('login');
        $user->email = Request::input('email');
        if (!Request::input('password') == '') {
            $user->password = Hash::make(Request::input('password'));
        }
        $user->save();
        return redirect('/account');
    }
}
