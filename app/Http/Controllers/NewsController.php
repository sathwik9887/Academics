<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Philosophy;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function show($id)
    {
        $philosophy = Philosophy::all();
        $new = News::find($id);
        return view('news.show', compact('new', 'philosophy'));
    }
}
