<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Section; // Update the model name to follow Laravel naming conventions
use App\Models\SectionContents;
use Illuminate\Support\Facades\DB;


class SectionController extends Controller
{
    
       
       
        public function create($course_id) {
            $sections = Section::all(); // Retrieve sections from the database or wherever they come from
            return view('add')->with('section', $sections)->with('course_id', $course_id);
        }
        

    public function store(Request $request){
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => ['required', 'min:4'],
            'description' => ['required', 'min:12'],
            'course_id' => ['required', 'exists:courses,id'],
        ]);
       
        $course_id = $validatedData['course_id'];

        // Assign a static value for course_id
         // Replace 1 with the actual course ID you want to assign

        // Create a new section using the validated data, including course_id
        $section = Section::create($validatedData);



        // Redirect the user after successfully creating the section
        return redirect()->route('Add.create', ['course_id' => $course_id])->with('success', 'Section created successfully!');

    }

    public function delete($id)
    {
        // Find the section by its ID and delete it
        $section = Section::findOrFail($id);
        $section->delete();
    
        // Redirect back with a success message or any other response
        return redirect()->back()->with('success', 'Section deleted successfully');
    }
}
