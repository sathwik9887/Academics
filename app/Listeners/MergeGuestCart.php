<?php

namespace App\Listeners;

use App\Events\UserLoggedIn;
use App\Models\Cart;
use App\Models\CartItem;
use Illuminate\Support\Facades\Auth;

class MergeGuestCart
{
    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(object $event): void
    {

        $user = Auth::user();


        $sessionId = session()->getId();


        $guestCart = Cart::where('session_id', $sessionId)->first();

        if ($guestCart) {

            $userCart = Cart::firstOrCreate(
                ['user_id' => $user->id],
                ['session_id' => null]
            );


            foreach ($guestCart->items as $guestItem) {

                CartItem::updateOrCreate(
                    [
                        'cart_id' => $userCart->id,
                        'course_id' => $guestItem->course_id,
                    ],
                    [
                        'quantity' => $guestItem->quantity,
                        'price' => $guestItem->price,
                    ]
                );
            }


            $guestCart->delete();
        }
    }
}

