<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Philosophy;
use App\Jobs\SendContactEmail;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;
use \Anhskohbo\NoCaptcha\Facades\NoCaptcha;

class ContactController extends Controller
{
   public function index()
   {
    $philosophy = Philosophy::all();
    return view('contact.contact', compact('philosophy'));
   }

   public function send(Request $request)
   {
       $validator = Validator::make($request->all(), [
        'fname' => 'required|string|max:255',
        'lname' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'phone' => 'required|numeric',
        'message' => 'required'
        ]);


        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // dd($validator->validated());

        try
        {
        Contact::create($validator->validated());

         SendContactEmail::dispatch($validator->validated());

             return redirect()->back()->with('success', 'Your message has been sent!');
        }
        catch (\Exception $e)
        {
            return back()->with('error', $e->getMessage());
        }


   }
}
