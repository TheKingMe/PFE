<?php

namespace App\Http\Controllers;
use App\Models\Course;
use Illuminate\Http\Request;
use App\Services\CourseService;
use Symfony\Component\HttpFoundation\RateLimiter\RequestRateLimiterInterface;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\CourseContent;

class CourseController extends Controller
{
      protected $courseService;
      private $user;

      public function __construct(User $user)
      {
          $this->user = $user;
      }
      public function show($id)
      {
          $course = Course::findOrFail($id);
          return view('courses.show', compact('course'));
    }
     public function index()
        {
        $courses = Course::all();
        return view('courses')->with('courses', $courses);  
    } 

    public function create()
    {
        //select * from users;
        

        return view('courses.create');
    }
  
    

    public function store(){
        $teacherId = auth()->id();
        request()->validate([
            'name' => ['required', 'min:3'],
            'description' => ['required', 'min:5'],
            // 'teacher' => ['required', 'exists:users,id'],
            // 'rating' => ['required', 'numeric', 'min:1', 'max:5'], // Assuming rating is a numeric value between 1 and 5
            
            'tags' => ['string', 'max:255'], // Assuming each tag is a string with a maximum length of 255 characters
            
            //hadak knt daro ch7al h
        ]);
    
        $data = request()->all();

    //
    
        // Assuming you want to store this data in a database, you can do something like this:
            //    $path = request()->file('file_path')->store('public');
              //$url = Storage::url($path);
               
               $course = new Course();
               $course->name = $data['name'];
                $course->tags = $data['tags'];
               $course->description = $data['description'];
              $course->teacher = Auth::user()->name;
               $course->rating = 0;
               $course->approved = false;

                                 
               $course->save();
                 $course_id = $course->id;

               
              // $file = new CourseContent();
              // $file->file_path = $url; // Store the file URL in the database
               //$course->file()->save($file); // Assuming 'file' is the relationship method in the Course model
               
               return redirect()->route('Add.create', ['course_id' => $course->id]);
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


public function enroll(Request $request)
{
    // Get the authenticated user
    $user = Auth::user();
     $validatedData = $request->validate([
        'course_id' => ['required'],
     ]);
        

    // Get the course ID from the form submission
    $courseId = $request->input('course_id');

    // Check if the user is already enrolled in the course
    if ($user->courses()->where('course_id', $courseId)->exists()) {
        return redirect()->route('Courses.index')->with('error', 'You are already enrolled in this course.');
    }

    // Enroll the user in the course
    $user->courses()->attach($courseId);

    // Redirect the user back to the course page or any other appropriate page
    return redirect()->route('courses.show', ['id' => $courseId])->with('success', 'Enrolled successfully!');
}
public function search(Request $request)
{
    $query = $request->input('search');
   
    $courses = Course::where('name', 'like', "%$query%")->get();
    
    return view('search-results', compact('courses'));//wa9ila sf db khas  ghi nrj3oha b7alha b7al dik page d courses
    //z3n
}
public function tag($tag)
{
    // Retrieve courses that have the specified tag
    $courses = Course::where('tags', 'like', "%$tag%")->get();
    
    // Pass the courses to the view
    return view('courses.tag', compact('courses'));
}
//ach tadir daba chno baghi tgad waaa ka3ka3aaaaaaaaaaaaaaaaaah

//mzl matzad liygol liya skat

}
    
