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

Route::get('/', function () {
    return view('pages.welcome');
});

Route::get('/login', function () {
    return view('login');
});


Route::get('/register', function () {
    return view('register');
});

//Category CRUD
Route::get('/category', [CategoryController::class, 'index']);
Route::post('/create_category', [CategoryController::class, 'create_category']);
Route::put('/update_category/{id}', [CategoryController::class, 'update_category']);
Route::delete('/destroy_category/{id}', [CategoryController::class, 'destroy_category']);

//Admin Authentification
Route::post('/register_admin', [UserController::class, 'register_admin']);
Route::post('/login_admin', [UserController::class, 'login_admin']);
//
