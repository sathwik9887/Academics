<?php

namespace App\Http\Controllers;
use App\Models\Home;
use App\Models\Courses;
use App\Models\Academics;
use App\Models\Testimonials;
use App\Models\University;
use App\Models\About;
use App\Models\News;
use App\Models\Philosophy;
use Illuminate\Http\Request;

class HomeController extends Controller
{
   public function index()
   {

    $news = News::all();
    $philosophy = Philosophy::all();
    $about = About::all();
    $testimonials = Testimonials::all();
    $courses = Courses::all();
    $university = University::all();
    $academics = Academics::all();
    $home = Home::all();
    return view('home.index', compact('home', 'academics', 'courses', 'university', 'testimonials', 'about', 'philosophy', 'news'));
   }
}
