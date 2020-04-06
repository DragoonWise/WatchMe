<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateAccount;
use App\LogActivity;
use App\Subscription;
use Auth;
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
        if ($request->has("update")) {
            $user->login = $request->input('login');
            $user->email = $request->input('email');
            if ($request->filled('password')) {
                $user->password = Hash::make($request->input('password'));
            }
        }
        if ($request->has("parental_control_hidden")) {
            if ($request->input('parental_control') == null) {
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
        $formulas = Subscription::all();
        return view('subscription')->with('formulas', $formulas);
    }

    public function paiement()
    {

        return view('account');
    }

    public function log()
    {
        $user = Auth::user();
        $userlogs = LogActivity::where('user_id', $user->id)->orderBy('id', 'desc')->get();
        return view('log')->with('userlogs', $userlogs);
    }
}
