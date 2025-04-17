@extends('layouts.app')
@section('content')
@section('title', 'Academics | Forget Password')



<div class="site-section ftco-subscribe-1 site-blocks-cover pb-4"
    style="background-image: url{{asset('assets/images/bg_1.jpg')}}">
    <div class="container">
        <div class="row align-items-center justify-content-center text-center">
            <div class="col-lg-7">
                <h2 class="mb-4">Reset Password</h2>
                <p>Please enter your new password and reset your password and regain access to your account.</p>
            </div>
        </div>
    </div>
</div>


<div class="custom-breadcrumns border-bottom">
    <div class="container">

        <a href="{{ route('home') }}">Home</a>
        <span class="mx-3 icon-keyboard_arrow_right"></span>
        <span class="current">Reset Password</span>
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

        <form action="{{ route('password.update') }}" method="POST">
            @csrf

            <input type="hidden" name="token" value="{{ $token }}">
            <input type="hidden" name="email" value="{{ $email }}">

            <div class="form-group">
                <label for="password">New Password</label>
                <input type="password" name="password" class="form-control" required
                    placeholder="Enter your new password">
            </div>

            <div class="form-group">
                <label for="password_confirmation">Confirm New Password</label>
                <input type="password" name="password_confirmation" class="form-control" required
                    placeholder="Enter your new password">
            </div>

            <button type="submit" class="btn btn-primary mt-3">Reset Password</button>
        </form>



    </div>
</div>
@endsection