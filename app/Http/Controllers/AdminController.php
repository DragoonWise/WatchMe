<?php

namespace App\Http\Controllers;

use App\Http\API\ImageHelper;
use App\Http\Requests\AdminUpdateAccount;
use App\Movie;
use App\Subscription;
use Illuminate\Http\Request;
use App\User;

class AdminController extends Controller
{

    /**
     * Dashboard
     *
     * @return View
     */
    public function dashboard()
    {
        $movies = Movie::getNews();
        // dd($movie);
        return view('admin/dashboard', ['movies' => $movies, 'imgHelper' => new ImageHelper()]);
    }

    /**
     * Users List
     *
     * @return View
     */
    public function users()
    {
        $users = User::withTrashed()->paginate(15);

        return view('admin/users', ['users' => $users]);
    }

    /**
     * User Detail
     *
     * @param  int  $id
     * @return View
     */
    public function user($id)
    {
        $user = User::find($id);
        $sub = Subscription::all();
        return view('admin/user', ['user' => $user, 'sub' => $sub]);
    }

    /**
     * Method Post on User Detail
     */
    public function userupdate(AdminUpdateAccount $request)
    {
        $user = User::find($request->input('id'));
        if ($request->has("update")) {
            $user->login = $request->input('login');
            $user->email = $request->input('email');
            if ($request->input('parental_control') == null) {
                $user->parental_control = 0;
            } else {
                $user->parental_control = 1;
            }
            $sub = $request->input('formula');
            $sub = $sub == "null" ? null : $sub;
            $user->subscription_id = $sub;
            $user->save();
        }
        return back();
    }

    /**
     * Method Post on User Activate
     */
    public function useractivatetoggle(Request $request)
    {
        $user = User::find($request->input('user_id'));
        if ($user->trashed()) {
            $user->restore();
        } else {
            $user->delete();
        }
        $user->save();
        return back();
    }
}
