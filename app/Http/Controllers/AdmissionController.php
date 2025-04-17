<?php

namespace App\Http\Controllers;
use App\Models\Philosophy;
use App\Models\Admissions;
use Illuminate\Http\Request;

class AdmissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $admissions = Admissions::all();
        $philosophy = Philosophy::all();
       return view('admissions.admission', compact('philosophy' , 'admissions'));
    }
}
