<?php

namespace App\Http\Controllers;

use App\Models\SectionContents;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log; // Add this namespace
use Illuminate\Support\Facades\Storage;


class SectionContentController extends Controller
{


    
    public function edit(int $course_id)
    {
        $section = Section::where('course_id', $course_id)->firstOrFail(); // Example query
        $section_id = $section->id;
        
        return view('add', compact('course_id', 'section_id')); // Pass both course_id and section_id to the view
    }
    public function store(Request $request,int $course_id){
        // Validate the incoming request data
        $validatedData = $request->validate([
            'file_name' => ['required'],
            'file_path' => ['required'],
            'file_type' => ['mimetypes:video/*,application/pdf'], // Allowed types (adjust as needed)
            'section_id' => ['exists:sections,id']
        ]);
        
        $file = $request->file('file_path');
        $file_name = $file->getClientOriginalName(); // Get the original file name

        // Retrieve the uploaded file
        // Get the file name and extension
        $fileExtension = $file->getClientOriginalExtension();   
    
        // Define the storage location and path
        $storagePath = 'uploads/'; // Adjust folder name if needed
        $fileName = uniqid('video_') . '.' . $file->getClientOriginalExtension();
        $filePath = $storagePath . $fileName; // Path within storage disk
    
        // Store the file using Laravel's storage helper
        $stored = Storage::disk('public')->put($filePath, $file); // Use 'public' or your defined disk
    
        $fileType = $file->getClientOriginalExtension();
        $section = Section::where('course_id', $course_id)->firstOrFail(); // Example query
        $section_id = $section->id;
        
        $validatedData['file_type']=$fileType;
        $validatedData['file_path']=$filePath;
        $validatedData['section_id']=$request->input('section_id');
        $sectionContent = SectionContents::create($validatedData);
        
        $sectionContent->save();
        return redirect()->back();
    }
    
}