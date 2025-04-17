<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
    <!--begin::Sidebar Brand-->
    <div class="sidebar-brand">
        <!--begin::Brand Link-->
        <a href="{{route('admin.dashboard')}}" class="brand-link">
            <!--begin::Brand Image-->
            <img src="{{asset('admin/assets/img/AdminLTELogo.png')}}" alt="AdminLTE Logo"
                class="brand-image opacity-75 shadow" />
            <!--end::Brand Image-->
            <!--begin::Brand Text-->
            <span class="brand-text fw-light">Academics Admin</span>
            <!--end::Brand Text-->
        </a>
        <!--end::Brand Link-->
    </div>
    <!--end::Sidebar Brand-->
    <!--begin::Sidebar Wrapper-->
    <div class="sidebar-wrapper">
        <nav class="mt-2">
            <!--begin::Sidebar Menu-->
            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">
                <li class="nav-item menu-open">
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('admin.dashboard')}}"
                                class="nav-link {{request()->routeIs('admin.dashboard') ? 'active' : ''}}">
                                <i class="nav-icon bi bi-speedometer"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">
                <li class="nav-item menu-open">
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('admin.home')}}"
                                class="nav-link {{request()->routeIs('admin.home') ? 'active' : ''}}">
                                <i class="nav-icon bi bi-house"></i>
                                <p>Home</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">
                <li class="nav-item menu-open">
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('admin.academics')}}"
                                class="nav-link {{request()->routeIs('admin.academics') ? 'active' : ''}}">
                                <i class="nav-icon bi bi-backpack"></i>
                                <p>Academics</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">
                <li class="nav-item menu-open">
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('admin.courses')}}"
                                class="nav-link {{request()->routeIs('admin.courses') ? 'active' : ''}}">
                                <i class="nav-icon bi bi-book-fill"></i>
                                <p>Courses</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">
                <li class="nav-item menu-open">
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('admin.university')}}"
                                class="nav-link {{request()->routeIs('admin.university') ? 'active' : ''}}">
                                <i class="nav-icon bi bi-file"></i>
                                <p>University</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">
                <li class="nav-item menu-open">
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('admin.testimonials')}}"
                                class="nav-link {{request()->routeIs('admin.testimonials') ? 'active' : ''}}">
                                <i class="nav-icon bi bi-person-arms-up"></i>
                                <p>Testimonials</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">
                <li class="nav-item menu-open">
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('admin.about')}}"
                                class="nav-link {{request()->routeIs('admin.about') ? 'active' : ''}}">
                                <i class="nav-icon bi bi-file-earmark-person"></i>
                                <p>About</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">
                <li class="nav-item menu-open">
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('admin.teachers')}}"
                                class="nav-link {{request()->routeIs('admin.teachers') ? 'active' : ''}}">
                                <i class="nav-icon bi bi-person-check"></i>
                                <p>Teachers</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">
                <li class="nav-item menu-open">
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('admin.philosophy')}}"
                                class="nav-link {{request()->routeIs('admin.philosophy') ? 'active' : ''}}">
                                <i class="nav-icon bi bi-bookshelf"></i>
                                <p>Philosophy</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">
                <li class="nav-item menu-open">
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('admin.newsletter')}}"
                                class="nav-link {{request()->routeIs('admin.newsletter') ? 'active' : ''}}">
                                <i class="nav-icon bi bi-newspaper"></i>
                                <p>Newsletter</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">
                <li class="nav-item menu-open">
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('admin.admissions')}}"
                                class="nav-link {{request()->routeIs('admin.admissions') ? 'active' : ''}}">
                                <i class="nav-icon bi bi-ticket-detailed"></i>
                                <p>Admissions</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">
                <li class="nav-item menu-open">
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('admin.news')}}"
                                class="nav-link {{request()->routeIs('admin.news') ? 'active' : ''}}">
                                <i class="nav-icon bi bi-substack"></i>
                                <p>News</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">
                <li class="nav-item menu-open">
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('admin.users')}}"
                                class="nav-link {{request()->routeIs('admin.users') ? 'active' : ''}}">
                                <i class="nav-icon bi bi-people"></i>
                                <p>Users</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!--end::Sidebar Menu-->
        </nav>
    </div>
    <!--end::Sidebar Wrapper-->
</aside>