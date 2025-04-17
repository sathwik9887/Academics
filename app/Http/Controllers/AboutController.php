<?php

namespace App\Http\Controllers;
use App\Models\About;
use App\Models\Philosophy;
use App\Models\Teachers;
use Illuminate\Http\Request;

class AboutController extends Controller
{
   public function index()
   {
      $philosophy = Philosophy::all();
      $teachers = Teachers::all();
      $about = About::all();
      return view('about.about', compact('about', 'teachers', 'philosophy'));
   }
}
