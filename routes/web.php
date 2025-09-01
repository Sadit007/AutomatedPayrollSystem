<?php

use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

