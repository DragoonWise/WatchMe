<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        return view('admin/dashboard');
    }

    /**
     * Users List
     *
     * @return View
     */
    public function users()
    {
        $users = User::paginate(15);

        return view('admin/users',['users'=>$users]);
    }

    /**
     * User Detail
     *
     * @param  int  $id
     * @return View
     */
    public function user($id)
    {
        return view('admin/user',['id'=>$id]);
    }
}
