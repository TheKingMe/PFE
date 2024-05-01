<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Course;

class CoursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Sample course data
        $courses = [
            [
                'name' => 'Course 1',
                'teacher' => 'Teacher A',
                'rating' => 5,
                'tags' => 'tag1, tag2',
                'description' => 'Description for Course 1',
            ],
            [
                'name' => 'Course 2',
                'teacher' => 'Teacher B',
                'rating' => 4,
                'tags' => 'tag2, tag3',
                'description' => 'Description for Course 2',
            ],
            // Add more courses as needed
        ];

        // Insert data into 'courses' table
        foreach ($courses as $courseData) {
            Course::create($courseData);
        }
    }
}
