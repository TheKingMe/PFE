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
use Illuminate\Http\Request;
use App\Http\Controllers\testController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\quizcontroller;
use App\Http\Controllers\paymentController;
use App\Http\Controllers\addAdmincontroller;
use App\Http\Controllers\FilePdfController;


 
use App\Models\SectionContents;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

// // Authentication Routes...
// require __DIR__.'/auth.php';

// // Email Verification Routes...
// require __DIR__.'/email_verification.php';
//payment route
Route::get('/courses/payment/{id}',[paymentController::class,'index'])->name('payment.index');
Route::post('/courses/payment/{id}/store', [PaymentController::class,'store'])->name('payment.store');

Route::get('/accueil', [AccueilController::class, 'index'])->name('accueil');
Route::post('/search',[CourseController::class , 'search'])->name('courses.search');
Route::post('/logout',[UserController::class,'logout'])->name('logout');
Route::get('/courses/add/{course_id}', [SectionController::class, 'create'])->name('Add.create')->middleware('verified');;
Route::get('/courses/tag/{tag}', [CourseController::class,'tags'])->name('courses.tag');
Route::post('/courses/add',[sectionController::class,'store'])->name('Add.store')->middleware('verified');
Route::post('/courses/add/{course_id}/swap', [sectionController::class, 'changeOrderRange'])->name('change_order_range');

Route::get('/courses/add/{course_id}?', [SectionController::class, 'index'])->name('sections.index');
Route::delete('/content/{id}', [SectionContentController::class, 'destroy'])->name('content.delete');

//Add admin
Route::get('/AddAdmin',[addAdmincontroller::class,'index'])->name('AddAdmin');
Route::post('/AddAdmin',[addAdmincontroller::class,'store'])->name('AddAdmin.store');
//list Admin
Route::get('/AdminList',[addAdmincontroller::class,'show'])->name('AdminList');
Route::delete('/AdminList/{id}', 'App\Http\Controllers\addAdmincontroller@delete')->name('Admin.delete');


Route::post('/courses/add/{course_id}',[SectionContentController::class,'store'])->name('content.store')->middleware('verified');;
// Route::get('/courses/add/{course_id}',[SectionContentController::class,'index'])->name('content.index');
Route::delete('/courses/add/{id}', 'App\Http\Controllers\SectionController@delete')->name('section.delete')->middleware('verified');;
Route::get('/welcome', [welcomeController::class, 'index'])->name('welcome')->middleware('verified');;

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
    if(!Auth::check())
    {
     return redirect()->back()->with('erreur','dont touche me again');
    }
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
})->name('video.show')->middleware('verified');;
//pdf denerated
Route::get('/create-certificate-template/{course_id}/{id}', [FilePdfController::class, 'createCertificateTemplate'])->name('certicate.create');
Route::get('/get-certificate/{course_id}/{id}', [FilePdfController::class, 'process'])->name('get-certificate');


//Route::get('/courses/{id}', [CourseController::class, 'show'])->name('courses.show');
Route::post('/course/{id}/enroll',[CourseController::class, 'enroll'])->name('courses.enroll');//hna khas tbadal 
Route::delete('/course/{id}',[coursepagecontroller::class,'delete'])->name('course.delete');
Route::post('course/{id}',[coursepagecontroller::class,'approve'])->name('course.approve');
Route::post('/courses/add/{course_id}/quiz', [QuizController::class, 'store'])->name('quiz.store')->middleware('verified');;
Route::get('/courses/add/{course_id}/quizCreate/{quiz_id}', [QuizController::class, 'create'])->name('quiz.create')->middleware('verified');;
Route::post('/courses/add/{course_id}/quizCreate/{quiz_id}',[QuizController::class,'question_option_store'])->name('store.question')->middleware('verified');;
Route::get('/courses/{id}/test',[testController::class,'Test'])->name('test');
Route::post('/courses/{id}/submitresult',[testController::class,'submitTest'])->name('submit.result');
Route::get('/courses/{id}/result',[testController::class,'result'])->name('test.result');


//verificatio mail 
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
 
    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');
Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
 
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

// Route::get('/email/verify/{id}/{hash}', 'VerificationController@verify')->name('verification.verify');

