<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Section; // Update the model name to follow Laravel naming conventions
use App\Models\SectionContents;
use Illuminate\Support\Facades\DB;


class SectionController extends Controller
{
    
    public function index($course_id)
    {
        $sections = Section::where('course_id', $course_id)
                           ->orderBy('order')
                           ->paginate(4); // Adjust the number of items per page as needed
    
        $sectionIds = $sections->pluck('id');
    
        $sectionContents = SectionContents::whereIn('section_id', $sectionIds)->get();
    
        return view('sections.index', compact('sections', 'sectionContents', 'course_id'));
    }
     
        public function create($course_id) {
            $sectioncontents = SectionContents::all();
            $sections = Section::where('course_id', $course_id)
            ->orderBy('order')
            ->paginate(4); 
                        $videoContent = SectionContents::find($course_id);

              
         
            return view('add')->with('sections', $sections)->with('course_id', $course_id)->with('sectionContents', $sectioncontents);
            }

        // public function store(Request $request){
        //     // Validate the incoming request data
        //     $validatedData = $request->validate([
        //         'name' => ['required', 'min:4'],
        //         'description' => ['required', 'min:12'],
        //         'course_id' => ['required', 'exists:courses,id'],
        //     ]);
        
        //     $course_id = $validatedData['course_id'];

        //     // Assign a static value for course_id
        //     // Replace 1 with the actual course ID you want to assign

        //     // Create a new section using the validated data, including course_id
        //     $section = Section::create($validatedData);



        //     // Redirect the user after successfully creating the section
        //     return redirect()->route('Add.create', ['course_id' => $course_id])->with('success', 'Section created successfully!');

        // }
        public function store(Request $request)
        {
            // Validate the incoming request data
            $validatedData = $request->validate([
                'name' => ['required', 'min:4'],
                'description' => ['required', 'min:12'],
                'course_id' => ['required', 'exists:courses,id'],
            ]);
        
            $course_id = $validatedData['course_id'];
        
            // Get the maximum order value for sections within the specified course
            $maxOrder = Section::where('course_id', $course_id)->max('order');
        
            // If no sections exist for the course, start order from 1
            if (!$maxOrder) {
                $maxOrder = 0;
            }
        
            // Increment the maximum order to create the new order value
            $newOrder = $maxOrder + 1;
        
            // Assign the new order value and course ID to the validated data
            $validatedData['order'] = $newOrder;
            $validatedData['course_id'] = $course_id;
        
            // Create a new section using the validated data
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
    public function changeOrderRange(Request $request, $course_id)
    {
        $startOrder = $request->input('startOrder');
        $endOrder = $request->input('endOrder');
    
    
        // Fetch the section at the start of the range
        $startSection = Section::where('course_id', $course_id)
                               ->where('order', $startOrder)
                               ->first();
    
        // Fetch the section at the end of the range
        $endSection = Section::where('course_id', $course_id)
                             ->where('order', $endOrder)
                             ->first();
    
        // Check if both sections exist
        if (!$startSection || !$endSection) {
            return redirect()->back()->withErrors(['One or both sections not found.']);
        }
    
        // Swap the order values
        $tempOrder = $startSection->order;
        $startSection->order = $endSection->order;
        $endSection->order = $tempOrder;
    
        // Save the updated sections
        $startSection->save();
        $endSection->save();
    
        return redirect()->back()->with('success_change_order', 'Order swapped successfully.');
    }
    }
