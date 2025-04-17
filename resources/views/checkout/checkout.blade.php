@extends('layouts.app')

@section('content')

<!-- Hero Section -->
<div class="site-section ftco-subscribe-1 site-blocks-cover pb-4" style="background-image: url('images/bg_1.jpg')">
    <div class="container">
        <div class="row align-items-end">
            <div class="col-lg-7">
                <h2 class="mb-0">Checkout</h2>
                <p>Discover our top-rated courses, carefully selected to help you master essential skills and boost your
                    professional growth.</p>
            </div>
        </div>
    </div>
</div>

<!-- Breadcrumbs -->
<div class="custom-breadcrumns border-bottom py-3">
    <div class="container">
        <a href="{{ route('home') }}">Home</a>
        <span class="mx-3 icon-keyboard_arrow_right"></span>
        <span class="current">Checkout</span>
    </div>
</div>

<!-- Main Checkout Section -->
<div class="site-section">
    <div class="container">

        <!-- Success Message -->
        @if(session('success'))
        <script>
            Swal.fire({
                        title: "{{ session('success') }}",
                        icon: "success",
                        timer: 2000,
                        showConfirmButton: false
                    });
        </script>
        @endif

        @if(session('error'))
        <script>
            Swal.fire({
                        title: "{{ session('error') }}",
                        icon: "error",
                        timer: 2000,
                        showConfirmButton: false
                    });
        </script>
        @endif

        <!-- Checkout Form Card -->
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card shadow-sm border-0">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">Billing Information</h5>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('checkout.session') }}" method="POST" class="checkout-form">
                            @csrf


                            <div class="form-group">
                                <label for="name">Full Name <span class="text-danger">*</span></label>
                                <input type="text" name="name" class="form-control" placeholder="John Doe" required>
                            </div>


                            <div class="form-group">
                                <label for="email">Email <span class="text-danger">*</span></label>
                                <input type="email" name="email" class="form-control" placeholder="you@example.com"
                                    required>
                            </div>


                            <div class="form-group">
                                <label for="phone">Phone Number <span class="text-danger">*</span></label>
                                <input type="text" name="phone" class="form-control" placeholder="+1 123 456 7890"
                                    required>
                            </div>


                            <div class="form-group">
                                <label for="address">Address <span class="text-danger">*</span></label>
                                <textarea name="address" class="form-control" rows="2"
                                    placeholder="123 Main Street, City, Country" required></textarea>
                            </div>
                            <!-- Payment Button -->
                            <div class="text-right">
                                <button type="submit" class="btn btn-primary btn-lg px-5">Complete Purchase</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection