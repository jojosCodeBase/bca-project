<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CoursesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Function to generate a random 4-digit number
        function generateRandomNumber() {
            return str_pad(mt_rand(0, 9999), 4, '0', STR_PAD_LEFT);
        }

        // Function to generate a course ID with "CA" prefix and 4 random digits
        function generateCourseId() {
            return "CA" . generateRandomNumber();
        }

        // Array of sample subjects
        $subjects = [
            "Mathematics",
            "Physics",
            "Chemistry",
            "Biology",
            "English",
            "History",
            "Geography",
            "Computer Science",
            "Economics",
            "Psychology",
            "Sociology",
            "Art",
            "Music",
            "Physical Education",
            "Business Studies",
            "Accounting",
            "Foreign Language",
            "Environmental Science",
            "Political Science",
            "Health Education"
        ];

        // Generate course seeder for 20 subjects
        $courses = [];
        $courseTypes = ['MCA', 'BCA'];
        for ($i = 0; $i < 20; $i++) {
            // Randomly select course type
            $courseType = $courseTypes[array_rand($courseTypes)];
            $courseId = generateCourseId();
            $subjectIndex = array_rand($subjects);
            $subject = $subjects[$subjectIndex];
            $courses[] = ['cid' => $courseId, 'cname' => $subject, 'course' => $courseType];
        }

        // Insert courses into the database
        DB::table('courses')->insert($courses);
    }
}
