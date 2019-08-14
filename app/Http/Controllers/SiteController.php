<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
class SiteController extends Controller
{
    
    public function showLogin(){
        return view('login');
    }

    public function doLogin(Request $request){
        $vd = Validator($request->all(),[
            'email'=>'required|email',
            'password'=>'required'
        ]);

        if($vd->fails()){
            return redirect()->back()->withErrors($vd)->withInput();
        }

        $credentials = ['email'=>$request->get('email'),'password'=>$request->get('password'),'user_type'=>'admin'];
        if(Auth::guard('user')->attempt($credentials))
        {
            return redirect('/');
        }
        return redirect('/auth/')->withErrors(['invalid' => 'Invalid Login Details'])->withInput();
    }

    public function doLogout(){
         Auth::guard('user')->logout();
        return redirect('/auth/');
    }
}
