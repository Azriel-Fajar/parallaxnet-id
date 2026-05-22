<?php

namespace App\Http\Controllers;

use App\Models\CourseCategory;
use App\Models\Testimonial;

class HomeController extends Controller
{
    public function index()
    {
        $courseCategories = CourseCategory::with(['courses' => fn ($q) => $q->orderBy('sort_order')])
            ->whereHas('courses')
            ->orderBy('sort_order')
            ->get();

        $testimonials = Testimonial::orderBy('sort_order')->get();

        return view('index', [
            'courseCategories' => $courseCategories,
            'testimonials' => $testimonials,
        ]);
    }

    public function allCourses()
    {
        $courseCategories = CourseCategory::with(['courses' => fn ($q) => $q->orderBy('sort_order')])
            ->orderBy('sort_order')
            ->get();

        $categoryRoutes = [
            'Basic Course'    => route('standar'),
            'Web Bootcamp'    => route('bootcamp.webdev'),
            'AI Bootcamp'     => route('bootcamp.ai'),
            'Hacker Bootcamp' => route('bootcamp.hacker'),
            'Profesional'     => route('profesional'),
            'English'         => route('inggris'),
        ];

        return view('courses.all', [
            'courseCategories' => $courseCategories,
            'categoryRoutes'   => $categoryRoutes,
        ]);
    }

    public function tentangKami()
    {
        return view('tentangKami');
    }

    public function benefit()
    {
        return view('benefit');
    }

    public function teknologi()
    {
        return view('teknologi');
    }

    public function os()
    {
        return view('os');
    }

    public function impact()
    {
        return view('impact');
    }
}
