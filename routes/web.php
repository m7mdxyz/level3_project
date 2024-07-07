<?php

use App\Http\Controllers\loginController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\EnsureTokenIsValid;
use App\Http\Controllers\BlogController;

Route::middleware(['auth'])->group(function () {

    Route::get('/', function () {
        // return view('dashboard\layout\app');
        return view('home');
    });  

    Route::get('/blogs', [BlogController::class,'index']);
    Route::post('/blogs/create', [BlogController::class,'store']);   
    Route::get('/blogs/create', [BlogController::class,'create']);
    
    Route::get('/blogs/{id}', [BlogController::class,'Show']);
    Route::get('/blogs/{id}/edit', [BlogController::class,'edit']);
    Route::patch('/blogs/{id}', [BlogController::class,'update']);
    Route::delete('/blogs/{id}', [BlogController::class,'destroy']);


    Route::get('/myprofile', function () {
        return view('/dashboard/Auth/myprofile');
    });

    Route::get('/myprofile', [BlogController::class,'showProfile'])->name('profile');


});



// Login routes
Route::get('/login', [loginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [loginController::class, 'login']);

// Logout route
Route::get('/logout', [loginController::class, 'logout'])->name('logout');
