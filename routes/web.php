<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/sidebar', function () {
    return view('layouts.sidebar');
});

Route::get('/dashboard', function () {
    return view('dashboard');
}) ->name('dashboard');

Route::get('/viewemployee', function(){
    return view('viewemployee');
}) ->name('viewemployee');

Route::get('/createpayroll', function(){
    return view('createpayroll');
}) ->name('createpayroll');

Route::get('/signup', function(){
    return view('signup');
}) ->name('signup');

Route::get('/signin', function(){
    return view('signin');
}) ->name('signin');

Route::post('/signup', [UserController::class, 'userSignup'])->name('user.signup');
Route::post('/signin', [UserController::class, 'userSignin'])->name('user.signin');


