<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class welcomeController extends Controller
{

    public function index()
    {
        // Get the authenticated user
        $user = auth()->user();

        // Fetch the courses the user is enrolled in
        $courses = $user->courses;
        $A_courses = Course::all();

        return view('welcome', compact('courses'), compact('A_courses'));
    }

}
