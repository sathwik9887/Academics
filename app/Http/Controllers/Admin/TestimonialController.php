<?php

namespace App\Http\Controllers\Admin;
use App\Models\Testimonials;
use App\Http\Requests\StoreTestimonialRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    public function index()
    { $testimonials = Testimonials::where('status', 'ACTIVE')
                    ->orderBy('created_at', 'desc')
                    ->get();
       $title = 'Testimonials';
       $breadcrumbs = [
        ['label' => 'Dashboard', 'url' => route('admin.dashboard')],
        ['label' => 'Testimonials', 'url' => route('admin.testimonials')],
    ];
        return view('admin.testimonials.index', compact('testimonials', 'breadcrumbs', 'title'));
    }

    public function add()
    {
        $title = 'Add Testimonial';
        $breadcrumbs = [
            ['label' => 'Dashboard', 'url' => route('admin.dashboard')],
            ['label' => 'Testimonials', 'url' => route('admin.testimonials')],
            ['label' => 'Add', 'url' => route('admin.testimonials.add')],
        ];
        return view('admin.testimonials.add', compact('title', 'breadcrumbs'));
    }
     public function store(StoreTestimonialRequest $request)
    {
        $image = null;
    if ($request->hasFile('image')) {
        $image = $request->file('image')->store('courses', 'public');
    }



    try {
        Testimonials::create([
            'name' => $request->input('name'),
            'role' => $request->input('role'),
            'description' => $request->input('description'),
            'status' => $request->input('status'),
            'image' => $image,
        ]);

        return redirect()->route('admin.testimonials')->with('success', 'Record added successfully.');
    } catch (\Exception $e) {
        return back()->withErrors(['error' => 'There was an issue saving the record: ' . $e->getMessage()]);
    }
    }

    public function edit($id)
    {
        $testimonials = Testimonials::find($id);
        $title = 'Edit Testimonial';
        $breadcrumbs = [
            ['label' => 'Dashboard', 'url' => route('admin.dashboard')],
            ['label' => 'Testimonials', 'url' => route('admin.testimonials')],
            ['label' => 'Edit', 'url' => route('admin.testimonials.edit', $testimonials->id)],
            ];
            return view('admin.testimonials.edit', compact('testimonials', 'title', 'breadcrumbs'));
    }

    public function update(StoreTestimonialRequest $request, $id)
    {
    $validatedData = $request->validated();

    // dd($validatedData);

    $testimonials = Testimonials::findOrFail($id);

    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('testimonials', 'public');
        $validatedData['image'] = $imagePath;

        if ($testimonials->image) {
            Storage::disk('public')->delete($testimonials->image);
        }
    } else {
        $validatedData['image'] = $testimonials->image;
    }

    try {
        $testimonials->update($validatedData);
        return redirect()->route('admin.testimonials')->with('success', 'Record updated successfully');
    } catch (\Exception $e) {
        return back()->withErrors(['error' => 'There was an issue updating the record. Please try again.']);
    }
    }

    public function show($id)
    {
        $testimonials = Testimonials::findOrFail($id);
        $title = 'View Testimonial';
        $breadcrumbs = [
            ['label' => 'Dashboard', 'url' => route('admin.dashboard')],
            ['label' => 'Testimonials', 'url' => route('admin.testimonials')],
            ['label' =>  'View', 'url' => route('admin.testimonials.show', $id)],
            ];
            return view('admin.testimonials.show', compact('testimonials', 'title', 'breadcrumbs'));
    }

     public function destroy($id)
{
    $totalTestimonials = Testimonials::count();

    if ($totalTestimonials <= 1) {
        return redirect()->route('admin.testimonials')->withErrors(['error' => 'Cannot delete the last remaining record.']);
    }

    $testimonials = Testimonials::findOrFail($id);

    try {
        $testimonials->delete();
        return redirect()->route('admin.testimonials')->with('success', 'Record deleted successfully.');
    } catch (\Exception $e) {
        return redirect()->route('admin.testimonials')->withErrors(['error' => 'There was an issue deleting the record. Please try again.']);
    }
}
}
