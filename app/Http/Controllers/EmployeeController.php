<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
{
    public function index()
    {
        return view("authentication.register");
    }

    public function register(Request $request)
    {

        $hash_password = Hash::make($request->password); //make hash password

        $user_data = DB::table('users')->insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $hash_password
        ]);

        if ($user_data) {
            return redirect("authentication/login");
        } else {
            return abort(401);
        }

        // return "working";
    }

    public function register_index()
    {
        return view("authentication.login");
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect()->intended('dashboard/homepage');
        }

        
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
 
    }

    public function logout(Request $request){
        Auth::logout();
 
        $request->session()->invalidate();
     
        $request->session()->regenerateToken();
        return redirect('/authentication/login');

    }

    public function show(){
        return view("dashboard.homepage");
    }
}
