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
use App\Http\Controllers\coursepagecontroller;
use App\Models\section;
use Illuminate\Support\Facades\Auth;

use App\Models\SectionContents;


Route::get('/accueil', [AccueilController::class, 'index'])->middleware('verified')->name('accueil');
Route::post('/courses/search',[CourseController::class , 'search'])->name('courses.search');
Route::post('/logout',[UserController::class,'logout'])->name('logout');
Route::get('/courses/add/{course_id}', [SectionController::class, 'create'])->name('Add.create');
Route::get('/courses/tag/{tag}', [CourseController::class,'tags'])->name('courses.tag');
Route::post('/courses/add',[sectionController::class,'store'])->name('Add.store');
Route::post('/courses/add/{course_id}',[SectionContentController::class,'store'])->name('content.store');
// Route::get('/courses/add/{course_id}',[SectionContentController::class,'index'])->name('content.index');
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
//Route::get('/courses/{id}',[coursepagecontroller::class, 'index'])->name('courseId.index');
    
Route::get('/courses/{id}', function ($id) {
    $course = Course::findOrFail($id);
    $sections = Section::all();
    $contents = SectionContents::all();

    return view('course', compact('course', 'sections', 'contents'));
})->name('courses.show');

Route::get('/adminstration',[admincontroller::class,'index'])->name('adminstration');

Route::get('courses/add/{id}', function ($id) {
    $videoContent = SectionContents::find($id);
    
    if ($videoContent) {
        $videoPath = asset('storage/' . $videoContent->file_path); // Construct path
        return view('video.show', ['videoPath' => $videoPath]); // Pass path to view
    } else {
        // Handle video not found scenario
    }
})->name('video.show');

//Route::get('/courses/{id}', [CourseController::class, 'show'])->name('courses.show');
    Route::post('/courses/enroll', [CourseController::class, 'enroll'])->name('courses.enroll');
Route::delete('/course/{id}',[coursepagecontroller::class,'delete'])->name('course.delete');
Route::post('course/{id}',[coursepagecontroller::class,'approve'])->name('course.approve');
// Auth::routes([
//     'verify'=>true
// ]);
//lay3az chatGBT