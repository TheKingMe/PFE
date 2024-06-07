<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
class admincontroller extends Controller
{
    public function index(){
        $courses = Course::paginate(6);
        
        return view('adminstration',compact('courses'));
    }
}
