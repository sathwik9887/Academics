<nav class="app-header navbar navbar-expand bg-body">
    <!--begin::Container-->
    <div class="container-fluid">
        <!--begin::Start Navbar Links-->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button">
                    <i class="bi bi-list"></i>
                </a>
            </li>
        </ul>
        <!--end::Start Navbar Links-->
        <!--begin::End Navbar Links-->
        <ul class="navbar-nav ms-auto">
            <!--begin::Navbar Search-->
            <!--end::Navbar Search-->
            <!--begin::Messages Dropdown Menu-->
            <!--end::Messages Dropdown Menu-->
            <!--begin::Notifications Dropdown Menu-->
            <!--end::Notifications Dropdown Menu-->
            <!--begin::Fullscreen Toggle-->
            <!--end::Fullscreen Toggle-->
            <!--begin::User Menu Dropdown-->
            <li class="nav-item dropdown user-menu">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                    <img src="{{asset('admin/assets/img/user2-160x160.jpg')}}" class="user-image rounded-circle shadow"
                        alt="User Image" />
                    @if(Auth::guard('admin')->check())
                    <span class="d-none d-md-inline">{{ Auth::guard('admin')->user()->name }}</span>
                    @endif
                </a>
                <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                    <!--begin::User Image-->
                    <li class="user-header text-bg-primary">
                        <img src="{{asset('admin/assets/img/user2-160x160.jpg')}}" class="rounded-circle shadow"
                            alt="User Image" />
                        @if(Auth::guard('admin')->check())
                        <p>
                            {{ Auth::guard('admin')->user()->name }}
                            <small>Member since {{ Auth::guard('admin')->user()->created_at->format('F Y') }}</small>
                        </p>
                        @endif
                    </li>
                    <!--end::User Image-->
                    <!--begin::Menu Body-->
                    <!--end::Menu Body-->
                    <!--begin::Menu Footer-->
                    <li class="user-footer">
                        <a href="" class="btn btn-default btn-flat float-start">My Profile</a>
                        <a href="{{route('admin.auth.logout')}}" class="btn btn-default btn-flat float-end">Sign
                            out</a>
                    </li>
                    <!--end::Menu Footer-->
                </ul>
            </li>
            <!--end::User Menu Dropdown-->
        </ul>
        <!--end::End Navbar Links-->
    </div>
    <!--end::Container-->
</nav>
