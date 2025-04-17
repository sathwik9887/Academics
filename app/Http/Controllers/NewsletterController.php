<?php

namespace App\Http\Controllers;
use App\Models\Newsletter;
use Illuminate\Http\Request;
use App\Jobs\SendNewsletterEmail;

use App\Http\Requests\StoreNewsletterRequest;
class NewsletterController extends Controller
{
   public function send(StoreNewsletterRequest $request)
{
    $validatedData = $request->validated();

    try {
        Newsletter::create($validatedData);

        SendNewsletterEmail::dispatch($validatedData['email']);

        return redirect()->back()->with('success', 'Email has been Subscribed!');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Email has been already Subscribed!');
    }
}

}
