<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Hash;

class FreeController extends Controller
{

    public function index()
    {
        return view('FreeEnd.index');
    }

    public function register()
    {

      return view('FreeEnd.register');
    }

   

    public function storeUser(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('index');
    }


    public function authenticate(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended('index');
        }

        return redirect('index')->with('error', 'Oppes! You have entered invalid credentials');
    }






    public function logout() {
        Auth::logout();
  
        return redirect('/');
      }
    // admin sample view
  

}
