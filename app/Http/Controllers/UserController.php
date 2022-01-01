<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    function index()
    {

        return view('users.index');
    }

    function profile()
    {
        return view('users.profile');
    }
    function settings()
    {
        return view('users.settings');
    }
}
