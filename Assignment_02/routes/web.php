<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\MajorController;


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

Route::get('/', [StudentController::class , 'index'])->name("student.index");
Route::get('/edit/{id}', [StudentController::class , 'edit'])->name("student.edit");
Route::get('/create', [StudentController::class , 'create'])->name("student.create");
Route::post('/store' , [StudentController::class , 'store'])->name("student.store");
Route::post('/update/{id}' , [StudentController::class , 'update'])->name("student.update");
Route::post('/destroy/{id}', [StudentController::class , 'destroy'])->name("student.destroy");

Route::get('/major', [MajorController::class , 'index'])->name("major.index");
Route::get('/major/edit/{id}', [MajorController::class , 'edit'])->name("major.edit");
Route::get('/major/create', [MajorController::class , 'create'])->name("major.create");
Route::post('/major/store' , [MajorController::class , 'store'])->name("major.store");
Route::post('/major/update/{id}' , [MajorController::class , 'update'])->name("major.update");
Route::post('major/destroy/{id}', [MajorController::class , 'destroy'])->name("major.destroy");
