<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\course;
use App\Models\quiz;
use App\Models\option;


use App\Models\question;
class quizcontroller extends Controller{
  
    public function create($course_id,$quiz_id)
    {
       $course = course::findorFail($course_id);
       $quiz = quiz::findorfail($quiz_id);
       
       return view('quizCreate', compact('course','quiz'));
    }

    public function store(Request $request)
    {
        // Validate the request data
        $data = $request->validate([
            'course_id' => ['required', 'exists:courses,id'],
            'title' => ['required', 'string', 'max:255'],
            'desription' => ['required', 'string', 'max:255'],
        ]);

        // Create the quiz
        $quiz = Quiz::create([
           
            'course_id' => $data['course_id'],
            'title' => $data['title'],
            'desription' => $data['desription'],
        ]);
       $quiz_id  = $quiz->id;
       
        return redirect()->route('quiz.create', ['course_id' => $data['course_id'],'quiz_id'=>$quiz_id])->with('success', 'Quiz created successfully!');
    }
   public function  question_option_store(Request $request)
    {
        // Validate the incoming request data
        $data = $request->validate([
            'quiz_id' => ['required', 'exists:quizzes,id'],
            'question_text' => ['required', 'string'],
            'options' => ['required', 'array'],
            'options.*.option_text' => ['required', 'string'],
            'options.*.is_correct' => ['nullable', 'integer', 'between:0,1'],
        ]);
    
        // Create a new question
        $question = Question::create([
            'quiz_id' => $data['quiz_id'],
            'question_text' => $data['question_text'],
        ]);
    
        $questionId = $question->id;
    
        // Loop through each submitted option and create them
        foreach ($data['options'] as $optionData) {
            Option::create([
                'question_id' => $questionId,
                'option_text' => $optionData['option_text'],
                'value' => isset($optionData['is_correct']) ? $optionData['is_correct'] : 0,
            ]);
        }
    
        return redirect()->back()->with('success', 'Question added successfully');
    }
    

}    



