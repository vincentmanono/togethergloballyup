<header class="header-area">
    {{-- <div class="credit-main-menu" id="sticker">
        <div class="classy-nav-container breakpoint-off">
            <div class="container">
                <!-- Menu -->
                <nav class="classy-navbar justify-content-between" id="creditNav">

                    <!-- Navbar Toggler -->
                    <div class="classy-navbar-toggler">
                        <span class="navbarToggler"><span></span><span></span><span></span></span>
                    </div>

                    <!-- Menu -->
                    <div class="classy-menu">

                        <!-- Close Button -->
                        <div class="classycloseIcon">
                            <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                        </div>

                        <!-- Nav Start -->
                        <div class="classynav">
                            <ul>
                                <li><a href="/">Home</a></li>
                                <li><a href="/about ">About Us</a></li>

                                <li><a href="/services">Services</a></li>
                                <li><a href="/testimonial">Testimonials</a></li>
                                <li><a href="/contact">Contact</a></li>
                                <li><a href="/faq">FAQ</a></li>
                                <li class="credetials text text-info " >
                                    <li>
                                        <a name="" id="" href="{{ route('login') }}" class="login"
                                            role="button">Login</a>
                                    </li>
                                    <li>
                                        <a name="" id="" href="{{ route('register') }}" class="signup"
                                            role="button">Signup</a>
                                    </li>
                                </li>
                            </ul>
                        </div>
                        <!-- Nav End -->
                    </div>
                </nav>
            </div>
        </div>
    </div> --}}
    <nav class="navbar navbar-expand-lg navbar-dark navbarcontainer  fixed-top  pt-4 pb-4 ">
        {{-- <a class="navbar-brand" href="{{ route('index') }}">{{ config('app.name') }}</a> --}}
        <img href="{{ route('index') }}" src="/assets/img/logo/together-logo.png" alt="Logo">
        <button class="navbar-toggler d-lg-none bg-dark " type="button" data-toggle="collapse"
            data-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false"
            aria-label="Toggle navigation">
            <i class="fa fa-pencil" aria-hidden="true"> more </i>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li  style="padding-left: 15px" class="nav-item {{ request()->is('/') ? 'active' : '' }} ">
                    <a style="color: #fff" class="nav-link mynav btn btn-xs btn-primary" href="{{ route('index') }}">Home <span class="sr-only">(current)</span></a>
                </li>

                <li  style="padding-left: 10px" class="nav-item {{ request()->is('about') ? 'active' : '' }} ">
                    <a  style="color: #fff" class="nav-link mynav btn btn-primary"
                        href="/about ">About</a></li>

                <li  style="padding-left: 10px" class="nav-item {{ request()->is('services') ? 'active' : '' }} ">
                    <a style="color: #fff"class="nav-link mynav btn btn-primary"
                        href="/services">Services</a></li>
                <li  style="padding-left: 10px" class="nav-item {{ request()->is('testimonial') ? 'active' : '' }}">
                    <a style="color: #fff" class="nav-link mynav btn btn-primary"
                        href="/testimonial">Testimonials</a></li>
                <li  style="padding-left: 10px" class="nav-item {{ request()->is('contact') ? 'active' : '' }} ">
                    <a   class="nav-link mynav  btn btn-primary"
                    style="color: #fff" href="/contact">Contact</a></li>
                <li  style="padding-left: 10px" class="nav-item {{ request()->is('faq') ? 'active' : '' }} ">
                    <a style="color: #fff" class="nav-link mynav btn btn-primary  "  href="/faq">FAQ</a>
                </li>
            </ul>
            <ul class=" credetials text text-info list-inline ">
                <li class="list-inline-item nav-item ">
                    <a name="" id="" href="{{ route('login') }}" class="login nav-link " role="button">Login</a>
                </li>
                <li class="list-inline-item nav-item ">
                    <a name="" id="" href="{{ route('register') }}" class="signup nav-link " role="button">Signup</a>
                </li>
            </ul>
        </div>
    </nav>



</header>
