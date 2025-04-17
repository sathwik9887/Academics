<?php

namespace App\Http\Controllers\Admin;
use App\Models\News;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreNewsRequest;

class NewsController extends Controller
{
   public function index()
    {
       $news = News::orderBy('created_at', 'desc')->get();
       $title = 'News';
       $breadcrumbs = [
        ['label' => 'Dashboard', 'url' => route('admin.dashboard')],
        ['label' => 'News', 'url' => route('admin.news')],
    ];
        return view('admin.news.index', compact('news', 'breadcrumbs', 'title'));
    }

    public function add()
    {
        $news = News::all();
        $title = 'Add New';
        $breadcrumbs = [
        ['label' => 'Dashboard', 'url' => route('admin.news')],
        ['label' => 'News', 'url' => route('admin.news')],
        ['label' => 'Add', 'url' => route('admin.news.add')],
    ];
        return view('admin.news.add', compact('news', 'breadcrumbs', 'title'));
    }

    public function store(StoreNewsRequest $request)
    {
        $image = null;
    if ($request->hasFile('image')) {
        $image = $request->file('image')->store('academics', 'public');
    }

    try {
        News::create([
            'title' => $request->input('title'),
            'category' => $request->input('category'),
             'description' => $request->input('description'),
            'status' => $request->input('status'),
            'image' => $image,
        ]);

        return redirect()->route('admin.news')->with('success', 'Record added successfully.');
    } catch (\Exception $e) {
        return back()->withErrors(['error' => 'There was an issue saving the record: ' . $e->getMessage()]);
    }
    }

    public function edit($id)
    {
       $news = News::findOrFail($id);
       $title = 'Edit New';
       $breadcrumbs = [
        ['label' => 'Dashboard', 'url' => route('admin.dashboard')],
        ['label' => 'New', 'url' => route('admin.news')],
        ['label' => 'Edit', 'url' => 'admin.news.edit'],
    ];
        return view('admin.news.edit', compact('news', 'breadcrumbs', 'title'));
    }

    public function update(StoreNewsRequest $request, $id)
    {
    $validatedData = $request->validated();

    // dd($validatedData);

    $news = News::findOrFail($id);

    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('news', 'public');
        $validatedData['image'] = $imagePath;

        if ($news->image) {
            Storage::disk('public')->delete($news->image);
        }
    } else {
        $validatedData['image'] = $news->image;
    }

    try {
        $news->update($validatedData);
        return redirect()->route('admin.news')->with('success', 'Record updated successfully');
    } catch (\Exception $e) {
        return back()->withErrors(['error' => 'There was an issue updating the record. Please try again.']);
    }
    }


    public function show($id)
    {
        $news = News::findOrFail($id);
         $title = 'View New';
        $breadcrumbs = [
        ['label' => 'Dashboard', 'url' => route('admin.dashboard')],
        ['label' => 'New', 'url' => route('admin.news')],
        ['label' => 'View', 'url' => 'admin.news.show'],
    ];
        return view('admin.news.show', compact('news', 'breadcrumbs', 'title'));
    }

    public function destroy($id)
{
    $totalnews= News::count();

    if ($totalnews <= 1) {
        return redirect()->route('admin.news')->withErrors(['error' => 'Cannot delete the last remaining record.']);
    }

    $news = News::findOrFail($id);

    try {
        $news->delete();
        return redirect()->route('admin.news')->with('success', 'Record deleted successfully.');
    } catch (\Exception $e) {
        return redirect()->route('admin.news')->withErrors(['error' => 'There was an issue deleting the record. Please try again.']);
    }
}
}
