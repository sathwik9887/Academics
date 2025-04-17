<!DOCTYPE html>
<html lang="en">

@include('partials.link')


<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

    <div class="site-wrap">

        <div class="site-mobile-menu site-navbar-target">
            <div class="site-mobile-menu-header">
                <div class="site-mobile-menu-close mt-3">
                    <span class="icon-close2 js-menu-toggle"></span>
                </div>
            </div>
            <div class="site-mobile-menu-body"></div>
        </div>


        <div class="py-2 bg-light">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-9 d-none d-lg-block">
                        <a href="#" class="small mr-3">
                            <span class="icon-question-circle-o mr-2"></span> Have a question?
                        </a>
                        <a href="tel:+919886561734" class="small mr-3">
                            <span class="icon-phone2 mr-2"></span> +91 98865 61734
                        </a>
                        <a href="mailto:info@academics.com" class="small mr-3">
                            <span class="icon-envelope-o mr-2"></span> info@academics.com
                        </a>
                    </div>

                    @if(Auth::check())
                    <div class="col-lg-3 text-right dropdown">
                        <a href="#" class="dropdown-toggle small mr-3" id="userDropdown" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <span class="icon-user"></span> Hi, {{ Auth::user()->name }}
                        </a>
                        <a href="{{ route('cart') }}" class="big">
                            <span class="bi bi-cart2"></span>
                            <span class="cart-count">{{ App\Models\CartItem::sum('quantity') }}</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="#"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </div>
                    @else
                    <div class="col-lg-3 text-right">
                        <a href="{{ route('login') }}" class="small mr-3">
                            <span class="icon-unlock-alt"></span> Log In
                        </a>
                        <a href="{{ route('register') }}" class="small btn btn-primary px-4 py-2 rounded-0 mr-3">
                            <span class="icon-users"></span> Register
                        </a>
                        <a href="{{ route('cart') }}" class="big">
                            <span class="bi bi-cart2">{{ App\Models\CartItem::sum('quantity') }}</span>
                        </a>
                    </div>
                    @endif
                </div>
            </div>
        </div>
        @include('partials.navbar')


        @yield('content')


        @include('partials.footer')


    </div>
    <!-- .site-wrap -->




    <!-- loader -->
    <div id="loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
            <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
            <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10"
                stroke="#51be78" />
        </svg></div>

    @include('partials.scripts')
</body>

</html>