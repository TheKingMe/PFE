<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\section;
use App\Models\course;
use App\Models\SectionContents;
use Illuminate\Support\Facades\Auth;
class coursepagecontroller extends Controller
{
   public function index(){



    $sections = section::all();
   
    return view(('courses/{id}'),compact('sections'));
   }
   public function delete($id){
      $course = course::findOrFail($id);  
      $course->delete(); // Delete the course

      return redirect()->route('adminstration')->with('message', 'Course deleted successfully');
   }
   public function approve(Request $request,$id)
   {
      $request->validate([
         'price' => 'required|numeric|min:0',
     ]);
       $course = Course::findOrFail($id);
       $course->approved = true;
       $course->price = $request->input('price');
       $course->save();
      

       return redirect()->route('adminstration')->with('message', 'Course approved successfully and price set');

   }
}
