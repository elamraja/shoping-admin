<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
   public function __construct(){
        $this->middleware('user');
    }

    public function showDashboard(){
        return view('dashboard');
    }
}
