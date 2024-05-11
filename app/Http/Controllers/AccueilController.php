<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Course; // Make sure to import the Course model

class AccueilController extends Controller
{
    public function index()
    {
        $courses = Course::all();
        foreach ($courses as $course) {
            // Assuming $course->updated_at is the timestamp of the last update
            $lastUpdate = Carbon::parse($course->updated_at);
            $timeDifference = $lastUpdate->diffForHumans(); // This will give you a human-readable time difference
    
            // Add the calculated time difference to the course object
            $course->timeDifference = $timeDifference;
        }
        return view('accueil')->with('courses', $courses);  
    }
}
