<?php

namespace App\Http\Controllers\Admin;
use App\Models\Teachers;
use App\Http\Requests\StoreTeacherRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index()
    {
        $teachers = Teachers::where('status', 'ACTIVE')
                    ->orderBy('created_at', 'desc')
                    ->get();
       $title = 'Teachers';
       $breadcrumbs = [
        ['label' => 'Dashboard', 'url' => route('admin.dashboard')],
        ['label' => 'Teachers', 'url' => route('admin.teachers')],
    ];
        return view('admin.teachers.index', compact('teachers', 'title', 'breadcrumbs'));
    }

     public function add()
    {
        $title = 'Add Teacher';
        $breadcrumbs = [
            ['label' => 'Dashboard', 'url' => route('admin.dashboard')],
            ['label' => 'Teachers', 'url' => route('admin.teachers')],
            ['label' => 'Add', 'url' => route('admin.teachers.add')],
        ];
        return view('admin.teachers.add', compact('title', 'breadcrumbs'));
    }
     public function store(StoreTeacherRequest $request)
    {
        $image = null;
    if ($request->hasFile('image')) {
        $image = $request->file('image')->store('courses', 'public');
    }



    try {
        teachers::create([
            'name' => $request->input('name'),
            'role' => $request->input('role'),
            'description' => $request->input('description'),
            'status' => $request->input('status'),
            'image' => $image,
        ]);

        return redirect()->route('admin.teachers')->with('success', 'Record added successfully.');
    } catch (\Exception $e) {
        return back()->withErrors(['error' => 'There was an issue saving the record: ' . $e->getMessage()]);
    }
    }

    public function edit($id)
    {
        $teachers = Teachers::find($id);
        $title = 'Edit Teacher';
        $breadcrumbs = [
            ['label' => 'Dashboard', 'url' => route('admin.dashboard')],
            ['label' => 'Teacher', 'url' => route('admin.teachers')],
            ['label' => 'Edit', 'url' => route('admin.teachers.edit', $teachers->id)],
            ];
            return view('admin.teachers.edit', compact('teachers', 'title', 'breadcrumbs'));
    }

    public function update(StoreTeacherRequest $request, $id)
    {
    $validatedData = $request->validated();

    // dd($validatedData);

    $teachers = Teachers::findOrFail($id);

    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('teachers', 'public');
        $validatedData['image'] = $imagePath;

        if ($teachers->image) {
            Storage::disk('public')->delete($teachers->image);
        }
    } else {
        $validatedData['image'] = $teachers->image;
    }

    try {
        $teachers->update($validatedData);
        return redirect()->route('admin.teachers')->with('success', 'Record updated successfully');
    } catch (\Exception $e) {
        return back()->withErrors(['error' => 'There was an issue updating the record. Please try again.']);
    }
    }

    public function show($id)
    {
        $teachers = Teachers::findOrFail($id);
        $title = 'View Testimonial';
        $breadcrumbs = [
            ['label' => 'Dashboard', 'url' => route('admin.dashboard')],
            ['label' => 'Teacher', 'url' => route('admin.teachers')],
            ['label' =>  'View', 'url' => route('admin.teachers.show', $id)],
            ];
            return view('admin.teachers.show', compact('teachers', 'title', 'breadcrumbs'));
    }

     public function destroy($id)
{
    $totalteachers = Teachers::count();

    if ($totalteachers <= 1) {
        return redirect()->route('admin.teachers')->withErrors(['error' => 'Cannot delete the last remaining record.']);
    }

    $teachers = teachers::findOrFail($id);

    try {
        $teachers->delete();
        return redirect()->route('admin.teachers')->with('success', 'Record deleted successfully.');
    } catch (\Exception $e) {
        return redirect()->route('admin.teachers')->withErrors(['error' => 'There was an issue deleting the record. Please try again.']);
    }
}
}
