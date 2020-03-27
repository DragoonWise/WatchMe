<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateAccount;
use Auth;
use Request;
use Hash;
use DB;

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
        $formulas = DB::table('subscriptions')->select('id', 'formula', 'description', 'plan_id', 'amount')->get();
        return view('subscription')->with('formulas', $formulas);
    }

    public function log()
    {
        $user = Auth::user();
        $userlogs = DB::table('log_activities')->select('ip', 'created_at')->where('user_id', $user->id)->orderBy('id', 'desc')->get();
        return view('log')->with('userlogs', $userlogs);
    }
}
