<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateAccount;
use Illuminate\Http\Request;
use App\LogActivity;
use App\Subscription;
use App\Billing;
use App\BillingMethod;
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
        $subscription = Subscription::GetInfosUser();
        $billing = Billing::GetInfosUser();
        return view('account')->with('subscription', $subscription)->with('billing', $billing);
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
        return view('/account');
    }

    public function subscription()
    {
        $formulas = Subscription::all();
        return view('subscription')->with('formulas', $formulas);
    }

    public function unsub()
    {
        $user = Auth::user();
        $user->subscription_id = null;
        $user->save();
        $billing = Billing::unsub();
        return redirect('account');
    }

    public function payment(Request $request)
    {
        $user = Auth::user();

        $billing_method = BillingMethod::create($request->input('type'));
        $billing_method->save();
        $billing = Billing::create($request->input('formula'), $user->id, $billing_method->id);
        $billing->save();
        $user->subscription_id = $request->input('formula');
        $user->billing_method_id = $billing_method->id;
        $user->save();
        $subscription = Subscription::GetInfosUser();
        $billing = Billing::GetInfosUser();
        return view('account')->with('subscription', $subscription)->with('billing', $billing);
    }

    public function log()
    {
        $user = Auth::user();
        $userlogs = LogActivity::where('user_id', $user->id)->orderBy('id', 'desc')->get();
        return view('log')->with('userlogs', $userlogs);
    }
}
