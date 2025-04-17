<?php

namespace App\Http\Controllers;
use App\Models\Academics;
use Illuminate\Http\Request;

class AcademicsController extends Controller
{
   public function show($id)
   {
    $academics = Academics::find($id);
     return view('academics.show', compact('academics') );
   }
}
