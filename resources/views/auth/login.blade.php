@extends('layouts.app')
@section('content')
@section('title', 'Academics | Login')



<div class="site-section ftco-subscribe-1 site-blocks-cover pb-4"
    style="background-image: url{{asset('assets/images/bg_1.jpg')}}">
    <div class="container">
        <div class="row align-items-end justify-content-center text-center">
            <div class="col-lg-7">
                <h2 class="mb-0">Login</h2>
                <p>Welcome back! Please log in to continue to your account.</p>
            </div>
        </div>
    </div>
</div>


<div class="custom-breadcrumns border-bottom">
    <div class="container">
        <a href="{{ route('home') }}">Home</a>
        <span class="mx-3 icon-keyboard_arrow_right"></span>
        <span class="current">Login</span>
    </div>
</div>

<div class="site-section">
    <div class="container">

        <form action="{{route('login.post')}}" method="POST">
            @csrf




            <div class="row justify-content-center">

                <div class="col-md-5">
                    {{-- Session Error --}}
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

                    {{-- Validation Errors --}}
                    @if ($errors->any())
                    <script>
                        Swal.fire({
                        title: "Oops!",
                        html: `{!! implode('<br>', $errors->all()) !!}`,
                        icon: "error",
                        showConfirmButton: true,
                    });
                    </script>
                    @endif

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



                    <div class="row">
                        <div class="col-md-12 form-group">
                            <label for="email">Email Address</label>
                            <input type="email" id="email" name="email" class="form-control form-control-lg"
                                placeholder="Enter the Email Address" required>
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="pword">Password</label>
                            <input type="password" id="pword" name="password" class="form-control form-control-lg"
                                placeholder="Enter the Password" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 d-flex justify-content-between align-items-center">
                            <input type="submit" value="Log In" class="btn btn-primary btn-lg px-5">
                            <a href="{{route('register')}}"> Register</a>
                        </div>
                    </div>
                    <br>
                    <a href="{{route('forget')}}"> Forget Password?</a>

                </div>


            </div>
        </form>



    </div>
</div>
@endsection