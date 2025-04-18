@extends('layouts.app')
@section('content')
@section('title', 'Academics | About Us')


<div class="site-section ftco-subscribe-1 site-blocks-cover pb-4" style="background-image: url('images/bg_1.jpg')">
    <div class="container">
        <div class="row align-items-end">
            <div class="col-lg-7">
                <h2 class="mb-0">About Us</h2>
                <p>We are committed to delivering high-quality education that empowers learners to reach their full
                    potential. </p>
            </div>
        </div>
    </div>
</div>


<div class="custom-breadcrumns border-bottom">
    <div class="container">
        <a href="{{ route('home') }}">Home</a>
        <span class="mx-3 icon-keyboard_arrow_right"></span>
        <span class="current">About Us</span>
    </div>
</div>

<div class="site-section">
    <div class="container">
        @foreach ($about as $index => $detail)
        @if ($detail->status == "ACTIVE")
        <div class="row mb-5">
            {{-- Alternate image/text position --}}
            @if ($index % 2 == 0)
            {{-- Image Left --}}
            <div class="col-lg-6 mb-lg-0 mb-4">
                <img src="{{ asset('storage/' . $detail->image) }}" alt="Image" class="img-fluid">
            </div>
            <div class="col-lg-5 ml-auto align-self-center">
                @else
                {{-- Image Right --}}
                <div class="col-lg-6 order-1 order-lg-2 mb-4 mb-lg-0">
                    <img src="{{ asset('storage/' . $detail->image) }}" alt="Image" class="img-fluid">
                </div>
                <div class="col-lg-5 mr-auto align-self-center order-2 order-lg-1">
                    @endif

                    <h2 class="section-title-underline mb-5">
                        <span>{{ $detail->title }}</span>
                    </h2>

                    @php
                    $descriptions = explode('.', $detail->description);
                    @endphp

                    @foreach ($descriptions as $desc)
                    @if (trim($desc) !== '')
                    <p>{{ trim($desc) }}.</p>
                    @endif
                    @endforeach

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



    <div class="site-section">
        <div class="container">
            <div class="row mb-5 justify-content-center text-center">
                <div class="col-lg-4 mb-5">
                    <h2 class="section-title-underline mb-5">
                        <span>Our Teachers</span>
                    </h2>
                </div>
            </div>

            <div class="row">
                @foreach ($teachers as $teacher)
                @if($teacher->status == "ACTIVE")
                <div class="col-lg-4 col-md-6 mb-5 mb-lg-5">
                    <div class="feature-1 border person text-center">
                        <img src="{{ asset('storage/' . $teacher->image) }}" alt="Image" class="img-fluid">
                        <div class="feature-1-content">
                            <h2>{{ $teacher->name }}</h2>
                            <span class="position mb-3 d-block">{{ $teacher->role }}</span>
                            <p>{{ $teacher->description }}</p>
                        </div>
                    </div>
                </div>
                @endif
                @endforeach
            </div>
        </div>
    </div>

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