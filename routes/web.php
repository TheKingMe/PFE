 <?php

use Illuminate\Support\Facades\Route;
use App\Models\Course;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\sectionController;
use App\Http\Controllers\SectionContentController;
use App\http\Controllers\welcomeController;
use App\Http\Controllers\AccueilController;
use App\Http\Controllers\admincontroller;


Route::get('/accueil', [AccueilController::class, 'index'])->name('accueil');


Route::get('/courses/add/{course_id}', [SectionController::class, 'create'])->name('Add.create');

Route::post('/courses/add',[sectionController::class,'store'])->name('Add.store');
Route::post('/courses/add/{course_id}',[SectionContentController::class,'store'])->name('content.store');
Route::delete('/courses/add/{id}', 'App\Http\Controllers\SectionController@delete')->name('section.delete');
Route::get('/welcome', [welcomeController::class, 'index'])->name('welcome');

// Route for showing the course creation form
Route::get('/courses', [CourseController::class, 'create'])->name('courses.create');

// Route for storing the submitted course data
Route::post('/courses', [CourseController::class, 'store'])->name('courses.store');

// Route for showing the section creation form
//Route::get('/courses/add', [SectionController::class, 'create'])->name('sections.create');

// Route for storing the submitted section data
//Route::post('/sections', [SectionController::class, 'store'])->name('sections.store');
Route::get('/login',[UserController::class,'login'])->name('login');
Route::post('/login', [UserController::class, 'authenticate'])->name('login.authenticate');
//Route::get('/registre',[UserController::class,'create'] )->name('registre.create');
//Route::post('/register', [UserController::class, 'store'])->name('register.store');
Route::get('/registre', [UserController::class, 'create'])->name('registre.create');
Route::post('/register', [UserController::class, 'store'])->name('register.store');

Route::get('/courses', [CourseController::class, 'index'])->name('Courses.index');
Route::get('/courses/{id}', function ($id) {
    return view('course', [
        'course' => Course::findOrFail($id),
    ]);
})->name('courses.show');
Route::get('/courses/{id}', function ($id) {
    return view('course', [
        'course' => Course::findOrFail($id),
    ]);
})->name('courses.show');
Route::get('/adminstration',[admincontroller::class,'index'])->name('adminstration');


//Route::get('/courses/{id}', [CourseController::class, 'show'])->name('courses.show');
    Route::post('/courses/enroll', [CourseController::class, 'enroll'])->name('courses.enroll');
