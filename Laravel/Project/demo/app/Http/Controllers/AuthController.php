<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function showLogin()
    {
        //
           return view('auth.login');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function login(Request $request)
    {
        // dump($request);
        // select data  , store
       $cradentials= $request->validate([
       'email'=>'required',
       'password'=>'required',
        ]);
       if(Auth::attempt($cradentials)) // true or false
        {
            $request->session()->regenerate();
            return redirect('/');
        }else{
            return back()->withErrors([
                    "email"=>"check your email or password"
            ]);
        }
        }

    /**
     * Store a newly created resource in storage.
     */
    public function showRegister()
    {
        // form of register
        return view('auth.register');

    }

    /**
     * Display the specified resource.
     */
    public function Register(Request $request)
    {
        // dump($request);
        // select data  , store
        $request->validate([
       'name'=>'required|string|max:255',
       'email'=>'required|unique:users,email',
       'password'=>'required|min:8',
        ]);
        $user=User::create(
           [
             'name'=>$request->name,
             'email'=>$request->email,
             'password'=>Hash::make($request->password)
           ]

        );
        // dump($user);
        Auth::login($user); // login user ==> current user that login
        // return to_route('categories.index');
        return redirect('/login');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function logout(Request $request)
    {
        //
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/showLogin');

    }


}
