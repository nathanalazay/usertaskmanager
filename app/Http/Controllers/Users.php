<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class Users extends Controller
{
    //

    public function index()
    {
        // get auth user
        $user = Auth::user();
        return view('users.profile.index',compact('user'));
    }

}
