<header class="site-navbar py-4 js-sticky-header site-navbar-target" role="banner">

    <div class="container">
        <div class="d-flex align-items-center">
            <div class="site-logo">
                <a href="{{route('home')}}" class="d-block">
                    <img src="{{asset('assets/images/logo.jpg')}}" alt="Image" class="img-fluid">
                </a>
            </div>
            <div class="mr-auto">
                <nav class="site-navigation position-relative text-right" role="navigation">
                    <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">
                        <li class="{{ request()->routeIs('home') ? 'active' : '' }}">
                            <a href="{{route('home')}}" class="nav-link text-left">Home</a>
                        </li>
                        <li class="{{ request()->routeIs('about') ? 'active' : '' }}">
                            <a href="{{route('about')}}" class="nav-link text-left">About Us</a>
                        </li>
                        <li class="{{ request()->routeIs('admission') ? 'active' : '' }}">
                            <a href="{{route('admission')}}" class="nav-link text-left">Admissions</a>
                        </li>
                        <li class="{{ request()->routeIs('course') ? 'active' : '' }}">
                            <a href="{{route('course')}}" class="nav-link text-left">Courses</a>
                        </li>
                        <li class="{{ request()->routeIs('contact') ? 'active' : '' }}">
                            <a href="{{route('contact')}}" class="nav-link text-left">Contact</a>
                        </li>
                    </ul>
                    </ul>
                </nav>

            </div>
            <div class="ml-auto">
                <div class="social-wrap">
                    <a href="{{ url('https://www.instagram.com/sathwik.nayak_/') }}"><span
                            class="icon-facebook"></span></a>
                    <a href="{{ url('https://twitter.com/sathwiknayak') }}"><span class="icon-twitter"></span></a>
                    <a href="{{ url('https://www.linkedin.com/in/sathwik-nayak/') }}"><span
                            class="icon-linkedin"></span></a>

                    <a href="#" class="d-inline-block d-lg-none site-menu-toggle js-menu-toggle text-black"><span
                            class="icon-menu h3"></span></a>
                </div>
            </div>

        </div>
    </div>

</header>