<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DeveloperController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\ForgetPasswordController;
use App\Http\Controllers\RecoverPasswordController;

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



Route::get('',[LoginController::class,'loginView'])->name('index');
Route::get('logout',[LoginController::class,'logout'])->name('logout');
Route::post('post/login',[LoginController::class,'postLogin'])->name('post.login');
Route::get('register',[RegistrationController::class,'registerView'])->name('register');
Route::post('/post/register',[RegistrationController::class,'postRegister'])->name('post.register');
Route::get('forget-password',[ForgetPasswordController::class,'forgetPasswordView'])->name('forget.password');
Route::post('post-forget-password',[ForgetPasswordController::class,'sendUserEmailReset'])->name('post.forget.password');
Route::get('find/token/{token}',[RecoverPasswordController::class,'recoverPasswordView'])->name('recover.password');
Route::post('reset/password',[RecoverPasswordController::class,'resetPassword'])->name('reset.password');


Route::group(['prefix' => 'developers','middleware' => 'developer'], function() {
    Route::get('index',[DeveloperController::class,'index'])->name('developer.index');
    Route::get('create',[DeveloperController::class,'create'])->name('developer.create');
    Route::post('store',[DeveloperController::class,'store'])->name('developer.store');
    Route::get('edit/{id}',[DeveloperController::class,'edit'])->name('developer.edit');
    Route::post('update/{id}',[DeveloperController::class,'update'])->name('developer.update');
    Route::get('delete/{id}',[DeveloperController::class,'singleDelete'])->name('developer.delete');
    Route::delete('multiple-delete',[DeveloperController::class,'multipleDelete'])->name('developer.multiple.delete');

});

