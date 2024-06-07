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
            $courses = Course::where('approved', '!=', 0)
            ->orderBy('created_at', 'desc')
            ->paginate(10);
                        return view('courses')->with('courses', $courses);  
    } 

    public function create()
    {
        //select * from users;
        

        return view('courses.create');
    }
  
    

    public function store(Request $request){
        
        $teacherId = auth()->id();
        $data = request()->validate([
            'name' => ['required', 'min:3','max:16'],
            'description' => ['required', 'min:5'],
            // 'teacher' => ['required', 'exists:users,id'],
            // 'rating' => ['required', 'numeric', 'min:1', 'max:5'],
           'image'=>['nullable','image','mimes:jpeg,png,jpg,gif','max:2048'],
            'tags' => ['string', 'max:255'], 
            
        ]);
     
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
             if ($request->hasFile('image')) {
              $imagePath = $request->file('image')->store('course_images', 'public');
              $course->image = $imagePath;
            }
                               
               $course->save();
                 $course_id = $course->id;

               
              // $file = new CourseContent();
              // $file->file_path = $url; 
               //$course->file()->save($file); 
               
               return redirect()->route('Add.create', ['course_id' => $course->id]);
        // if(isset($data['tags'])){
        //     $tags = Tag::whereIn('name', $data['tags'])->pluck('id');
        //     $course->tags()->sync($tags);
        // }
    
       
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


    public function enroll($id)
    {
        // Get the authenticated user
        $user = Auth::user();
    
        // Get the course ID from the route parameter
        $courseId = $id;
    
        // Check if the user is already enrolled in the course
        // if ($user->courses()->where('course_id', $courseId)->exists()) {
        //     return redirect()->route('courses.show',['id'=>$courseId])->with('error', 'You are already enrolled in this course.');
        // }
    
        // $user->courses()->attach($courseId);
    
        return redirect()->route('payment.index', ['id' => $id]);

    }
        public function search(Request $request)
        {
            $query = $request->input('search');
            $page = $request->input('page', 1);
        
            $courses = Course::where('name', 'like', "%$query%")
                ->orWhere('tags', 'like', "%$query%")
                ->orWhere('teacher', 'like', "%$query%")
                ->paginate(3, ['*'], 'page', $page)
                ->appends(['search' => $query]);
        
            return view('search-results', compact('courses', 'query', 'page'));
        }
        
    public function tag($tag)
    {
    $courses = Course::where('tags', 'like', "%$tag%")->get();
    
    return view('courses.tag', compact('courses'));
}


}
    
