<?php

namespace App\Http\Controllers;

use App\Models\SectionContents;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log; // Add this namespace


class SectionContentController extends Controller
{


    public function edit(int $course_id)
    {
        $section = Section::where('course_id', $course_id)->firstOrFail(); // Example query
        $section_id = $section->id;
        
        return view('add')->with('section_id', $section_id)->with('course_id', $course_id);
    }
    public function store(Request $request,int $course_id){
     // Validate the incoming request data
     $validatedData = $request->validate([
        'file_name' => ['required'],
        'file_path' => ['required'],
        'file_type' => ['mimetypes:video/*,application/pdf'],// Allowed types (adjust as needed)
        'section_id' => ['exists:sections,id']
    ]);
    

    $file = $request->file('file_path');

    $fileType = $file->getClientOriginalExtension();
    $section = Section::where('course_id', $course_id)->firstOrFail(); // Example query
    $section_id = $section->id;
    
        $validatedData['file_type']=$fileType;
        $validatedData['section_id']=$section_id;
    $sectionContent = SectionContents::create($validatedData);
    
    try {
        $sectionContent->save();
        
// Define the target folder for uploaded videos
$target_directory = "video/*";

// Check if the video file was uploaded without errors
if (isset($_FILES["file_path"]) && $_FILES["video_file"]["error"] == UPLOAD_ERR_OK) {
    // Get the uploaded file name
    $video_name = $_FILES["file_path"]["name"];

    // Construct the path where the video will be stored
    $target_path = $target_directory . $video_name;

    // Move the uploaded video file to the target directory
    if (move_uploaded_file($_FILES["file_path"]["tmp_name"], $target_path)) {
        echo "The video file " . $video_name . " has been uploaded successfully.";
    } else {
        echo "Sorry, there was an error uploading your video file.";
    }
} else {
    echo "Sorry, there was an error uploading your video file.";
}
$sectionContent->save();

    } catch (\Exception $e) {
        // Log the error
        Log::error($e->getMessage());
    }
}
}