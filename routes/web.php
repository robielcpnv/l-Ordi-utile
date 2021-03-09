<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\compte\AdresseController;
use App\Http\Controllers\compte\FormationController;
use App\Http\Controllers\compte\ContactController;
use App\Http\Controllers\compte\ProfileController;
use App\Http\Controllers\compte\ResponsableController;
use App\Http\Controllers\CompteController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () { 
  return view('home');
})->name('home');

Route::get('/register', [RegisterController::class, 'index'])
->name('register')
->middleware('auth');
Route::post('/register',[RegisterController::class, 'store']);

Route::get('/compte', [CompteController::class, 'index'])
->name('compte')
->middleware('auth');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login',[LoginController::class, 'store']);

Route::post('/logout',[LogoutController::class,'store'])->name('logout');

Route::get('/profile', [ProfileController::class,'index'])->name('profile');

Route::get('/responsable',[ResponsableController::class,'index'])->name('responsable');
Route::get('/contact',[ContactController::class,'index'])->name('contact');
Route::post('/contact',[ContactController::class,'index']);

Route::get('/adresse',[AdresseController::class,'index'])->name('adresse');
Route::get('/formation',[FormationController::class,'index'])->name('formation');