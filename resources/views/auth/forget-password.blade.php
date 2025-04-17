@extends('layouts.app')
@section('content')
@section('title', 'Academics | Forget Password')



<div class="site-section ftco-subscribe-1 site-blocks-cover pb-4"
    style="background-image: url{{asset('assets/images/bg_1.jpg')}}">
    <div class="container">
        <div class="row align-items-center justify-content-center text-center">
            <div class="col-lg-7">
                <h2 class="mb-4">Forgot Password?</h2>
                <p>Please enter your email address to reset your password and regain access to your account.</p>
            </div>
        </div>
    </div>
</div>


<div class="custom-breadcrumns border-bottom">
    <div class="container">
        <a href="{{ route('home') }}">Home</a>
        <span class="mx-3 icon-keyboard_arrow_right"></span>
        <span class="current">Forget Password</span>
    </div>
</div>

<div class="site-section">
    <div class="container">

        <form action="{{route('forget.post')}}" method="POST">
            @csrf




            <div class="row justify-content-center">

                <div class="col-md-5">
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


                    @if ($errors->any())
                    <script>
                        Swal.fire({
                                                title: "Oops!",
                                                html: `{!! implode('<br>', $errors->all()) !!}`,
                                                icon: "error",
                                                timer: 2000,
                                                showConfirmButton: true,
                                            });
                    </script>
                    @endif

                    <div class="row">
                        <div class="col-md-12 form-group">
                            <label for="email">Email Address</label>
                            <input type="email" id="email" name="email" class="form-control form-control-lg"
                                value="{{ old('email', Auth::check() ? Auth::guard('web')->user()->email : '') }}"
                                placeholder="Enter the Email Address" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 d-flex justify-content-between align-items-center">
                            <input type="submit" value="Send Request" class="btn btn-primary btn-lg px-5">
                            <a href="{{route('login')}}">Back Login</a>
                        </div>
                    </div>
                    <br>

                </div>


            </div>
        </form>



    </div>
</div>
@endsection