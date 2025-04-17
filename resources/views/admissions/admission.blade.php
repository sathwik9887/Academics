@extends('layouts.app')
@section('content')
@section('title', 'Academics | Admissions')
<div class="site-section ftco-subscribe-1 site-blocks-cover pb-4" style="background-image: url('images/bg_1.jpg')">
    <div class="container">
        <div class="row align-items-end">
            <div class="col-lg-7">
                <h2 class="mb-0">Admissions</h2>
                <p>Join a community dedicated to excellence and innovation. Our admissions process is designed to be
                    clear.</p>
            </div>
        </div>
    </div>
</div>


<div class="custom-breadcrumns border-bottom">
    <div class="container">
        <a href="{{ route('home') }}">Home</a>
        <span class="mx-3 icon-keyboard_arrow_right"></span>
        <span class="current">Admission</span>
    </div>
</div>

@foreach ($admissions as $admission)
@if($admission->status == "ACTIVE")
<div class="site-section">
    <div class="container">
        <div class="row mb-5">
            <div class="col-lg-6 mb-lg-0 mb-4">
                <img src="{{ optional($admission)->image ? asset('storage/' . $admission->image) : asset('assets/images/hero_1.jpg') }}"
                    alt="Image" class="img-fluid">
            </div>
            <div class="col-lg-5 ml-auto align-self-center">
                <h2 class="section-title-underline mb-5">
                    <span>{{ $admission->title }}</span>
                </h2>
                <p>{{ $admission->description }}</p>

                @foreach(explode(PHP_EOL, $admission->prequisities) as $preq)
                <li>{{ trim($preq) }}</li>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endif
@endforeach

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
