<!doctype html>
<html lang="en">
<!--begin::Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Academics Admin | Login</title>
    <!--begin::Primary Meta Tags-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="title" content="AdminLTE 4 | Login Page v2" />
    <meta name="author" content="ColorlibHQ" />
    <meta name="description"
        content="AdminLTE is a Free Bootstrap 5 Admin Dashboard, 30 example pages using Vanilla JS." />
    <meta name="keywords"
        content="bootstrap 5, bootstrap, bootstrap 5 admin dashboard, bootstrap 5 dashboard, bootstrap 5 charts, bootstrap 5 calendar, bootstrap 5 datepicker, bootstrap 5 tables, bootstrap 5 datatable, vanilla js datatable, colorlibhq, colorlibhq dashboard, colorlibhq admin dashboard" />
    <!--end::Primary Meta Tags-->
    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css"
        integrity="sha256-tXJfXfp6Ewt1ilPzLDtQnJV4hclT9XuaZUKyUvmyr+Q=" crossorigin="anonymous" />
    <!--end::Fonts-->
    <!--begin::Third Party Plugin(OverlayScrollbars)-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.10.1/styles/overlayscrollbars.min.css"
        integrity="sha256-tZHrRjVqNSRyWg2wbppGnT833E/Ys0DHWGwT04GiqQg=" crossorigin="anonymous" />
    <!--end::Third Party Plugin(OverlayScrollbars)-->
    <!--begin::Third Party Plugin(Bootstrap Icons)-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
        integrity="sha256-9kPW/n5nn53j4WMRYAxe9c1rCY96Oogo/MKSVdKzPmI=" crossorigin="anonymous" />
    <!--end::Third Party Plugin(Bootstrap Icons)-->
    <!--begin::Required Plugin(AdminLTE)-->
    <link rel="stylesheet" href="{{asset('admin/css/adminlte.css')}}" />
    <!--end::Required Plugin(AdminLTE)-->
</head>
<!--end::Head-->
<!--begin::Body-->

<body class="login-page bg-body-secondary">
    <div class="login-box">
        <div class="card card-outline card-primary">
            <div class="card-header">
                <a href="{{route('admin.auth.login')}}"
                    class="link-dark text-center link-offset-2 link-opacity-100 link-opacity-50-hover">
                    <h1 class="mb-0"><b>Academics</b> Admin</h1>
                    <div class="d-flex align-items-center justify-content-center">
                        <img src="{{asset('admin/assets/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" width="50">
                    </div>
                </a>
            </div>
            <div class="card-body login-card-body">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif

                <p class="login-box-msg">Sign In</p>
                <form action="{{route('admin.auth.processLogin')}}" method="POST">
                    @csrf
                    <div class="input-group mb-1">
                        <div class="form-floating">
                            <input type="email" class="form-control" name="email" value="{{ old('email') }}"
                                placeholder="Enter the Email Address" required />
                            <label for="email">Email</label>
                        </div>
                        <div class="input-group-text"><span class="bi bi-envelope"></span></div>
                    </div>
                    <div class="input-group mb-1">
                        <div class="form-floating">
                            <input type="password" class="form-control" id="password" name="password"
                                value="{{ old('password') }}" placeholder="Enter the Password" required />
                            <label for="password">Password</label>
                        </div>
                        <div class="input-group-text" onclick="togglePassword()">
                            <span id="eye-icon" class="bi bi-eye-fill"></span>
                        </div>
                    </div>
                    <!--begin::Row-->
                    <div class="row">
                        <div class="col-8 d-inline-flex align-items-center">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="{{old('remember_token')}}" />
                                <label class="form-check-label" for="remember_token"> Remember Me </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary">Sign In</button>
                            </div>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!--end::Row-->
                </form>
                <!-- /.social-auth-links -->
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->
    <!--begin::Third Party Plugin(OverlayScrollbars)-->
    <script src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.10.1/browser/overlayscrollbars.browser.es6.min.js"
        integrity="sha256-dghWARbRe2eLlIJ56wNB+b760ywulqK3DzZYEpsg2fQ=" crossorigin="anonymous"></script>
    <!--end::Third Party Plugin(OverlayScrollbars)-->
    <!--begin::Required Plugin(popperjs for Bootstrap 5)-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <!--end::Required Plugin(popperjs for Bootstrap 5)-->
    <!--begin::Required Plugin(Bootstrap 5)-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script>
    <!--end::Required Plugin(Bootstrap 5)-->
    <!--begin::Required Plugin(AdminLTE)-->
    <script src="{{asset('admin/js/adminlte.js')}}"></script>
    <!--end::Required Plugin(AdminLTE)-->
    <!--begin::OverlayScrollbars Configure-->
    <!--end::OverlayScrollbars Configure-->
    <script>
        function togglePassword() {
            var passwordInput = document.getElementById('password');
            var eyeIcon = document.getElementById('eye-icon');

            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                eyeIcon.classList.remove("bi-eye-fill");
                eyeIcon.classList.add("bi-eye-slash-fill");
            } else {
                passwordInput.type = "password";
                eyeIcon.classList.remove("bi-eye-slash-fill");
                eyeIcon.classList.add("bi-eye-fill");
            }
        }
    </script>
    <!--end::Script-->
</body>
<!--end::Body-->

</html>