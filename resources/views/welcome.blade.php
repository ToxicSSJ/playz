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
    @isset($audios)
    <div class="services">
        <h1>See what the hype is about</h1>
        <div class="main__content">
            <p align="center">Our most recent songs.</p>
        </div>
        <div class="services__container">
            @foreach($audios as $audio)
            <div class="services__card" style="background-image: linear-gradient( to bottom, rgba(0, 0, 0, 0) 0%, rgba(17, 17, 17, 0.6) 100% ), url({{ Storage::url($audio->cover_image) }});">
                <h2>{{ $audio->getTitle() }}</h2>
                <p>{{ $audio->getDescription() }}</p>
                <a href="{{route('show.audio', $audio->getId())}}"><button>{{ __('audios.see_more') }}</button></a>
            </div>
            @endforeach
        </div>
    </div>
    @endisset

</div>
@endsection