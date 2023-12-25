<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;

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


// Public routes accessible without authentication
Route::middleware(['guest'])->group(function () {
    Route::get('/login', function () {
        return view('login');
    })->name('login');

    // Route::get('/register', function () {
    //     return view('register');
    // });
});

// Admin Authentication
Route::post('/register_admin', [UserController::class, 'register_admin']);
Route::post('/login_admin', [UserController::class, 'login_admin']);

// Authenticated routes
Route::middleware(['auth'])->group(function () {

    // Protected routes for authenticated users
    Route::get('/', function () {
        return view('pages.welcome');
    });

    // Category CRUD
    Route::get('/category', [CategoryController::class, 'index']);
    Route::post('/create_category', [CategoryController::class, 'create_category']);
    Route::put('/update_category/{id}', [CategoryController::class, 'update_category']);
    Route::delete('/destroy_category/{id}', [CategoryController::class, 'destroy_category']);

    // Logout
    Route::post('/logout', [UserController::class, 'logout']);
});
