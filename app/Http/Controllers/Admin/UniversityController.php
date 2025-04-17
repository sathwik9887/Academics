<?php

namespace App\Http\Controllers\Admin;
use App\Models\University;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreUniversityRequest;
use Illuminate\Http\Request;

class UniversityController extends Controller
{
    public function index()
    {
        $university = University::where('status', 'ACTIVE')
                    ->orderBy('created_at', 'desc')
                    ->get();
       $title = 'University';
       $breadcrumbs = [
        ['label' => 'Dashboard', 'url' => route('admin.dashboard')],
        ['label' => 'University', 'url' => route('admin.university')],
    ];
        $university = University::all();
        return view('admin.university.index', compact('university', 'title', 'breadcrumbs'));
    }

    public function show($id)
    {
        $title = 'View University';
       $breadcrumbs = [
        ['label' => 'Dashboard', 'url' => route('admin.dashboard')],
        ['label' => 'University', 'url' => route('admin.university')],
        ['label' => 'View', 'url' => 'admin.university.view'],
       ];
        $university = University::findOrFail($id);
        return view('admin.university.show', compact('university', 'title', 'breadcrumbs'));
    }

    public function edit($id)
    {
         $title = 'View University';
       $breadcrumbs = [
        ['label' => 'Dashboard', 'url' => route('admin.dashboard')],
        ['label' => 'University', 'url' => route('admin.university')],
        ['label' => 'Edit', 'url' => 'admin.university.edit'],
       ];
        $university = University::findOrFail($id);
        return view('admin.university.edit', compact('university', 'title', 'breadcrumbs'));
    }

    public function update(StoreUniversityRequest $request, $id)
    {
        $validatedData = $request->validated();

    // dd($validatedData);

    $university = University::findOrFail($id);

    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('university', 'public');
        $validatedData['image'] = $imagePath;

        if ($university->image) {
            Storage::disk('public')->delete($university->image);
        }
    } else {
        $validatedData['image'] = $university->image;
    }

    try {
        $university->update($validatedData);
        return redirect()->route('admin.university')->with('success', 'Record updated successfully');
    } catch (\Exception $e) {
        return back()->withErrors(['error' => 'There was an issue updating the record. Please try again.']);
    }

    }
}
