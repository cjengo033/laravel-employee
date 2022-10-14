<?php

namespace App\Http\Controllers;

use App\Models\Employee;
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

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();

        $request->session()->regenerateToken();
        return redirect('/authentication/login');
    }

    public function show()
    {
        $all_employee = DB::table('employees')->get();
        return view("dashboard.homepage", ["data_employee" => $all_employee]);
    }

    public function index_add()
    {
        return view('dashboard.add_employee');
    }

    public function store(Request $request)
    {
        Employee::create([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        return redirect()->intended('dashboard/homepage');
    }

    public function index_show($id)
    {
        $data = Employee::findOrFail($id);
        return view('dashboard.edit_employee', ["employee" => $data]);
    }

    public function destroy($id)
    {
        Employee::findOrFail($id)->delete();
        return redirect()->intended('dashboard/homepage');
    }

    public function edit($id, Request $request)
    {
        Employee::find($id)->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);
        return back();
    }
}
