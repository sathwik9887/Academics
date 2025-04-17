@extends('layouts.app')
@section('content')

<div class="hero-slide owl-carousel site-blocks-cover">
    @foreach ($home as $detail)
    @if($detail->status == "ACTIVE")
    <div class="intro-section"
        style="background-image: url('{{ optional($detail)->image ? asset('storage/' . $detail->image) : asset('assets/images/hero_1.jpg') }}');">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12 mx-auto text-center" data-aos="fade-up">
                    <h1>{{ $detail->title }}</h1>
                </div>
            </div>
        </div>
    </div>
    @endif
    @endforeach
</div>



<div class="site-section">
    @foreach ($academics as $academic)
    @if($academic->status == "ACTIVE")
    <div class="container">
        <div class="row mb-5 justify-content-center text-center">
            <div class="col-lg-4 mb-5">
                <h2 class="section-title-underline mb-5">
                    <span>Why Academics Works</span>
                </h2>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                <div class="feature-1 border">
                    <div class="icon-wrapper bg-primary">
                        <span class="{{ $academic->icon }} text-white"></span>
                    </div>
                    <div class="feature-1-content">
                        <h2>{{ $academic->title }}</h2>
                        <p>{{ $academic->description }}</p>
                        <p><a href="{{ route('academics.show', $academic->id) }}"
                                class="btn btn-primary px-4 rounded-0">Learn More</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
    @endforeach
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

        <div class="row mb-5 justify-content-center text-center">
            <div class="col-lg-6 mb-5">
                <h2 class="section-title-underline mb-3">
                    <span>Popular Courses</span>
                </h2>
                <p>Explore our most popular courses, handpicked to help you gain in-demand skills and advance your
                    career.
                </p>
            </div>
        </div>

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
                                class="btn btn-primary rounded-0 px-4">Enroll In
                                This Course</a></p>
                    </div>
                </div>
            </div>
        </div>
        @endif
        @endforeach



    </div>
</div>


@foreach ($university as $detail)
@if($detail->status == "ACTIVE")
<div class="section-bg style-1"
    style="background-image: url('{{ optional($detail)->image ? asset('storage/' . $detail->image) : asset('assets/images/hero_1.jpg') }}');">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <h2 class="section-title-underline style-2">
                    <span>About Our University</span>
                </h2>
            </div>
            <div class="col-lg-8">
                @php
                $paragraphs = explode('.', $detail->description);
                @endphp
                @foreach ($paragraphs as $para)
                @if(trim($para) != '')
                <p>{{ trim($para) }}.</p>
                @endif
                @endforeach
                <p><a href="{{ route('about') }}">Read more</a></p>
            </div>
        </div>
    </div>
</div>
@endif
@endforeach

<!-- // 05 - Block -->
<div class="site-section">
    <div class="container">
        <div class="row mb-5">
            <div class="col-lg-4">
                <h2 class="section-title-underline">
                    <span>Testimonials</span>
                </h2>
            </div>
        </div>

        <div class="owl-slide owl-carousel">
            @foreach ($testimonials as $testimonial)
            @if($testimonial->status == "ACTIVE")
            <div class="ftco-testimonial-1">
                <div class="ftco-testimonial-vcard d-flex align-items-center mb-4">
                    <img src="{{ asset('storage/' . $testimonial->image) }}" alt="Image" class="img-fluid mr-3">
                    <div>
                        <h3>{{ $testimonial->name }}</h3>
                        <span>{{ $testimonial->role }}</span>
                    </div>
                </div>
                <div>
                    <p>{{ $testimonial->description }}</p>
                </div>
            </div>
            @endif
            @endforeach
        </div>
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

@if ($news->where('status', 'ACTIVE')->count())
<div class="news-updates">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <div class="section-heading">
                    <h2 class="text-black">News &amp; Updates</h2>
                    <a href="#">Read All News</a>
                </div>
                <div class="row">
                    @php
                    $activeNews = $news->where('status', 'ACTIVE')->values(); // reset index
                    $firstNews = $activeNews->first();
                    $otherNews = $activeNews->slice(1, 3);
                    @endphp

                    {{-- Big post (left column) --}}
                    <div class="col-lg-6">
                        @if ($firstNews)
                        <div class="post-entry-big">
                            <a href="{{ route('news.show', $firstNews->id) }}" class="img-link">
                                <img src="{{ asset('storage/' . $firstNews->image) }}" alt="Image" class="img-fluid">
                            </a>
                            <div class="post-content">
                                <div class="post-meta">
                                    <a href="#">{{ $firstNews->created_at->format('F j, Y') }}</a>
                                    <span class="mx-1">/</span>
                                    <a href="#">{{ $firstNews->category }}</a>
                                </div>
                                <h3 class="post-heading">
                                    <a href="{{ route('news.show', $firstNews->id) }}">{{ $firstNews->title }}</a>
                                </h3>
                            </div>
                        </div>
                        @endif
                    </div>

                    {{-- Small horizontal posts (right column) --}}
                    <div class="col-lg-6">
                        @foreach ($otherNews as $new)
                        <div class="post-entry-big horizontal d-flex mb-4">
                            <a href="{{ route('news.show', $new->id) }}" class="img-link mr-4">
                                <img src="{{ asset('storage/' . $new->image) }}" alt="Image" class="img-fluid">
                            </a>
                            <div class="post-content">
                                <div class="post-meta">
                                    <a href="#">{{ $new->created_at->format('F j, Y') }}</a>
                                    <span class="mx-1">/</span>
                                    <a href="#">{{ $new->category }}</a>
                                </div>
                                <h3 class="post-heading">
                                    <a href="{{ route('news.show', $new->id) }}">{{ $new->title }}</a>
                                </h3>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif

<div class="site-section ftco-subscribe-1" style="background-image: url('{{ asset('assets/images/bg_1.jpg') }}')">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-7">
                <h2>Subscribe to us!</h2>
                <p>Stay updated with our latest news, articles, and exclusive offers. Join our newsletter today!</p>
            </div>
            <div class="col-lg-5">
                <form action="{{ route('newsletter.send') }}" class="d-flex" method="POST">
                    @csrf
                    <input type="text" class="rounded form-control mr-2 py-3" placeholder="Enter your email"
                        name="email" required>
                    <button class="btn btn-primary rounded py-3 px-4" type="submit">Send</button>
                </form>
            </div>

        </div>

    </div>
</div>
@endsection