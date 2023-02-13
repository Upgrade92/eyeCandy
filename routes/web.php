<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ListingController;

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


// Home View // All titles
Route::get('/', [ListingController::class, 'index']);


//Single title
Route::get('/listings/{listing}', [ListingController::class, 'show'] ,
    
);


// Show User Profile
Route::get('/profile', [UserController::class, 'show']);


// Show register Form
Route::get('/register', [UserController::class, 'create'])->middleware('guest');


// Create new User
Route::post('/users', [UserController::class, 'store']);


// Logout User
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');


// show login Form
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');


// Login User
Route::post('/users/authenticate', [UserController::class, 'authenticate']);