<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Http\Requests\StoreAboutRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
       $about = About::orderBy('created_at', 'desc')->get();
       $title = 'About';
       $breadcrumbs = [
        ['label' => 'Dashboard', 'url' => route('admin.dashboard')],
        ['label' => 'About', 'url' => route('admin.about')],
    ];
        return view('admin.about.index', compact('about', 'breadcrumbs', 'title'));
    }

    public function add()
    {
        $title = 'Add About';
        $breadcrumbs = [
            ['label' => 'Dashboard', 'url' => route('admin.dashboard')],
            ['label' => 'About', 'url' => route('admin.about')],
            ['label' => 'Add About', 'url' => route('admin.about.add')],
            ];
            return view('admin.about.add', compact('title', 'breadcrumbs'));
    }

    public function store(StoreAboutRequest $request)
    {
        $image = null;
    if ($request->hasFile('image')) {
        $image = $request->file('image')->store('about', 'public');
    }

    try {
        About::create([
            'title' => $request->input('title'),
            'icon' => $request->input('icon'),
             'description' => $request->input('description'),
            'status' => $request->input('status'),
            'image' => $image,
        ]);

        return redirect()->route('admin.about')->with('success', 'Record added successfully.');
    } catch (\Exception $e) {
        return back()->withErrors(['error' => 'There was an issue saving the record: ' . $e->getMessage()]);
    }
    }

    public function edit($id)
    {
       $about = About::findOrFail($id);
       $title = 'Edit About';
       $breadcrumbs = [
        ['label' => 'Dashboard', 'url' => route('admin.dashboard')],
        ['label' => 'About', 'url' => route('admin.about')],
        ['label' => 'Edit', 'url' => 'admin.about.edit'],
    ];
        return view('admin.about.edit', compact('about', 'breadcrumbs', 'title'));
    }

    public function update(StoreAboutRequest $request, $id)
    {
    $validatedData = $request->validated();

    // dd($validatedData);

    $about = About::findOrFail($id);

    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('about', 'public');
        $validatedData['image'] = $imagePath;

        if ($about->image) {
            Storage::disk('public')->delete($about->image);
        }
    } else {
        $validatedData['image'] = $about->image;
    }

    try {
        $about->update($validatedData);
        return redirect()->route('admin.about')->with('success', 'Record updated successfully');
    } catch (\Exception $e) {
        return back()->withErrors(['error' => 'There was an issue updating the record. Please try again.']);
    }
    }


    public function show($id)
    {
        $about = About::findOrFail($id);
         $title = 'View About';
        $breadcrumbs = [
        ['label' => 'Dashboard', 'url' => route('admin.dashboard')],
        ['label' => 'Academics', 'url' => route('admin.about')],
        ['label' => 'View', 'url' => 'admin.about.show'],
    ];
        return view('admin.about.show', compact('about', 'breadcrumbs', 'title'));
    }

    public function destroy($id)
{
    $totalabout = About::count();

    if ($totalabout <= 1) {
        return redirect()->route('admin.about')->withErrors(['error' => 'Cannot delete the last remaining record.']);
    }

    $about = About::findOrFail($id);

    try {
        $about->delete();
        return redirect()->route('admin.about')->with('success', 'Record deleted successfully.');
    } catch (\Exception $e) {
        return redirect()->route('admin.about')->withErrors(['error' => 'There was an issue deleting the record. Please try again.']);
    }
}
}
