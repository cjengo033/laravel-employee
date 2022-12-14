<?php

use App\Http\Controllers\AjaxController;
use App\Http\Controllers\CrudController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ProductController;
use App\Models\Employee;
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

Route::get('/', [CrudController::class, 'index']);
Route::resource('todo', CrudController::class);

Route::resource('users', UserController::class);

route::get('/logout', [EmployeeController::class, 'logout']);

Route::prefix("/authentication")->group(function(){
    route::get('/register', [EmployeeController::class, 'index']);
    route::post('/register/process', [EmployeeController:: class, 'register']);
    route::get('/login', [EmployeeController::class, 'register_index']);
    route::post('/login/process', [EmployeeController::class, 'login']);
   
});

Route::prefix("/dashboard")->group(function(){
    route::get('/homepage', [EmployeeController::class, 'show']);
    route::get('/show_add', [EmployeeController::class, 'index_add']);
    route::post('/store_employee', [EmployeeController::class, 'store']);
    route::get('/show_user/{id}', [EmployeeController::class, 'index_show']);
    route::get('/delete/{id}', [EmployeeController::class, 'destroy']);
    route::post('/edit/{id}', [EmployeeController::class, 'edit']);
});

Route::get('ajax-request', [AjaxController::class, 'create']);
Route::post('ajax-request', [AjaxController::class, 'store']);

Route::controller(ProductController::class)->group(function(){
    Route::get('products', 'index');
    Route::post('products', 'store')->name('products.store');
});

