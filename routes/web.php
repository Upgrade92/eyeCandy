<?php

use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ActorsController;
use App\Http\Controllers\MoviesController;
use App\Http\Controllers\SeriesController;
use App\Http\Controllers\ImageUploadController;


// Home View // All titles
Route::get('/', [MoviesController::class, 'index']);
Route::get('/movies', function() { return redirect('/');});
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
Route::post('/comment/{id}', [CommentController::class, 'store'])->middleware('auth');




// Show User Profile
Route::get('/show', [UserController::class, 'show']);

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



// Upload Image
Route::post('/upload', [ImageUploadController::class, 'store'])->middleware('auth');



// Redirect 404 to Home
Route::any('{query}',
    function() { return redirect('/')->with('message','Content not found'); })
    ->where('query', '.*');