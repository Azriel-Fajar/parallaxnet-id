<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\CourseCategory;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            'basic-course' => [
                'Basic Cloud Computing',
                'Cyber Security Basic',
                'Software Engineering',
                'Basic Networking',
                'Introduction to Python',
                'Business Course',
                'Techpreneur',
            ],
            'web-bootcamp' => [
                'Full Stack Development',
                'Introduction to JavaScript',
                'Basic HTML and CSS',
                'Databases',
                'Web Hosting',
            ],
            'ai-bootcamp' => [
                'Introduction to Artificial Intelligence',
                'Introduction to Machine Learning',
                'Machine Learning with Python',
                'Practical Statistics for ML with Python',
                'Linear Algebra for Machine Learning',
                'Deep Learning with Python',
            ],
            'hacker-bootcamp' => [
                'Advanced Cybersecurity for Professionals',
                'Basic Ethical Hacking',
                'Advanced Ethical Hacking',
            ],
            'profesional' => [
                'Cybersecurity',
                'Ethical Hacker',
                'IoT',
            ],
            'english' => [
                'English',
            ],
        ];

        foreach ($data as $slug => $courses) {
            $category = CourseCategory::where('slug', $slug)->first();
            if (! $category) {
                continue;
            }
            foreach ($courses as $i => $name) {
                Course::updateOrCreate(
                    ['course_category_id' => $category->id, 'name' => $name],
                    ['sort_order' => $i + 1]
                );
            }
        }
    }
}
