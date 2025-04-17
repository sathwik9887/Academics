<?php

namespace App\Http\Controllers;

use App\Models\Courses;
use App\Models\Cart;
use App\Models\Philosophy;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $philosophy = Philosophy::all();
        $courses = Courses::all();
        return view('courses.index', compact('courses', 'philosophy'));
    }

    public function show($id)
{

    $philosophy = Philosophy::all();
    $course = Courses::findOrFail($id);


    return view('courses.show', compact('course', 'philosophy'));
}



}
