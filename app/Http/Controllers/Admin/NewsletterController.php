<?php

namespace App\Http\Controllers\Admin;
use App\Models\Newsletter;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
   public function index()
   {
        $newsletter = Newsletter::orderBy('created_at', 'desc')->get();
       $title = 'Newsletter';
       $breadcrumbs = [
        ['label' => 'Dashboard', 'url' => route('admin.dashboard')],
        ['label' => 'Newsletter', 'url' => route('admin.newsletter')],
    ];
        $newsletter = Newsletter::all();
        return view('admin.newsletter.index', compact('newsletter', 'breadcrumbs', 'title'));
   }

    public function show($id)
    {
        $newsletter = Newsletter::findOrFail($id);
         $title = 'View Newsletter';
        $breadcrumbs = [
        ['label' => 'Dashboard', 'url' => route('admin.dashboard')],
        ['label' => 'Newsletter', 'url' => route('admin.newsletter')],
        ['label' => 'View', 'url' => 'admin.newsletter.show'],
    ];
        return view('admin.newsletter.show', compact('newsletter', 'breadcrumbs', 'title'));
    }

     public function destroy($id)
    {

        $newsletter = Newsletter::findOrFail($id);

        try {
            $newsletter->delete();
            return redirect()->route('admin.newsletter')->with('success', 'Record deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->route('admin.newsletter')->withErrors(['error' => 'There was an issue deleting the record. Please try again.']);
        }
    }

}
