@extends('layouts.app')
@section('content')
<div class="custom-breadcrumns border-bottom">
    <div class="container">
        <a href="{{ route('home') }}">Home</a>
        <span class="mx-3 icon-keyboard_arrow_right"></span>
        <span class="current">News</span>
    </div>
</div>


@if($new->status == "ACTIVE")
<div class="site-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9 mb-4">
                <p class="mb-5">
                    <img src="{{ asset('storage/' . $new->image) }}" alt="Image" class="img-fluid">
                </p>
                <p>{{ $new->description }}</p>
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
