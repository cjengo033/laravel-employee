<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class EmployeeController extends Controller
{
    public function index()
    {
        return view("authentication.register");
    }

    public function register(Request $request)
    {
        // Hash::make($request->password); //make hash password
        $validated = $request->validate([
            'name' => 'required|min:4|Alpha',
            'email' => 'required|unique:employees',
            'password' => 'required'
        ]);
        // return ($validated);
        return $validated;
        $user_data = DB::table('users')->insert([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password'])
        ]);

        if ($user_data) {
            return redirect("authentication/login");
        } else {
            return redirect("authentication/dashboard");
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

    public function store(Request $request) //Add Employee from the table
    {
        $validated = $request->validate([
            'name' => 'required|min:4|Alpha',
            'email' => 'required|unique:employees'
        ]);

        // dd($validated);

        Employee::create($validated);

        return redirect()->intended('dashboard/homepage');

        // $validator = Validator::make($request->all(), [
        //     'name' => 'required',
        //     'email' => 'required',
        // ]);
        
        // if ($validator->fails())
        // {
        //     return response()->json(['errors'=>$validator->errors()->all()]);
        // }
        // return response()->json(['success'=>'Record is successfully added']);
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
