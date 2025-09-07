<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    function userSignup(Request $request){
        $request->validate([
            'username' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6',

        ]);

        return $request ->all();
    }

    function userSignin(Request $request ){
        $request -> validate([
            'email' => 'required',
            'password' => 'required'


        ]);

        return $request ->all();
    }
}
