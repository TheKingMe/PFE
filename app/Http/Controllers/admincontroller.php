<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
class admincontroller extends Controller
{
    public function index(){
        $courses = Course::all();
        return view('adminstration',compact('courses'));
    }
}
