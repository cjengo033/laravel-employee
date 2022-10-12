<?php

use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
route::get('/logout', [EmployeeController::class, 'logout']);
route::get('/dashboard/homepage', [EmployeeController::class, 'show']);
route::get('/dashboard/show_add', [EmployeeController::class, 'index_add']);
route::get('dashboard/store_employee', [EmployeeController::class, 'store']);
route::get('/dashboard/show_user', [EmployeeController::class, 'index_show']);


Route::prefix("/authentication")->group(function(){
    route::get('/register', [EmployeeController::class, 'index']);
    route::post('/register/process', [EmployeeController:: class, 'register']);
    route::get('/login', [EmployeeController::class, 'register_index']);
    route::post('/login/process', [EmployeeController::class, 'login']);
   
});
