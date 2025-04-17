<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Stripe\Stripe;
use Stripe\Checkout\Session;
use App\Models\Checkout;
use Illuminate\Support\Facades\Auth;

/**
 * Create a Stripe Checkout session and redirect user to payment page
 *
 * @param  \Illuminate\Http\Request  $request
 * @return \Illuminate\Http\RedirectResponse
 */
class CheckoutController extends Controller
{
    public function index()
{

    return view('checkout.checkout');
}

       public function createCheckoutSession(Request $request): RedirectResponse
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));

        $session = Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price_data' => [
                    'currency' => 'usd',
                    'unit_amount' => 1999,
                    'product_data' => [
                        'name' => 'Academics Student Management',
                    ],
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => route('checkout.success'),
            'cancel_url' => route('checkout.cancel'),

        ]);

        return redirect($session->url);
    }

}
