<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\LogActivity;
use App\Movie;
use App\Http\API\ImageHelper;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function username()
    {
        return 'login';
    }

    protected function authenticated(\Illuminate\Http\Request $request, $user)
    {

        LogActivity::create([
            'ip' => $request->getClientIp(),
            'user_id' => $user->id
        ]);
    }

    public function showLoginForm()
    {
        $news = Movie::getNews();
        $images = new ImageHelper();
        return view('auth.login')->with('news', $news)->with('images', $images);
    }
}
