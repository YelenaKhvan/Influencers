<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class IndexController extends Controller
{    
    /**
     * home
     *
     * @return void
     */
    public function home(Request $request)
    {
        return view('pages.home');
    }
    

    public function login(Request $request)
    {
        return view('pages.auth.login');
    }

    public function register(Request $request)
    {
        return view('pages.auth.register');
    }
}
