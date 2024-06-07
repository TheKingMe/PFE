<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use Illuminate\Support\Facades\Auth;
class admincontroller extends Controller
{
    public function index(){
        $courses = Course::paginate(6);
        if (!Auth::check()) {
            // Redirect to 'accueil' if not authenticated
            return view('login');
        }
        return view('adminstration',compact('courses'));
    }
}
