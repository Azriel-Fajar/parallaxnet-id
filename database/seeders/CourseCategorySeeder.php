<?php

namespace Database\Seeders;

use App\Models\CourseCategory;
use Illuminate\Database\Seeder;

class CourseCategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Basic Course',    'slug' => 'basic-course',    'sort_order' => 1],
            ['name' => 'Web Bootcamp',    'slug' => 'web-bootcamp',    'sort_order' => 2],
            ['name' => 'AI Bootcamp',     'slug' => 'ai-bootcamp',     'sort_order' => 3],
            ['name' => 'Hacker Bootcamp', 'slug' => 'hacker-bootcamp', 'sort_order' => 4],
            ['name' => 'Profesional',     'slug' => 'profesional',     'sort_order' => 5],
            ['name' => 'English',         'slug' => 'english',         'sort_order' => 6],
        ];

        foreach ($categories as $cat) {
            CourseCategory::updateOrCreate(['slug' => $cat['slug']], $cat);
        }
    }
}
