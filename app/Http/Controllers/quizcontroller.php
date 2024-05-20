<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\course;
use App\Models\quiz;


class quizcontroller extends Controller{
  
    public function create($course_id)
    {
        // Pass the course_id to the view
        return view('quiz.create', compact('course_id'));
    }

    public function store(Request $request)
    {
        // Validate the request data
        $data = $request->validate([
            'course_id' => ['required', 'exists:courses,id'],
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255'],
        ]);

        // Create the quiz
        $quiz = Quiz::create([
            'course_id' => $data['course_id'],
            'title' => $data['title'],
            'description' => $data['description'],
        ]);

        // Redirect to the quiz question creation page
        return redirect()->route('quiz.create', $quiz->id);
    }

}

