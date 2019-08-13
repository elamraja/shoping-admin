<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller
{
    
    public function showLogin(){
        return view('login');
    }

    public function showDahboard(){
        return view('dashboard');
    }
}
