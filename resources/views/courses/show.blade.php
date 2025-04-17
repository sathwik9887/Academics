@extends('layouts.app')
@section('content')
<div class="site-section ftco-subscribe-1 site-blocks-cover pb-4" style="background-image: url('images/bg_1.jpg')">
    <div class="container">
        <div class="row align-items-end">
            <div class="col-lg-7">
                <h2 class="mb-0">{{ $course->courseHeading }}</h2>
                <p>Explore our most popular courses, handpicked to help you gain in-demand skills and advance your
                    career.
                </p>
            </div>
        </div>
    </div>
</div>


<div class="custom-breadcrumns border-bottom">
    <div class="container">
        <a href="{{ route('home') }}">Home</a>
        <span class="mx-3 icon-keyboard_arrow_right"></span>
        <a href="{{ route('course') }}">Courses</a>
        <span class="mx-3 icon-keyboard_arrow_right"></span>
        <span class="current">Courses</span>
    </div>
</div>

@if ($course->status == "ACTIVE")
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
        <div class="row">
            <div class="col-md-6 mb-4">
                <p>
                    <img src="{{ asset('storage/' . $course->image) }}" alt="Image" class="img-fluid">
                </p>
            </div>
            <div class="col-lg-5 ml-auto align-self-center">
                <h2 class="section-title-underline mb-5">
                    <span>Course Details</span>
                </h2>

                <p><strong class="text-black d-block">Teacher:</strong> {{ $course->teacherName }}</p>
                <p class="mb-5"><strong class="text-black d-block">Hours:</strong> {{ $course->duration }} &mdash;
                    {{ $course->endDuration }}</p>
                <p>{{ $course->courseText }}</p>

                <ul class="ul-check primary list-unstyled mb-5">
                    <li>{{ $course->description }}</li>
                </ul>

                <p>
                <form action="{{ route('cart.add') }}" method="POST">
                    @csrf
                    <input type="hidden" name="course_id" value="{{ $course->id }}">
                    <input type="hidden" name="price" value="{{ $course->price }}">
                    <input type="number" name="quantity" value="1" min="1" class="form-control w-25 mb-3">
                    <button type="submit" class="btn btn-primary rounded-0 btn-lg px-5" id="add-to-cart-btn"
                        data-course-id="1" data-price="99.99" data-quantity="1" onclick="addToCart(1, 99.99, 1)">Add to
                        Cart</button>
                </form>
                </p>


            </div>
        </div>
    </div>
</div>
@endif


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