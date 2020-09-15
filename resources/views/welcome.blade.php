<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css" integrity="sha384-HzLeBuhoNPvSl5KYnjx0BT+WB0QEEqLprO+NBkkk5gbc67FTaL7XIGa2w1L0Xbgc" crossorigin="anonymous" />
    <link href="https://fonts.googleapis.com/css2?family=Kumbh+Sans:wght@400;700&display=swap" rel="stylesheet" />

    <!-- Custom CSS-->
    <link rel="stylesheet" href="/css/index.css">
</head>

<body>
    <div class="flex-center position-ref full-height">
        <!-- Navbar Section -->
        <nav class="navbar">
            <div class="navbar__container">
                <a href="/" id="navbar__logo"><i class="fas fa-compact-disc fa-lg"></i>PLAYZ</a>
                <div class="navbar__toggle" id="mobile-menu">
                    <span class="bar"></span> <span class="bar"></span>
                    <span class="bar"></span>
                </div>
                <ul class="navbar__menu">
                    @if (Route::has('login'))
                    @auth
                    <li class="navbar__item">
                        <a href="{{ url('/home') }}" class="navbar__links">Home</a>
                    </li>
                    <li class="navbar__item">
                        <a href="/" class="navbar__links">Find</a>
                    </li>
                    <li class="navbar__item">
                        <a href="/" class="navbar__links">Upload</a>
                    </li>
                    <li class="navbar__item">
                        <a href="/" class="navbar__links">Hire</a>
                    </li>

                    @else
                    <li class="navbar__item">
                        <a href="/" class="navbar__links">Find</a>
                    </li>
                    <li class="navbar__item">
                        <a href="{{ route('login') }}" class="navbar__links">Login</a>
                    </li>

                    @if (Route::has('register'))
                    <li class="navbar__btn"><a href="{{ route('register') }}" class="button">Sign Up</a></li>
                    @endif
                    @endauth
                    @endif
                </ul>
            </div>
        </nav>

        <!-- Hero Section -->
        <div class="main">
            <div class="main__container">
                <div class="main__content">
                    <h1>LET YOUR</h1>
                    <h2>CREATIVITY FLOW</h2>
                    <p>See what make us different.</p>
                    <button class="main__btn"><a href="#">Get Started</a></button>

                </div>
                <div class="main__img--container">
                    <img id="main__img" src="/img/index/pic1.svg" />
                </div>
            </div>
        </div>


        <!-- Services Section -->
        <div class="services">
            <h1>See what the hype is about</h1>
            <div class="services__container">
                <div class="services__card">
                    <h2>Experience Bliss</h2>
                    <p>AI Powered technology</p>
                    <button>Get Started</button>
                </div>
                <div class="services__card">
                    <h2>Are you Ready?</h2>
                    <p>Take the leap</p>
                    <button>Get Started</button>
                </div>
            </div>
        </div>

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
    </div>
    <script src="/js/index.js"></script>
</body>

</html>