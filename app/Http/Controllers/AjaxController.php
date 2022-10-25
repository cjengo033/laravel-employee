<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class AjaxController extends Controller
{
  public function create()
  {
    $products = User::get();
  
    return view('ajaxRequest', compact('products'));

  }

  public function store(Request $request)
  {
    $validated = Validator::make($request->all(), [
      'name' => 'required'

    ]);
    
    if ($validated->fails()) {
      return response()->json([
        'error' => $validated->errors()->all()
      ]);
    }

    User::create([
      'name' => $request->name

    ]);
    return response()->json(['success' => 'Product created successfully.']);
    // return $testing = response()->json(array($validated));
    // DB::table('users')->insert([$testing]);

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
