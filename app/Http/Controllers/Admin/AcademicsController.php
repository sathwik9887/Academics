<?php

namespace App\Http\Controllers\Admin;
use App\Models\Academics;
use App\Http\Requests\StoreAcademicsRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AcademicsController extends Controller
{
    public function index()
    {
       $academics = Academics::orderBy('created_at', 'desc')->get();
       $title = 'Academics';
       $breadcrumbs = [
        ['label' => 'Dashboard', 'url' => route('admin.dashboard')],
        ['label' => 'Academics', 'url' => route('admin.academics')],
    ];
        return view('admin.academics.index', compact('academics', 'breadcrumbs', 'title'));
    }

    public function add()
    {
        $academics = Academics::all();
        $title = 'Add Academics';
        $breadcrumbs = [
        ['label' => 'Dashboard', 'url' => route('admin.dashboard')],
        ['label' => 'Academics', 'url' => route('admin.academics')],
        ['label' => 'Add', 'url' => route('admin.academics.add')],
    ];
        return view('admin.academics.add', compact('academics', 'breadcrumbs', 'title'));
    }

    public function store(StoreAcademicsRequest $request)
    {
        $image = null;
    if ($request->hasFile('image')) {
        $image = $request->file('image')->store('academics', 'public');
    }

    try {
        Academics::create([
            'title' => $request->input('title'),
            'icon' => $request->input('icon'),
             'description' => $request->input('description'),
            'status' => $request->input('status'),
            'image' => $image,
        ]);

        return redirect()->route('admin.academics')->with('success', 'Record added successfully.');
    } catch (\Exception $e) {
        return back()->withErrors(['error' => 'There was an issue saving the record: ' . $e->getMessage()]);
    }
    }

    public function edit($id)
    {
       $academics = Academics::findOrFail($id);
       $title = 'Edit Academics';
       $breadcrumbs = [
        ['label' => 'Dashboard', 'url' => route('admin.dashboard')],
        ['label' => 'Academics', 'url' => route('admin.academics')],
        ['label' => 'Edit', 'url' => 'admin.academics.edit'],
    ];
        return view('admin.academics.edit', compact('academics', 'breadcrumbs', 'title'));
    }

    public function update(StoreAcademicsRequest $request, $id)
    {
    $validatedData = $request->validated();

    // dd($validatedData);

    $academics = Academics::findOrFail($id);

    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('academics', 'public');
        $validatedData['image'] = $imagePath;

        if ($academics->image) {
            Storage::disk('public')->delete($academics->image);
        }
    } else {
        $validatedData['image'] = $academics->image;
    }

    try {
        $academics->update($validatedData);
        return redirect()->route('admin.academics')->with('success', 'Record updated successfully');
    } catch (\Exception $e) {
        return back()->withErrors(['error' => 'There was an issue updating the record. Please try again.']);
    }
    }


    public function show($id)
    {
        $academics = Academics::findOrFail($id);
         $title = 'View Academics';
        $breadcrumbs = [
        ['label' => 'Dashboard', 'url' => route('admin.dashboard')],
        ['label' => 'Academics', 'url' => route('admin.academics')],
        ['label' => 'View', 'url' => 'admin.academics.show'],
    ];
        return view('admin.academics.show', compact('academics', 'breadcrumbs', 'title'));
    }

    public function destroy($id)
{
    $totalacademicss = Academics::count();

    if ($totalacademicss <= 1) {
        return redirect()->route('admin.academics')->withErrors(['error' => 'Cannot delete the last remaining record.']);
    }

    $academics = Academics::findOrFail($id);

    try {
        $academics->delete();
        return redirect()->route('admin.academics')->with('success', 'Record deleted successfully.');
    } catch (\Exception $e) {
        return redirect()->route('admin.academics')->withErrors(['error' => 'There was an issue deleting the record. Please try again.']);
    }
}
}
