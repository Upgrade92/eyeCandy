<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ActorsController;
use App\Http\Controllers\MoviesController;
use App\Http\Controllers\SeriesController;


// Home View // All titles
Route::get('/', [MoviesController::class, 'index']);
//Single title
Route::get('/movies/{id}', [MoviesController::class, 'show']);


// All series
Route::get('/series', [SeriesController::class, 'index']);
//Single TV-show
Route::get('/series/{id}', [SeriesController::class, 'show']);


// All actors
Route::get('/actors', [ActorsController::class, 'index']);
// All actors per page
Route::get('/actors/page/{page?}', [ActorsController::class, 'index']);
//Single title
Route::get('/actors/{id}', [ActorsController::class, 'show']);

// store Comment
Route::post('/movies/{id}', [MoviesController::class, 'store'])->middleware('auth');


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