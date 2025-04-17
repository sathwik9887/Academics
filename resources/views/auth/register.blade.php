@extends('layouts.app')
@section('content')
@section('title', 'Academics | Registration')


<div class="site-section ftco-subscribe-1 site-blocks-cover pb-4" style="background-image: url('images/bg_1.jpg')">
    <div class="container">
        <div class="row align-items-end justify-content-center text-center">
            <div class="col-lg-7">
                <h2 class="mb-0">Register</h2>
                <p>Create your account to access all features and start your journey with us.</p>
            </div>
        </div>
    </div>
</div>


<div class="custom-breadcrumns border-bottom">
    <div class="container">
        <a href="{{ route('home') }}">Home</a>
        <span class="mx-3 icon-keyboard_arrow_right"></span>
        <span class="current">Register</span>
    </div>
</div>

<div class="site-section">
    <div class="container">

        <form action="{{route('register.post')}}" method="POST">
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
                            <label for="name">Full Name</label>
                            <input type="text" name="name" class="form-control form-control-lg"
                                placeholder="Enter the Full Name" required>
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control form-control-lg"
                                placeholder="Enter the Email Address" required>
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control form-control-lg"
                                placeholder="Enter the Password" required>
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="confirm_password">Confirm Password</label>
                            <input type="password" name="confirm_password" class="form-control form-control-lg"
                                placeholder="Enter the Confirm Password" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <input type="submit" value="Register" class="btn btn-primary btn-lg px-5">
                            <a href="{{ route('login') }}" class="d-block mt-3 text-end">Already have an account?
                                Login</a>
                        </div>
                    </div>
                </div>
            </div>
        </form>




    </div>
</div>
@endsection