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
        <br>
    </div>
    @endif
    @endisset
    <section class="meetings">
        <div class="services ">
            <div class="row ml-5 mr-5">
                <div class="col-6">
                <h1>{{ __('audios.meetings') }}</h1>
                </div>
                <div class="col-6 text-right">
                    <a class="btn btn-primary mb-3 mr-1" href="#carouselExampleIndicators2" role="button" data-slide="prev">
                        <i class="fa fa-arrow-left"></i>
                    </a>
                    <a class="btn btn-primary mb-3 " href="#carouselExampleIndicators2" role="button" data-slide="next">
                        <i class="fa fa-arrow-right"></i>
                    </a>
                </div>
                <div class="col-12">
                    <div id="carouselExampleIndicators2" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            @foreach($meetings->chunk(3) as $chunk)
                                @if($loop->index == 0)
                                <div class="carousel-item active">
                                @else
                                <div class="carousel-item">
                                @endif
                                <div class="row">
                                    @foreach($chunk as $meet)
                                    <div class="col-md-4 mb-3">
                                        <div class="card">
                                            <div class="card-body">
                                                <h4 class="card-title"><i class="fas fa-calendar-alt"></i> <strong>{{ $meet['date'] }}</strong></h4>
                                                <p class="card-text"><strong>{{ __('audios.place') }}:</strong> {{ $meet['place'] }}</p>
                                                <p class="card-text">{{ $meet['details'] }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection