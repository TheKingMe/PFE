<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Quiz;
use App\Models\Question;
use App\Models\Option;
use App\Models\QuizResult;
use App\Models\User;

class TestController extends Controller
{
    public function Test($courseId)
    {
        // Find the course with the specified ID
        $course = Course::findOrFail($courseId);
       
        // Find the quiz associated with the course
       $quiz = quiz::with('questions.options')->get();
        

        return view('test', ['course' => $course, 'quizzes' => $quiz]);
    }

    public function submitTest(Request $request)
    {
        $data = $request->validate([
            'user_id' => 'required|exists:users,id',
            'course_id' => 'required|exists:courses,id',
            'quiz_id' => 'required|exists:quizzes,id',
            'answers' => 'required|array',
            'answers.*' => 'required|exists:options,id',
        ]);
      
        $user = User::findOrFail($data['user_id']);
        $course = Course::findOrFail($data['course_id']);
        $quiz = Quiz::findOrFail($data['quiz_id']);
        
        if (!$user) {
            return redirect()->back()->with('error', 'Invalid user ID.');
        }
    
        if (!$course) {
            return redirect()->back()->with('error', 'Invalid course ID.');
        }
    
        if (!$quiz) {
            return redirect()->back()->with('error', 'Invalid quiz ID.');
        }

        $score = 0;
        $totalQuestions = $quiz->questions->count();
        
        foreach ($quiz->questions as $question) {
            if (isset($data['answers'][$question->id])) {
                $selectedOptions = $data['answers'][$question->id];
                $correctOptions = $question->options->where('value', 1)->pluck('id')->toArray();

                if ($selectedOptions == $correctOptions) {
                    $score++;
                }
            }
        }




        $result = ($score / $totalQuestions) * 100;

quizresult::create([
            'user_id' => $user->id,
            'course_id' => $course->id,
            'result' => $result,
        ]);



        return redirect()->route('test.result', ['id' => $course->id])->with('result', $result);
    }

    public function  result($course_id){
        $course = course::findorFail($course_id);
        $result = session('result');
        return view('result',['course'=>$course,'result'=>$result]);
    }
}