<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'PLAYZ') }}</title>

    <!-- Scripts -->
    <!-- <script src="{{ asset('js/app.js') }}" defer></script> -->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bs-stepper/dist/css/bs-stepper.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <!-- Bootstrap core CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
    <!-- JQuery -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css" integrity="sha512-xmGTNt20S0t62wHLmQec2DauG9T+owP9e6VU8GigI0anN7OXLip9i7IwEhelasml2osdxX71XcYm6BQunTQeQg==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput-typeahead.css" integrity="sha512-wu4jn1tktzX0SHl5qNLDtx1uRPSj+pm9dDgqsrYUS16AqwzfdEmh1JR8IQL7h+phL/EAHpbBkISl5HXiZqxBlQ==" crossorigin="anonymous" />
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css" integrity="sha384-HzLeBuhoNPvSl5KYnjx0BT+WB0QEEqLprO+NBkkk5gbc67FTaL7XIGa2w1L0Xbgc" crossorigin="anonymous" />
    <link href="https://fonts.googleapis.com/css2?family=Kumbh+Sans:wght@400;700&display=swap" rel="stylesheet" />

    <link href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" rel="stylesheet"></link>
    <!-- Custom CSS-->
    <link rel="stylesheet" href="/css/index.css">
    <link rel="stylesheet" href="{{ asset('css/player/stickyaudioplayerjquery.min.css') }}">

</head>

<body>
    <div id="app">

        <!-- Navbar Section -->
        <nav class="navbar">
            <div class="navbar__container">
                <a href="{{ url('/') }}" id="navbar__logo"><i class="fas fa-compact-disc fa-lg"></i>PLAYZ</a>
                <div class="navbar__toggle" id="mobile-menu">
                    <span class="bar"></span> <span class="bar"></span>
                    <span class="bar"></span>
                </div>
                <ul class="navbar__menu">
                    <!-- Authentication Links -->
                    @guest
                    <li class="navbar__item">
                        <a href="{{ route('login') }}" class="navbar__links">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                    <li class="navbar__btn"><a href="{{ route('register') }}" class="button">{{ __('Register') }}</a></li>
                    @endif
                    @else
                    <li class="navbar__item">
                        <a href="/" class="navbar__links">{{ __('audios.home') }}</a>
                    </li>
                    <li class="navbar__item">
                        <a href="{{ route('find') }}" class="navbar__links">{{ __('audios.find') }}</a>
                    </li>
                    <li class="navbar__item">
                        <a href="{{ route('upload') }}" class="navbar__links">{{ __('audios.upload') }}</a>
                    </li>
                    <li class="navbar__item">
                        <a href="{{ route('hire') }}" class="navbar__links">{{ __('audios.hire') }}</a>
                    </li>
                    <li class="nav-item dropdown ">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle navbar__links" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item navbar__links__dropdown" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <a class="dropdown-item navbar__links__dropdown" href="{{ route('profile') }}">
                                {{ __('profile.profile') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                    @endguest
                </ul>
            </div>
        </nav>

        <main>
            @yield('content')
        </main>

        <!-- Footer Section -->
        <div class="footer__container">
            <div class="footer__links">
                <div class="footer__link--wrapper">
                    <div class="footer__link--items">
                        <h2>About Us</h2>
                        <a href="/sign__up">How it works</a> <a href="/">Testimonials</a>
                        <a href="/">Careers</a> <a href="/">Investments</a>
                        <a href="/">Terms of Service</a>
                    </div>
                    <div class="footer__link--items">
                        <h2>Contact Us</h2>
                        <a href="/">Contact</a> <a href="/">Support</a>
                        <a href="/">Destinations</a> <a href="/">Sponsorships</a>
                    </div>
                </div>
                <div class="footer__link--wrapper">
                    <div class="footer__link--items">
                        <h2>Videos</h2>
                        <a href="/">Submit Video</a> <a href="/">Ambassadors</a>
                        <a href="/">Agency</a> <a href="/">Influencer</a>
                    </div>
                    <div class="footer__link--items">
                        <h2>Social Media</h2>
                        <a href="/">Instagram</a> <a href="/">Facebook</a>
                        <a href="/">Youtube</a> <a href="/">Twitter</a>
                    </div>
                </div>
            </div>
            <section class="social__media">
                <div class="social__media--wrap">
                    <div class="footer__logo">
                        <a href="/" id="footer__logo"><i class="fas fa-compact-disc fa-lg"></i>PLAYZ</a>
                    </div>
                    <p class="website__rights">© PLAYZ 2020. All rights reserved</p>
                    <div class="social__icons">
                        <a class="social__icon--link" href="/" target="_blank" aria-label="Facebook">
                            <i class="fab fa-facebook"></i>
                        </a>
                        <a class="social__icon--link" href="/" target="_blank" aria-label="Instagram">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a class="social__icon--link" href="//https://www.youtube.com/channel/UCyuYHymUH4Adj2YytTdtD4g" target="_blank" aria-label="Youtube">
                            <i class="fab fa-youtube"></i>
                        </a>
                        <a class="social__icon--link" href="/" target="_blank" aria-label="Twitter">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a class="social__icon--link" href="/" target="_blank" aria-label="LinkedIn">
                            <i class="fab fa-linkedin"></i>
                        </a>
                    </div>
                </div>
            </section>
        </div>
        <script src="/js/index.js"></script>
    </div>
</body>


<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.min.js" integrity="sha256-eGE6blurk5sHj+rmkfsGYeKyZx3M4bG+ZlFyA7Kns7E=" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bs-stepper/dist/js/bs-stepper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.min.js" integrity="sha512-9UR1ynHntZdqHnwXKTaOm1s6V9fExqejKvg5XMawEMToW4sSw+3jtLrYfZPijvnwnnE8Uol1O9BcAskoxgec+g==" crossorigin="anonymous"></script>
<script src="{{ asset('js/player/stickyaudioplayerjquery.min.js') }}"></script>

@yield('scripts')

</html>