<?php

namespace App\Http\Controllers\Admin;
use App\Models\Philosophy;
use App\Http\Requests\StorePhilosophyRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PhilosophyController extends Controller
{
      public function index()
    {
       $philosophy = Philosophy::orderBy('created_at', 'desc')->get();
       $title = 'Philosophy';
       $breadcrumbs = [
        ['label' => 'Dashboard', 'url' => route('admin.dashboard')],
        ['label' => 'Philosophy', 'url' => route('admin.philosophy')],
    ];
        return view('admin.philosophy.index', compact('philosophy', 'breadcrumbs', 'title'));
    }

    public function edit($id)
    {
       $philosophy = Philosophy::findOrFail($id);
       $title = 'Edit Philosophy';
       $breadcrumbs = [
        ['label' => 'Dashboard', 'url' => route('admin.dashboard')],
        ['label' => 'Philosophy', 'url' => route('admin.philosophy')],
        ['label' => 'Edit', 'url' => 'admin.philosophy.edit'],
    ];
        return view('admin.philosophy.edit', compact('philosophy', 'breadcrumbs', 'title'));
    }

    public function update(StorePhilosophyRequest $request, $id)
    {
    $validatedData = $request->validated();

    // dd($validatedData);

    $philosophy = Philosophy::findOrFail($id);

     if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('philosophy', 'public');
        $validatedData['image'] = $imagePath;

        if ($philosophy->image) {
            Storage::disk('public')->delete($philosophy->image);
        }
    } else {
        $validatedData['image'] = $philosophy->image;
    }

    try {
        $philosophy->update($validatedData);
        return redirect()->route('admin.philosophy')->with('success', 'Record updated successfully');
    } catch (\Exception $e) {
        return back()->withErrors(['error' => 'There was an issue updating the record. Please try again.']);
    }
    }


    public function show($id)
    {
        $philosophy = Philosophy::findOrFail($id);
         $title = 'View Philosophy';
        $breadcrumbs = [
        ['label' => 'Dashboard', 'url' => route('admin.dashboard')],
        ['label' => 'Philosophy', 'url' => route('admin.philosophy')],
        ['label' => 'View', 'url' => 'admin.philosophy.show'],
    ];
        return view('admin.philosophy.show', compact('philosophy', 'breadcrumbs', 'title'));
    }

    public function destroy($id)
{
    $totalphilosophy = Philosophy::count();

    if ($totalphilosophy <= 1) {
        return redirect()->route('admin.philosophy')->withErrors(['error' => 'Cannot delete the last remaining record.']);
    }

    $philosophy = Philosophy::findOrFail($id);

    try {
        $philosophy->delete();
        return redirect()->route('admin.philosophy')->with('success', 'Record deleted successfully.');
    } catch (\Exception $e) {
        return redirect()->route('admin.philosophy')->withErrors(['error' => 'There was an issue deleting the record. Please try again.']);
    }
}
}
