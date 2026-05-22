<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminCourseCategoryController;
use App\Http\Controllers\AdminCourseController;
use App\Http\Controllers\AdminFaqController;
use App\Http\Controllers\AdminTestimonialController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BootcampController;
use App\Http\Controllers\GalleriController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KurikulumController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProfesionalController;
use App\Http\Middleware\Admin;
use App\Http\Middleware\PreventBackHistory;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/tentang-kami', [HomeController::class, 'tentangKami'])->name('tentangKami');
Route::get('/berita', [NewsController::class, 'index'])->name('berita');
Route::get('/kursus', [HomeController::class, 'allCourses'])->name('courses.all');
Route::get('/galeri', [GalleriController::class, 'index'])->name('galeri');

Route::prefix('tentang-kami')->group(function () {
    Route::get('/benefit', [HomeController::class, 'benefit'])->name('benefit');
    Route::get('/teknologi', [HomeController::class, 'teknologi'])->name('teknologi');
    Route::get('/os', [HomeController::class, 'os'])->name('os');
    Route::get('/impact', [HomeController::class, 'impact'])->name('impact');
});

// KURIKULUM

Route::prefix('kurikulum')->group(function () {
    Route::get('/', [KurikulumController::class, 'index'])->name('kurikulum');
    Route::get('/standar', [KurikulumController::class, 'kursusStandar'])->name('standar');
    Route::get('/inggris', [KurikulumController::class, 'kursusInggris'])->name('inggris');

    Route::prefix('bootcamp')->group(function () {
        Route::get('/', [KurikulumController::class, 'kursusBootcamp'])->name('bootcamp');
        Route::redirect('/full-stack-developer', '/kurikulum/bootcamp/hacker', 301);
        Route::get('/web-developer', [BootcampController::class, 'webDev'])->name('bootcamp.webdev');
        Route::get('/ai', [BootcampController::class, 'ai'])->name('bootcamp.ai');
        Route::get('/hacker', [BootcampController::class, 'hacker'])->name('bootcamp.hacker');
    });

    Route::prefix('profesional')->group(function () {
        Route::get('/', [KurikulumController::class, 'kursusProfesional'])->name('profesional');
        Route::get('/cyber-security', [ProfesionalController::class, 'cyberSecurity'])->name('profesional.cybersecurity');
        Route::get('/ethical-hacker', [ProfesionalController::class, 'ethicalHacker'])->name('profesional.ethicalhacker');
        Route::get('/iot', [ProfesionalController::class, 'iot'])->name('profesional.iot');
    });
});

// Fallback Route

Route::fallback(function () {
    return view('fallback');
});

// Admin Routes
Route::middleware(['auth', Admin::class, PreventBackHistory::class])->prefix('admin')->group(function () {
    // Dashboard + section pages
    Route::get('/', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/berita', [AdminController::class, 'news'])->name('admin.news');
    Route::get('/slider', [AdminController::class, 'slider'])->name('admin.slider');
    Route::get('/dokumen', [AdminController::class, 'document'])->name('admin.document');
    Route::get('/mitra', [AdminController::class, 'university'])->name('admin.university');
    Route::get('/video', [AdminController::class, 'video'])->name('admin.video');
    Route::get('/kursus', [AdminController::class, 'courses'])->name('admin.courses');
    Route::get('/testimoni', [AdminController::class, 'testimonials'])->name('admin.testimonials');
    Route::get('/faq', [AdminController::class, 'faqs'])->name('admin.faqs');

    // Back-compat: redirect /admin/admin → /admin (dashboard).
    // Inside prefix('admin'), the path '/admin' resolves to the full URL /admin/admin,
    // while the redirect target '/admin' is an absolute path pointing to the dashboard.
    // This is NOT a loop — source is /admin/admin, destination is /admin.
    Route::redirect('/admin', '/admin');

    Route::post('/upload-news', [AdminController::class, 'uploadNews'])->name('admin.upload.news');
    Route::post('/upload-slider', [AdminController::class, 'uploadSliderImage'])->name('admin.upload.slider');
    Route::post('/upload-doc', [AdminController::class, 'uploadDocImage'])->name('admin.upload.doc');
    Route::post('/upload-university', [AdminController::class, 'uploadUnivImage'])->name('admin.upload.university');
    Route::post('/upload-video', [AdminController::class, 'uploadVideo'])->name('admin.upload.video');

    Route::delete('/slider/delete/{id}', [AdminController::class, 'deleteSlider'])->name('admin.delete.slider');
    Route::delete('/news/delete/{id}', [AdminController::class, 'deleteNews'])->name('admin.delete.news');
    Route::delete('/doc/delete/{id}', [AdminController::class, 'deleteDoc'])->name('admin.delete.doc');
    Route::delete('/university/delete/{id}', [AdminController::class, 'deleteUniv'])->name('admin.delete.university');
    Route::delete('/video/delete/{id}', [AdminController::class, 'deleteVideo'])->name('admin.delete.video');
    Route::post('/video/activate/{id}', [AdminController::class, 'activateVideo'])->name('admin.activate.video');

    // FAQ CRUD
    Route::post('/faqs', [AdminFaqController::class, 'store'])->name('admin.faqs.store');
    Route::put('/faqs/{id}', [AdminFaqController::class, 'update'])->name('admin.faqs.update');
    Route::delete('/faqs/{id}', [AdminFaqController::class, 'destroy'])->name('admin.faqs.destroy');
    Route::post('/faqs/{id}/move-up', [AdminFaqController::class, 'moveUp'])->name('admin.faqs.up');
    Route::post('/faqs/{id}/move-down', [AdminFaqController::class, 'moveDown'])->name('admin.faqs.down');

    // Testimonial CRUD
    Route::post('/testimonials', [AdminTestimonialController::class, 'store'])->name('admin.testimonials.store');
    Route::put('/testimonials/{id}', [AdminTestimonialController::class, 'update'])->name('admin.testimonials.update');
    Route::delete('/testimonials/{id}', [AdminTestimonialController::class, 'destroy'])->name('admin.testimonials.destroy');
    Route::post('/testimonials/{id}/move-up', [AdminTestimonialController::class, 'moveUp'])->name('admin.testimonials.up');
    Route::post('/testimonials/{id}/move-down', [AdminTestimonialController::class, 'moveDown'])->name('admin.testimonials.down');

    // Course Category CRUD
    Route::post('/course-categories', [AdminCourseCategoryController::class, 'store'])->name('admin.categories.store');
    Route::put('/course-categories/{id}', [AdminCourseCategoryController::class, 'update'])->name('admin.categories.update');
    Route::delete('/course-categories/{id}', [AdminCourseCategoryController::class, 'destroy'])->name('admin.categories.destroy');

    // Course CRUD
    Route::post('/courses', [AdminCourseController::class, 'store'])->name('admin.courses.store');
    Route::put('/courses/{id}', [AdminCourseController::class, 'update'])->name('admin.courses.update');
    Route::delete('/courses/{id}', [AdminCourseController::class, 'destroy'])->name('admin.courses.destroy');
    Route::post('/courses/{id}/move-up', [AdminCourseController::class, 'moveUp'])->name('admin.courses.up');
    Route::post('/courses/{id}/move-down', [AdminCourseController::class, 'moveDown'])->name('admin.courses.down');
});

// Auth Routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit')->middleware('throttle:5,1');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
