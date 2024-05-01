<?php

namespace App\Services;

use App\Models\Course;
use App\Models\CourseContent;

class CourseService
{
    public function getCourseAndContents($courseId)
    {
        $course = Course::findOrFail($courseId);
        $contents = $course->contents;

        return ['course' => $course, 'contents' => $contents];
    }
}
