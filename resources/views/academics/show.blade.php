@extends('layouts.app')
@section('content')
@section('title', 'Academics | Academics')
<div class="site-section ftco-subscribe-1 site-blocks-cover pb-4" style="background-image: url('images/bg_1.jpg')">
    <div class="container">
        <div class="row align-items-end">
            <div class="col-lg-7">
                <h2 class="mb-0">Academics</h2>
                <p>Explore a wide range of academic programs designed to inspire learning and foster innovation.</p>
            </div>
        </div>
    </div>
</div>


<div class="custom-breadcrumns border-bottom">
    <div class="container">
        <a href="{{ route('home') }}">Home</a>
        <span class="mx-3 icon-keyboard_arrow_right"></span>
        <span class="current">Academics</span>
    </div>
</div>

@if($academics->status == 'ACTIVE')
<div class="site-section">
    <div class="container">

        <div class="row">
            <div class="col-lg-6 order-1 order-lg-2 mb-4 mb-lg-0">
                <img src="{{ optional($academics)->image ? asset('storage/' . $academics->image) : asset('assets/images/hero_1.jpg') }}"
                    alt="Image" class="img-fluid">
            </div>
            <div class="col-lg-5 mr-auto align-self-center order-2 order-lg-1">
                <h2 class="section-title-underline mb-5">
                    <span>{{ $academics->title }}</span>
                </h2>
                <p>{{ $academics->description }}</p>
            </div>
        </div>
    </div>
</div>
@endif
@endsection
