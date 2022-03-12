<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Models\User;

class UserController extends Controller
{
    public function doLogin(Request $request)
    {
        $validator = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ], [
            'required' => ':attribute est requis',
            'email' => ':attribute doit être une adresse email valide'
        ]);

        if(Auth::attempt($request->only(['email', 'password']))){
            return \redirect()->route('dashboard');
        }else{
            return back()->withErrors(['message' => 'Vos identifiants sont invalides !']);
        }
    }
}
