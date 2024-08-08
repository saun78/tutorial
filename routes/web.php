<?php

use App\Http\Controllers\listingcontroller;
use Illuminate\Support\Facades\Route;

Route::get('/login', function () {
    return view('login');
});

Route::get('/register', function () {
    return view('register');
});

Route::post('/register',[listingcontroller::class,'create']);

Route::post('/login',[listingcontroller::class,'store']);



