<?php

namespace App\Http\Controllers\Admin;
use App\Models\Admissions;
use App\Http\Requests\StoreAdmissionRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdmissionController extends Controller
{
    public function index()
    {
        $admissions = Admissions::where('status', 'ACTIVE')
                    ->orderBy('created_at', 'desc')
                    ->get();
       $title = 'Admissions';
       $breadcrumbs = [
        ['label' => 'Dashboard', 'url' => route('admin.dashboard')],
        ['label' => 'Admissions', 'url' => route('admin.admissions')],
    ];
        $admissions = Admissions::all();
        return view('admin.admissions.index', compact('admissions', 'breadcrumbs', 'title'));
    }

     public function add()
    {
        $admissions = Admissions::all();
        $title = 'Add Admission';
        $breadcrumbs = [
        ['label' => 'Dashboard', 'url' => route('admin.dashboard')],
        ['label' => 'Admission', 'url' => route('admin.admissions')],
        ['label' => 'Add', 'url' => route('admin.admissions.add')],
    ];
        return view('admin.admissions.add', compact('admissions', 'breadcrumbs', 'title'));
    }

    public function store(StoreAdmissionRequest $request)
    {
        $image = null;
    if ($request->hasFile('image')) {
        $image = $request->file('image')->store('admissions', 'public');
    }

    try {
        Admissions::create([
            'title' => $request->input('title'),
            'icon' => $request->input('icon'),
             'description' => $request->input('description'),
            'status' => $request->input('status'),
            'image' => $image,
        ]);

        return redirect()->route('admin.admissions')->with('success', 'Record added successfully.');
    } catch (\Exception $e) {
        return back()->withErrors(['error' => 'There was an issue saving the record: ' . $e->getMessage()]);
    }
    }

    public function edit($id)
    {
       $admissions = Admissions::findOrFail($id);
       $title = 'Edit Admission';
       $breadcrumbs = [
        ['label' => 'Dashboard', 'url' => route('admin.dashboard')],
        ['label' => 'Admission', 'url' => route('admin.admissions')],
        ['label' => 'Edit', 'url' => 'admin.admissions.edit'],
    ];
        return view('admin.admissions.edit', compact('admissions', 'breadcrumbs', 'title'));
    }

    public function update(StoreAdmissionRequest $request, $id)
    {
    $validatedData = $request->validated();

    // dd($validatedData);

    $admissions = Admissions::findOrFail($id);

    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('admissions', 'public');
        $validatedData['image'] = $imagePath;

        if ($admissions->image) {
            Storage::disk('public')->delete($admissions->image);
        }
    } else {
        $validatedData['image'] = $admissions->image;
    }

    try {
        $admissions->update($validatedData);
        return redirect()->route('admin.admissions')->with('success', 'Record updated successfully');
    } catch (\Exception $e) {
        return back()->withErrors(['error' => 'There was an issue updating the record. Please try again.']);
    }
    }


    public function show($id)
    {
        $admissions = Admissions::findOrFail($id);
         $title = 'View Admission';
        $breadcrumbs = [
        ['label' => 'Dashboard', 'url' => route('admin.dashboard')],
        ['label' => 'Admission', 'url' => route('admin.admissions')],
        ['label' => 'View', 'url' => 'admin.admissions.show'],
    ];
        return view('admin.admissions.show', compact('admissions', 'breadcrumbs', 'title'));
    }

    public function destroy($id)
{
    $totaladmissions = Admissions::count();

    if ($totaladmissions <= 1) {
        return redirect()->route('admin.admissions')->withErrors(['error' => 'Cannot delete the last remaining record.']);
    }

    $admissions = Admissions::findOrFail($id);

    try {
        $admissions->delete();
        return redirect()->route('admin.admissions')->with('success', 'Record deleted successfully.');
    } catch (\Exception $e) {
        return redirect()->route('admin.admissions')->withErrors(['error' => 'There was an issue deleting the record. Please try again.']);
    }
}
}
