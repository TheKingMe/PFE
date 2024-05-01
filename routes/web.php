<?php

use Illuminate\Support\Facades\Route;
use App\Models\Course;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\UserController;

Route::get('/accueil', function () {
    return view('accueil');
})->name('accueil');
 Route::get('/courses/add', function () {
     return view('Add');
 })->name('Add');
// Route::get('/add', [CourseController::class, 'create'])->name('courses.create');
 Route::post('/courses', [CourseController::class, 'store'])->name('courses.store');


Route::get('/login',[UserController::class,'login'])->name('login');
Route::post('/login', [UserController::class, 'authenticate'])->name('login.authenticate');
Route::get('/registre',[UserController::class,'create'] )->name('registre.create');
Route::post('/register', [UserController::class, 'store'])->name('register.store');
Route::get('/courses', [CourseController::class, 'index'])->name('Courses.index');
Route::get('/courses/{id}', function ($id) {
return view('course',[
    'course'=> Course::findOrFail($id),
]);});