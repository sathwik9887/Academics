<?php

namespace App\Http\Controllers\Admin;
use App\Models\Home;
use App\Http\Requests\StoreUserRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/* The HomeController class in PHP defines methods for managing and displaying home records in an admin
panel. */
class HomeController extends Controller
{
    public function index()
    {
       $home = Home::where('status', 'ACTIVE')
                    ->orderBy('created_at', 'desc')
                    ->get();
       $title = 'Home';
       $breadcrumbs = [
        ['label' => 'Dashboard', 'url' => route('admin.dashboard')],
        ['label' => 'Home', 'url' => route('admin.home')],
    ];
        return view('admin.home.index', compact('home', 'breadcrumbs', 'title'));
    }

    public function add()
    {
        $home = Home::all();
        $title = 'Add Home';
        $breadcrumbs = [
        ['label' => 'Dashboard', 'url' => route('admin.dashboard')],
        ['label' => 'Home', 'url' => route('admin.home')],
        ['label' => 'Add', 'url' => route('admin.home.add')],
    ];
        return view('admin.home.add', compact('home', 'breadcrumbs', 'title'));
    }

    public function store(StoreUserRequest $request)
    {
        $image = null;
    if ($request->hasFile('image')) {
        $image = $request->file('image')->store('home', 'public');
    }



    try {
        Home::create([
            'title' => $request->input('title'),
            'status' => $request->input('status'),
            'image' => $image,
        ]);

        return redirect()->route('admin.home')->with('success', 'Record added successfully.');
    } catch (\Exception $e) {
        return back()->withErrors(['error' => 'There was an issue saving the record: ' . $e->getMessage()]);
    }
    }

    public function edit($id)
    {
       $home = Home::findOrFail($id);
       $title = 'Edit Home';
       $breadcrumbs = [
        ['label' => 'Dashboard', 'url' => route('admin.dashboard')],
        ['label' => 'Home', 'url' => route('admin.home')],
        ['label' => 'Edit', 'url' => 'admin.home.edit'],
    ];
        return view('admin.home.edit', compact('home', 'breadcrumbs', 'title'));
    }

    public function update(StoreUserRequest $request, $id)
    {
    $validatedData = $request->validated();

    // dd($validatedData);

    $home = Home::findOrFail($id);

    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('home', 'public');
        $validatedData['image'] = $imagePath;

        if ($home->image) {
            Storage::disk('public')->delete($home->image);
        }
    } else {
        $validatedData['image'] = $home->image;
    }

    try {
        $home->update($validatedData);
        return redirect()->route('admin.home')->with('success', 'Record updated successfully');
    } catch (\Exception $e) {
        return back()->withErrors(['error' => 'There was an issue updating the record. Please try again.']);
    }
    }


    public function show($id)
    {
        $home = Home::findOrFail($id);
         $title = 'View Home';
        $breadcrumbs = [
        ['label' => 'Dashboard', 'url' => route('admin.dashboard')],
        ['label' => 'Home', 'url' => route('admin.home')],
        ['label' => 'View', 'url' => 'admin.home.show'],
    ];
        return view('admin.home.show', compact('home', 'breadcrumbs', 'title'));
    }

    public function destroy($id)
{
    $totalHomes = Home::count();

    if ($totalHomes <= 1) {
        return redirect()->route('admin.home')->withErrors(['error' => 'Cannot delete the last remaining record.']);
    }

    $home = Home::findOrFail($id);

    try {
        $home->delete();
        return redirect()->route('admin.home')->with('success', 'Record deleted successfully.');
    } catch (\Exception $e) {
        return redirect()->route('admin.home')->withErrors(['error' => 'There was an issue deleting the record. Please try again.']);
    }
}





}
