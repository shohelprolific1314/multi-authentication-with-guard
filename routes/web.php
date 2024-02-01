<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StaffController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('admin/login',[AdminController::class,'adminLogin'])->name('admin.login');
Route::post('admin/login',[AdminController::class,'adminLoginFunctionality'])->name('admin.login.functionality');
Route::group(['middleware'=>'admin'],function(){
    Route::get('logout',[AdminController::class,'logout'])->name('logout');
    Route::get('dashboard',[AdminController::class,'dashboard'])->name('dashboard');
});

Route::get('staff/login',[StaffController::class,'staffLogin'])->name('staff.login');
Route::post('staff/login',[StaffController::class,'staffLoginFunctionality'])->name('staff.login.functionality');
Route::group(['middleware'=>'staff'],function(){
    Route::get('logout',[StaffController::class,'logout'])->name('logout');
    Route::get('dashboard',[StaffController::class,'dashboard'])->name('dashboard');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
