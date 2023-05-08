<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\MajorController;
use App\Http\Controllers\AuthController;


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

// Route for students
Route::get('/', [StudentController::class , 'index'])->name("student#index");
Route::get('/export', [StudentController::class , 'export'])->name("student#export");
Route::get('/edit/{id}', [StudentController::class , 'edit'])->name("student#edit");
Route::get('/create', [StudentController::class , 'create'])->name("student#create");
Route::get('/search' , [StudentController::class , 'search'])->name("student#search");
Route::post('/import' , [StudentController::class , 'import'])->name("student#import");
Route::post('/store' , [StudentController::class , 'store'])->name("student#store");
Route::post('/update/{id}' , [StudentController::class , 'update'])->name("student#update");
Route::post('/destroy/{id}', [StudentController::class , 'destroy'])->name("student#destroy");

// Route for Major
Route::get('/major', [MajorController::class , 'index'])->name("major#index");
Route::get('/major/edit/{id}', [MajorController::class , 'edit'])->name("major#edit");
Route::get('/major/create', [MajorController::class , 'create'])->name("major#create");
Route::post('/major/store' , [MajorController::class , 'store'])->name("major#store");
Route::post('/major/update/{id}' , [MajorController::class , 'update'])->name("major#update");
Route::post('major/destroy/{id}', [MajorController::class , 'destroy'])->name("major#destroy");

// Route for auth
Route::get('/auth/register' , [AuthController::class , 'register'])->name("auth#register");
Route::get('/auth/login' , [AuthController::class , 'login'])->name("auth#login");
