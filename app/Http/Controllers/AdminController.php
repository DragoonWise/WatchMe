<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
     * @param  int  $page
     * @return View
     */
    public function users($page = 1)
    {
        return view('admin/users',['page'=>$page]);
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
