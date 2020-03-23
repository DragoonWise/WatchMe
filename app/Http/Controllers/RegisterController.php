<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;

class RegisterController extends Controller
{
    public function create()
    {
        return view('register');
    }
    public function store(RegisterRequest $request)
    {
        return view('login');
    }
}
