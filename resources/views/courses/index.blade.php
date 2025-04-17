@extends('layouts.app')
@section('title', 'Academics | Courses')
@section('content')
<div class="site-section ftco-subscribe-1 site-blocks-cover pb-4" style="background-image: url('images/bg_1.jpg')">
    <div class="container">
        <div class="row align-items-end">
            <div class="col-lg-7">
                <h2 class="mb-0">Courses</h2>
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
        <span class="current">Courses</span>
    </div>
</div>

<div class="site-section">
    <div class="container">
        @foreach ($courses as $course)
        @if($course->status == "ACTIVE")
        <div class="row">
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="course-1-item">
                    <figure class="thumnail">
                        <a href="{{ route('course.show', $course->id) }}"><img
                                src="{{ asset('storage/' . $course->image) }}" alt="Image" class="img-fluid"></a>
                        <div class="price">Rs {{ $course->price }}</div>
                        <div class="category">
                            <h3>{{ $course->courseName }}</h3>
                        </div>
                    </figure>
                    <div class="course-1-content pb-4">
                        <h2>{{ $course->courseHeading }}</h2>
                        <div class="rating text-center mb-3">
                            @for ($i = 1; $i <= 5; $i++) @if ($i <=floor($course->rating))
                                <span class="icon-star2 text-warning"></span>
                                @elseif ($i == ceil($course->rating) && $course->rating - floor($course->rating) > 0)
                                <span class="icon-star-half-alt text-warning"></span>
                                @else
                                <span class="icon-star2 text-muted"></span>
                                @endif
                                @endfor
                                <span>({{ $course->rating }})</span>
                        </div>
                        <p class="desc mb-4">{{ $course->courseText }}</p>
                        <p><a href="{{ route('course.show', $course->id) }}"
                                class="btn btn-primary rounded-0 px-4">Enroll In This Course</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        @endif
        @endforeach
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