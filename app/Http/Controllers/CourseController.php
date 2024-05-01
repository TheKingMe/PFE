<?php

namespace App\Http\Controllers;
use App\Models\Course;
use Illuminate\Http\Request;
use App\Services\CourseService;
use Symfony\Component\HttpFoundation\RateLimiter\RequestRateLimiterInterface;
use App\Models\User;

class CourseController extends Controller
{
      protected $courseService;

     public function index()
        {
        $courses = Course::all();
        return view('courses')->with('courses', $courses);  
    } 

    public function create()
    {
        //select * from users;
        $users = User::all();

        return view('courses.create', ['users' => $users]);
    }

    public function store(){

        request()->validate([
            'name' => ['required', 'min:3'],
            'description' => ['required', 'min:5'],
            // 'teacher' => ['required', 'exists:users,id'],
            // 'rating' => ['required', 'numeric', 'min:1', 'max:5'], // Assuming rating is a numeric value between 1 and 5
            
            'tags' => ['string', 'max:255'], // Assuming each tag is a string with a maximum length of 255 characters
        ]);
    
        $data = request()->all();
    
        // Assuming you want to store this data in a database, you can do something like this:
        $course = new Course(); // Assuming Course is your model
        $course->name = $data['name'];
        $course->tags = $data['tags'];
       
        $course->teacher = 'zin'; // Assuming 'teacher_id' is the foreign key column in the courses table
        $course->rating = 0;
        $course->description = $data['description'];
        $course->approved = false; 
        $course->save();
        return redirect()->route('Add');
        // Assuming you have a pivot table to handle many-to-many relationship between courses and tags
        // if(isset($data['tags'])){
        //     $tags = Tag::whereIn('name', $data['tags'])->pluck('id'); // Assuming 'Tag' is your model for tags
        //     $course->tags()->sync($tags);
        // }
    
        // Optionally, you might want to redirect the user after storing the data
       
    }
    
    

    // public function __construct(CourseService $courseService)
    // {
    //     $this->courseService = $courseService;
    // }


    // public function show($id)
    // {$course = Course::findOrFail($id);
    //     $contents = $course->contents;
    
    //     return view('courses.show', compact('course', 'contents'));
    // }
}
    
