<?php
use App\Http\Controllers\Admin\AboutController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\AcademicsController;
use App\Http\Controllers\Admin\TeacherController;
use App\Http\Controllers\Admin\UniversityController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\PhilosophyController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AdmissionController;
use App\Http\Controllers\Admin\NewsletterController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Middleware\AdminMiddleware;


/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "admin" middleware group. Now create something great!
|
*/

Route::middleware(['admin.auth'])->group(function () {
Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
Route::get('/admin/logout', [AuthController::class, 'logout'])->name('admin.auth.logout');

Route::get('/admin/home', [HomeController::class, 'index'])->name('admin.home');
Route::get('/admin/home/show{id}', [HomeController::class, 'show'])->name('admin.home.show');
Route::get('/admin/home/edit{id}', [HomeController::class, 'edit'])->name('admin.home.edit');
Route::post('/admin/home/{id}', [HomeController::class, 'update'])->name('admin.home.update');
Route::get('/admin/home/add', [HomeController::class, 'add'])->name('admin.home.add');
Route::post('/admin/home', [HomeController::class, 'store'])->name('admin.home.store');
Route::get('/admin/home/destroy{id}', [HomeController::class, 'destroy'])->name('admin.home.destroy');

Route::get('/admin/academics', [AcademicsController::class, 'index'])->name('admin.academics');
Route::get('/admin/academics/show{id}', [AcademicsController::class, 'show'])->name('admin.academics.show');
Route::get('/admin/academics/edit{id}', [AcademicsController::class, 'edit'])->name('admin.academics.edit');
Route::post('/admin/academics/{id}', [AcademicsController::class, 'update'])->name('admin.academics.update');
Route::get('/admin/academics/add', [AcademicsController::class, 'add'])->name('admin.academics.add');
Route::post('/admin/academics', [AcademicsController::class, 'store'])->name('admin.academics.store');
Route::get('/admin/academics/destroy{id}', [AcademicsController::class, 'destroy'])->name('admin.academics.destroy');

Route::get('/admin/courses', [CourseController::class, 'index'])->name('admin.courses');
Route::get('/admin/courses/show{id}', [CourseController::class, 'show'])->name('admin.courses.show');
Route::get('/admin/courses/edit{id}', [CourseController::class, 'edit'])->name('admin.courses.edit');
Route::post('/admin/courses/{id}', [CourseController::class, 'update'])->name('admin.courses.update');
Route::get('/admin/courses/add', [CourseController::class, 'add'])->name('admin.courses.add');
Route::post('/admin/courses', [CourseController::class, 'store'])->name('admin.courses.store');
Route::get('/admin/courses/destroy{id}', [CourseController::class, 'destroy'])->name('admin.courses.destroy');

Route::get('/admin/university', [UniversityController::class, 'index'])->name('admin.university');
Route::get('/admin/university/show{id}', [UniversityController::class, 'show'])->name('admin.university.show');
Route::get('/admin/university/edit{id}', [UniversityController::class, 'edit'])->name('admin.university.edit');
Route::post('/admin/university/{id}', [UniversityController::class, 'update'])->name('admin.university.update');

Route::get('/admin/testimonials', [TestimonialController::class, 'index'])->name('admin.testimonials');
Route::get('/admin/testimonials/show{id}', [TestimonialController::class, 'show'])->name('admin.testimonials.show');
Route::get('/admin/testimonials/edit{id}', [TestimonialController::class, 'edit'])->name('admin.testimonials.edit');
Route::post('/admin/testimonials/{id}', [TestimonialController::class, 'update'])->name('admin.testimonials.update');
Route::get('/admin/testimonials/add', [TestimonialController::class, 'add'])->name('admin.testimonials.add');
Route::post('/admin/testimonials', [TestimonialController::class, 'store'])->name('admin.testimonials.store');
Route::get('/admin/testimonials/destroy{id}', [TestimonialController::class, 'destroy'])->name('admin.testimonials.destroy');

Route::get('/admin/about', [AboutController::class, 'index'])->name('admin.about');
Route::get('/admin/about/show{id}', [AboutController::class, 'show'])->name('admin.about.show');
Route::get('/admin/about/edit{id}', [AboutController::class, 'edit'])->name('admin.about.edit');
Route::post('/admin/about/{id}', [AboutController::class, 'update'])->name('admin.about.update');
Route::get('/admin/about/add', [AboutController::class, 'add'])->name('admin.about.add');
Route::post('/admin/about', [AboutController::class, 'store'])->name('admin.about.store');
Route::get('/admin/about/destroy{id}', [AboutController::class, 'destroy'])->name('admin.about.destroy');

Route::get('/admin/teachers', [TeacherController::class, 'index'])->name('admin.teachers');
Route::get('/admin/teachers/show{id}', [TeacherController::class, 'show'])->name('admin.teachers.show');
Route::get('/admin/teachers/edit{id}', [TeacherController::class, 'edit'])->name('admin.teachers.edit');
Route::post('/admin/teachers/{id}', [TeacherController::class, 'update'])->name('admin.teachers.update');
Route::get('/admin/teachers/add', [TeacherController::class, 'add'])->name('admin.teachers.add');
Route::post('/admin/teachers', [TeacherController::class, 'store'])->name('admin.teachers.store');
Route::get('/admin/teachers/destroy{id}', [TeacherController::class, 'destroy'])->name('admin.teachers.destroy');

Route::get('/admin/philosophy', [PhilosophyController::class, 'index'])->name('admin.philosophy');
Route::get('/admin/philosophy/show{id}', [PhilosophyController::class, 'show'])->name('admin.philosophy.show');
Route::get('/admin/philosophy/edit{id}', [PhilosophyController::class, 'edit'])->name('admin.philosophy.edit');
Route::post('/admin/philosophy/{id}', [PhilosophyController::class, 'update'])->name('admin.philosophy.update');
Route::get('/admin/philosophy/destroy{id}', [PhilosophyController::class, 'destroy'])->name('admin.philosophy.destroy');

Route::get('/admin/users', [UserController::class, 'index'])->name('admin.users');
Route::get('/admin/users/show{id}', [UserController::class, 'show'])->name('admin.users.show');

Route::get('/admin/newsletter', [NewsletterController::class, 'index'])->name('admin.newsletter');
Route::get('/admin/newsletter/show{id}', [NewsletterController::class, 'show'])->name('admin.newsletter.show');
Route::get('/admin/newsletter/destroy{id}', [NewsletterController::class, 'destroy'])->name('admin.newsletter.destroy');

Route::get('/admin/admissions', [AdmissionController::class, 'index'])->name('admin.admissions');
Route::get('/admin/admissions/show{id}', [AdmissionController::class, 'show'])->name('admin.admissions.show');
Route::get('/admin/admissions/edit{id}', [AdmissionController::class, 'edit'])->name('admin.admissions.edit');
Route::post('/admin/admissions/{id}', [AdmissionController::class, 'update'])->name('admin.admissions.update');
Route::get('/admin/admissions/add', [AdmissionController::class, 'add'])->name('admin.admissions.add');
Route::post('/admin/admissions', [AdmissionController::class, 'store'])->name('admin.admissions.store');
Route::get('/admin/admissions/destroy{id}', [AdmissionController::class, 'destroy'])->name('admin.admissions.destroy');

Route::get('/admin/news', [NewsController::class, 'index'])->name('admin.news');
Route::get('/admin/news/show{id}', [NewsController::class, 'show'])->name('admin.news.show');
Route::get('/admin/news/edit{id}', [NewsController::class, 'edit'])->name('admin.news.edit');
Route::post('/admin/news/{id}', [NewsController::class, 'update'])->name('admin.news.update');
Route::get('/admin/news/add', [NewsController::class, 'add'])->name('admin.news.add');
Route::post('/admin/news', [NewsController::class, 'store'])->name('admin.news.store');
Route::get('/admin/news/destroy{id}', [NewsController::class, 'destroy'])->name('admin.news.destroy');

});

Route::middleware(['auth.guest'])->group(function () {
    Route::get('/admin/login', [AuthController::class, 'login'])->name('admin.auth.login');
    Route::post('/admin/login', [AuthController::class, 'processLogin'])->name('admin.auth.processLogin');
});


