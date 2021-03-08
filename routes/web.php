<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CompteController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () { 
  return view('home');
})->name('home');

Route::get('/register', [RegisterController::class, 'index'])
->name('register')
->middleware('auth');
Route::post('register',[RegisterController::class, 'store']);

Route::get('/compte', [CompteController::class, 'index'])
->name('compte')
->middleware('auth');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login',[LoginController::class, 'store']);

use App\Http\Controllers\Auth\LogoutController;
Route::post('/logout',[LogoutController::class,'store'])->name('logout');


Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
Route::post('/profile',[ProfileController::class, 'store']);
