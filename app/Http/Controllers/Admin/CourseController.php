<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Courses;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreCourseRequest;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $home = Courses::where('status', 'ACTIVE')
                    ->orderBy('created_at', 'desc')
                    ->get();
       $title = 'Courses';
       $breadcrumbs = [
        ['label' => 'Dashboard', 'url' => route('admin.dashboard')],
        ['label' => 'Courses', 'url' => route('admin.courses')],
    ];
        $courses = Courses::all();
        return view('admin.courses.index', compact('courses', 'breadcrumbs', 'title'));
    }

    public function add()
    {
        $title = 'Add Course';
        $breadcrumbs = [
            ['label' => 'Dashboard', 'url' => route('admin.dashboard')],
            ['label' => 'Courses', 'url' => route('admin.courses')],
            ['label' => 'Add Course', 'url' => route('admin.courses.add')],
            ];
            return view('admin.courses.add', compact('title', 'breadcrumbs'));
    }

     public function store(StoreCourseRequest $request)
    {
        $image = null;
    if ($request->hasFile('image')) {
        $image = $request->file('image')->store('courses', 'public');
    }



    try {
        Courses::create([
            'courseName' => $request->input('courseName'),
            'courseHeading' => $request->input('courseHeading'),
            'courseText' => $request->input('courseText'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'duration' => $request->input('duration'),
            'endDuration' => $request->input('endDuration'),
            'rating' => $request->input('rating'),
            'teacherName' => $request->input('teacherName'),
            'status' => $request->input('status'),
            'image' => $image,
        ]);

        return redirect()->route('admin.courses')->with('success', 'Record added successfully.');
    } catch (\Exception $e) {
        return back()->withErrors(['error' => 'There was an issue saving the record: ' . $e->getMessage()]);
    }
    }

    public function show($id)
    {
        $course = Courses::find($id);
        $title = 'View Course';
        $breadcrumbs = [
            ['label' => 'Dashboard', 'url' => route('admin.dashboard')],
            ['label' => 'Courses', 'url' => route('admin.courses')],
            ['label' => 'View', 'url' => 'admin.courses.show'],
        ];
            return view('admin.courses.show', compact('course', 'title', 'breadcrumbs'));
    }

        public function edit($id)
    {
        $course = Courses::find($id);
        $title = 'Edit Course';
        $breadcrumbs = [
            ['label' => 'Dashboard', 'url' => route('admin.dashboard')],
            ['label' => 'Courses', 'url' => route('admin.courses')],
            ['label' => 'Edit Course', 'url' => route('admin.courses.edit', $id)],
        ];
        return view('admin.courses.edit', compact('course', 'title', 'breadcrumbs'));
    }


    public function update(StoreCourseRequest $request, $id)
    {
        $validatedData = $request->validated();

    // dd($validatedData);

    $courses = Courses::findOrFail($id);

    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('home', 'public');
        $validatedData['image'] = $imagePath;

        if ($courses->image) {
            Storage::disk('public')->delete($courses->image);
        }
    } else {
        $validatedData['image'] = $courses->image;
    }

    try {
        $courses->update($validatedData);
        return redirect()->route('admin.courses')->with('success', 'Record updated successfully');
    } catch (\Exception $e) {
        return back()->withErrors(['error' => 'There was an issue updating the record. Please try again.']);
    }

    }


    public function destroy($id)
{
    $totalCourses = Courses::count();

    if ($totalCourses <= 1) {
        return redirect()->route('admin.courses')->withErrors(['error' => 'Cannot delete the last remaining record.']);
    }

    $courses = Courses::findOrFail($id);

    try {
        $courses->delete();
        return redirect()->route('admin.courses')->with('success', 'Record deleted successfully.');
    } catch (\Exception $e) {
        return redirect()->route('admin.courses')->withErrors(['error' => 'There was an issue deleting the record. Please try again.']);
    }
}
}
