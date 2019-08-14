<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;

class PassportController extends Controller
{
    public function register(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'user_type'=>'user',
            'password' => bcrypt($request->password)
        ]);
        $token = $user->createToken('svitech')->accessToken;
        return response()->json(['token' => $token,'user'=>$user], 200);
    }

    public function login(Request $request)
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
            'user_type'=>'user',
        ];
        if (auth()->attempt($credentials)) {
            $token = auth()->user()->createToken('svitech')->accessToken;
            return response()->json(['token' => $token,'user'=>auth()->user()], 200);
        } else {
            return response()->json(['error' => 'Credentials invalid'], 401);
        }
    }

     public function details()
    {
        return response()->json(['user' => auth()->user()], 200);
    }
}
