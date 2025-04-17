@extends('layouts.app')
@section('title', 'Academics | Contact Us')
@section('content')
<div class="site-section ftco-subscribe-1 site-blocks-cover pb-4" style="background-image: url('images/bg_1.jpg')">
    <div class="container">
        <div class="row align-items-end">
            <div class="col-lg-7">
                <h2 class="mb-0">Contact</h2>
                <p>We’d love to hear from you! Whether you have questions, feedback, or need support, our team is here
                    to help. </p>
            </div>
        </div>
    </div>
</div>


<div class="custom-breadcrumns border-bottom">
    <div class="container">
        <a href="{{ route('home') }}">Home</a>
        <span class="mx-3 icon-keyboard_arrow_right"></span>
        <span class="current">Contact</span>
    </div>
</div>

<div class="site-section">

    <div class="container">
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
        <form action="{{route('contact.post')}}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-6 form-group">
                    <label for="fname">First Name</label>
                    <input type="text" class="form-control form-control-lg" name="fname"
                        placeholder="Enter your first name" required>
                </div>
                <div class="col-md-6 form-group">
                    <label for="lname">Last Name</label>
                    <input type="text" class="form-control form-control-lg" name="lname"
                        placeholder="Enter your last name" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 form-group">
                    <label for="email">Email Address</label>
                    <input type="email" class="form-control form-control-lg" required
                        placeholder="Enter your Email Address" name="email">
                </div>
                <div class="col-md-6 form-group">
                    <label for="phone">Mobile Number</label>
                    <input type="tel" class="form-control form-control-lg" name="phone" required
                        placeholder="Enter your Mobile number">
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 form-group">
                    <label for="message">Message</label>
                    <textarea name="message" cols="30" rows="10" class="form-control" required
                        placeholder="Enter your message"></textarea>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <input type="submit" value="Send Message" class="btn btn-primary btn-lg px-5">
                </div>
            </div>
        </form>
    </div>
</div>

@foreach ($philosophy as $detail )
@if($detail->status == "ACTIVE")
<div class="section-bg style-1"
    style="background-image: url({{ optional($detail)->image ? asset('storage/' . $detail->image) : asset('assets/images/hero_1.jpg') }});">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6 mb-5 mb-lg-0">
                <span class="icon {{ $detail->icon }}"></span>
                <h3>{{ $detail->title }}</h3>
                <p>{{ $detail->description }}</p>
            </div>
        </div>
    </div>
</div>
@endif
@endforeach
@endsection