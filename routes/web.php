<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CompteController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () { 
  return view('home');
})->name('home');

Route::get('/register', [RegisterController::class, 'index'])
->name('register');
Route::post('/register',[RegisterController::class, 'store']);

Route::get('/compte', [CompteController::class, 'index'])
->name('compte')
->middleware('auth');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login',[LoginController::class, 'store']);

Route::post('/logout',[LogoutController::class,'store'])->name('logout');

Route::get('profiles', [ProfileController::class,'index'])->name('profiles.index');
Route::get('profiles/create', [ProfileController::class,'create'])->name('profiles.create');
Route::post('profiles', [ProfileController::class,'store'])->name('profiles.store');
Route::get('profiles/{profile}',[ProfileController::class,'show'])->name('profiles.show');
Route::get('profiles/{profile}/edit',[ProfileController::class,'edit'])->name('profiles.edit');
Route::post('profiles/{profile}',[ProfileController::class,'update'])->name('profiles.update');