@extends('layouts.app')
@section('title', 'Academics | Cart')
@section('content')

<!-- Banner Section -->
<div class="site-section ftco-subscribe-1 site-blocks-cover pb-4" style="background-image: url('images/bg_1.jpg')">
    <div class="container">
        <div class="row align-items-end">
            <div class="col-lg-7">
                <h2 class="mb-0">Cart</h2>
                <p>Explore our most popular courses, handpicked to help you gain in-demand skills and advance your
                    career.</p>
            </div>
        </div>
    </div>
</div>

<!-- Breadcrumb -->
<div class="custom-breadcrumns border-bottom">
    <div class="container">
        <a href="{{ route('home') }}">Home</a>
        <span class="mx-3 icon-keyboard_arrow_right"></span>
        <span class="current">Cart</span>
    </div>
</div>

<!-- Cart Section -->
<div class="site-section">
    <div class="container">
        @if(session('success'))
        <script>
            Swal.fire({
                        title: "{{ session('success') }}",
                        icon: "success",
                        draggable: true,
                        timer:1500
                    });
        </script>
        @endif
        @if(session('error'))
        <script>
            Swal.fire({
                    title: "{{ session('error') }}",
                    icon: "error",
                    draggable: true,
                    timer: 1500
                });
        </script>
        @endif
        @if(($cartItems->count()) > 0)
        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle text-center">
                <thead class="thead-dark">
                    <tr>
                        <th>Course</th>
                        <th>Price</th>
                        <th>Qty</th>
                        <th>Total</th>
                        <th>Remove</th>
                    </tr>
                </thead>
                <tbody>
                    @php $grandTotal = 0; @endphp
                    @foreach($cartItems as $item)
                    @php
                    $total = $item->price * $item->quantity;
                    $grandTotal += $total;
                    @endphp
                    <tr>
                        <td>{{ $item->course->courseName }}</td>
                        <td>₹{{ number_format($item->price, 2) }}</td>
                        <td>
                            <form action="{{ route('cart.updateQuantity', $item->id) }}" method="POST"
                                style="display: inline-block;">
                                @csrf
                                @method('PUT')
                                <button type="submit" name="quantity" value="{{ $item->quantity - 1 }}"
                                    class="btn btn-sm btn-warning" {{ $item->quantity <= 1 ? 'disabled' : '' }}>
                                        -</button>
                            </form>

                            <span class="mx-2">{{ $item->quantity }}</span>

                            <form action="{{ route('cart.updateQuantity', $item->id) }}" method="POST"
                                style="display: inline-block;">
                                @csrf
                                @method('PUT')
                                <button type="submit" name="quantity" value="{{ $item->quantity + 1 }}"
                                    class="btn btn-sm btn-success">+</button>
                            </form>
                        </td>
                        <td>₹{{ number_format($total, 2) }}</td>
                        <td>
                            <form action="{{ route('cart.remove', $item->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Remove</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    <tr class="font-weight-bold">
                        <td colspan="3" class="text-right">Grand Total:</td>
                        <td colspan="2">₹{{ number_format($grandTotal, 2) }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="text-right">
            @if(Auth::check())
            <a href="{{ route('checkout') }}" class="btn btn-success btn-lg">Proceed to Checkout</a>
            @else
            <a href="{{ route('login') }}" class="btn btn-warning btn-lg">Login to Checkout</a>
            @endif
        </div>
        @else
        <div class="text-center py-5">
            <h4>Your cart is empty 😕</h4>
            <a href="{{ route('course') }}" class="btn btn-primary mt-3">Browse Courses</a>
        </div>
        @endif
    </div>
</div>

@endsection