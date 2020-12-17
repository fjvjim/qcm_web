<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function userLogin(Request $request)
    {
        $credentials = $request->only('email', 'password');

        $res = User::where('email','=', $credentials['email'])->where('password','=', $credentials['password'])->get();
        if($res){
            $var = $request->session()->regenerate();
            $request->session()->put('users', $res);
            $request->session()->put('idLogin', $var);
            return redirect()->intended('/questionnair');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
        /*
        $data = $request->input();
        $request->session()->put('user', $data);
        return redirect('/questionnair');*/
    }
}
