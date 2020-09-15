@extends('layouts.app')

@section('content')

<!-- Custom CSS-->
<link rel="stylesheet" href="/css/index.css">


<div class="flex-center position-ref full-height">

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

</div>
@endsection