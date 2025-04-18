<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;


class CartController extends Controller
{
    /**
     * Show the cart for the user.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {

        $user_id = Auth::id();
        $session_id = session()->getId();


        $cart = null;

        if ($user_id) {

            $cart = Cart::where('user_id', $user_id)->first();

        } else {

            $cart = Cart::where('session_id', $session_id)->first();
        }


        $cartItems = $cart ? $cart->items : collect();

        // dd($cartItems);

        return view('cart.index', compact('cartItems'));
    }

    /**
     * Add a course to the cart (for both guests and authenticated users).
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function addToCart(Request $request)
    {
        $request->validate([
            'course_id' => 'required|exists:courses,id',
            'price' => 'required|numeric',
            'quantity' => 'nullable|integer|min:1'
        ]);

        $course_id = $request->input('course_id');
        $price = $request->input('price');
        $quantity = $request->input('quantity', 1);

        $session_id = session()->getId();
        $user_id = Auth::check() ? Auth::id() : null;


        if ($user_id) {
            $cart = Cart::firstOrCreate([
                'user_id' => $user_id,
                'session_id' => null,
            ]);
        } else {
            $cart = Cart::firstOrCreate([
                'user_id' => null,
                'session_id' => $session_id,
            ]);
        }


        if ($user_id && session()->has('merged_guest_cart') && !session('merged_guest_cart')) {
            $guestCart = Cart::where('session_id', $session_id)->first();

            if ($guestCart) {
                foreach ($guestCart->items as $guestItem) {
                    CartItem::updateOrCreate(
                        ['cart_id' => $cart->id, 'course_id' => $guestItem->course_id],
                        ['quantity' => $guestItem->quantity, 'price' => $guestItem->price]
                    );
                }

                session(['merged_guest_cart' => true]);
                $guestCart->delete();
            }
        }


    $cartItem = CartItem::where('cart_id', $cart->id)->where('course_id', $course_id)->first();

    if ($cartItem) {

        $cartItem->quantity += $quantity;
        $cartItem->save();
    } else {

        CartItem::create([
            'cart_id' => $cart->id,
            'course_id' => $course_id,
            'quantity' => $quantity,
            'price' => $price,
        ]);
    }

    return redirect()->back()->with('success', 'Course added to cart successfully');
}


public function removeFromCart($cartItemId)
{

    $cartItem = CartItem::find($cartItemId);


    if ($cartItem) {
        $cartItem->delete();


        return redirect()->back()->with('success', 'Item removed from the cart successfully.');
    }


    return redirect()->back()->with('error', 'Item not found.');
}

public function updateQuantity(Request $request, $id)
{

    $request->validate([
        'quantity' => 'required|integer|min:1'
    ]);


    $cartItem = CartItem::find($id);

    if ($cartItem) {

        $cartItem->quantity = $request->input('quantity');
        $cartItem->save();


        return redirect()->route('cart')->with('success', 'Cart updated successfully!');
    }


    return redirect()->route('cart')->with('error', 'Cart item not found.');
}



}






