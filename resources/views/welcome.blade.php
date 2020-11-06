@extends('layouts.app')

@section('head')
<title>{{ __('audios.home_title') }} - PlayZ</title>

<!-- Custom CSS-->
<link rel="stylesheet" href="/css/index.css">
@endsection

@section('content')
<div class="flex-center position-ref full-height">
    <!-- Hero Section -->
    <div class="main">
        @include('util.message')
        <div class="main__container">
            <div class="main__content">
                <h1>{{ __('audios.welcome_announce_1') }}</h1>
                <h2>{{ __('audios.welcome_announce_2') }}</h2>
                <p>{{ __('audios.welcome_description') }}</p>
                <button class="main__btn"><a href="#">{{ __('audios.get_started') }}</a></button>
            </div>
            <div class="main__img--container">
                <img id="main__img" src="/img/index/pic1.svg" />
            </div>
        </div>
    </div>

    @isset($audios)
    @if($audios->count() > 0)
    <div class="services">
        <h1>{{ __('audios.latest_songs_home') }}</h1>
        <h1>{{ __('audios.latest_two_audios_home') }}</h1>
        <div class="services__container">
            @foreach($audios as $audio)
            <div class="services__card" style="background-image: linear-gradient( to bottom, rgba(0, 0, 0, 0) 0%, rgba(17, 17, 17, 0.6) 100% ), url({{ Storage::url($audio->cover_image) }});">
                <h2>{{ $audio->getTitle() }}</h2>
                <p>{{ $audio->getDescription() }}</p>
                <a href="{{route('show.audio', $audio->getId())}}"><button>{{ __('audios.more_details') }}</button></a>
            </div>
            <!-- <h1>{{Storage::url($audio->cover_image)}}</h1> -->
            @endforeach
        </div>
    </div>
    @endif
    @endisset
</div>
@endsection