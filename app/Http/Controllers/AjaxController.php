<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AjaxController extends Controller
{
    public function create()
    {

      return view('AjaxRequest');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
          'name'      => 'required',
          'email'     => 'required',
          'password'    => 'required',
        ]);

        $testing = response()->json(array($validated));
        DB::table('users')->insert([$testing]);

        // $user = DB::table('users')->insert([
        //     'name' => $validated['name'],
        //     'email' => $validated['email'],
        //     'password' => Hash::make($validated['password'])
        // ]);
       
        // return $validated;
        // return $data1;
        #create or update your data here
        // $user = DB::table('users')->create($validated);
        // if($user) {
        //      return response()->json(['success'=>'Ajax request submitted successfully']);  
        // }else {
        //        return response()->json(['error'=>'Ajax request not submitted successfully']);
        // }
        // return DB::table('users')->insert([$data]);

        // return response()->json(['success'=>'Ajax request submitted successfully']);
    }
    
}
