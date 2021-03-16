<?php

/*
File name       : ProfileController.php
Begin           : 2021-03-01
Last Update     : 2021-03-15

Description     : route for the controller

Author          :Tesfazghi  robiel
*/


use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\CompteController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StatistiqueController;
use Illuminate\Support\Facades\Route;

/* connect url / to home view named home for route */
Route::get('/', function () {
  return view('home');
})->name('home');

/* connect url /compte to function index in CompteController named compte for route access only to auth */
Route::get('/compte', [CompteController::class, 'index'])
->name('compte')
->middleware('auth');

/* connect url /usrs to function index in UserController named users.index for route access only to not_client */
Route::get('/users', [UserController::class,'index'])
->name('users.index')
->middleware('not_client');

/* connect url /users/create to function create in UserController named users.create for route access only to direction */
Route::get('/users/create', [UserController::class,'create'])
    ->name('users.create')
    ->middleware('direction');

/* connect url /users to function store in UserController named users.store */    
Route::post('/users', [UserController::class, 'store'])
->name('users.store');

/* connect url /users/{user} to function show in UserController named users.show for route access only to not_client */
Route::get('/users/{user}', [UserController::class,'show'])
->name('users.show')
->middleware('not_client');

/* connect url /users/{user}/edit to function edit in UserController named users.edit for route access only to direction_administration' */
Route::get('/users/{user}/edit', [UserController::class,'edit'])
->name('users.edit')
->middleware('direction_administration');

/* connect url /users/{user} to function update in UserController named users.update */
Route::patch('/users/{user}', [UserController::class,'update'])
->name('users.update');

/* connect url /users/{user} to function destroy in UserController named users.destroy for route access only to direction' */
Route::delete('/users/{user}', [UserController::class,'destroy'])
->name('users.destroy')->middleware('direction');

/* connect url /login to function index in LoginController named login for */
Route::get('/login', [LoginController::class, 'index'])->name('login');
/* connect url /login to function store in LoginController  */
Route::post('/login',[LoginController::class, 'store']);

/* connect url /logout to function store in LogoutController named logout */
Route::post('/logout',[LogoutController::class,'store'])->name('logout');


/* route for ProfileController for create and modifie user profile page with access only to direction' */
Route::get('/profiles/create', [ProfileController::class,'create'])
->name('profiles.create');
Route::post('/profiles', [ProfileController::class,'store'])->name('profiles.store');
Route::get('/profiles/{profile}/edit',[ProfileController::class,'edit'])
->name('profiles.edit');
Route::patch('/profiles/{profile}',[ProfileController::class,'update'])->name('profiles.update');

/* route for StatistiqueController for statisque page with access only to direction' */
Route::get('/statistiques',[StatistiqueController::class,'index'])
->name('statistiques.index')->middleware('direction');
Route::get('/statistiques/age',[StatistiqueController::class,'age'])
->name('statistiques.age')->middleware('direction');
Route::get('/statistiques/domicile',[StatistiqueController::class,'domicile'])
->name('statistiques.domicile')->middleware('direction');
Route::get('/statistiques/formation',[StatistiqueController::class,'formation'])
->name('statistiques.formation')->middleware('direction');
