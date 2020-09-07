<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(Request $request)
    {
        return view('index');
    }

    public function validar(Request $request)
    {
        
        $credentials = $request->only('email','password');
        if( $credentials )
        {

        }
    }
}
