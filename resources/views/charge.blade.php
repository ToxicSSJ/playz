@extends('layouts.app')

@section('head')
<title>{{ __('audios.home_title') }} - PlayZ</title>

<!-- Custom CSS-->
<link rel="stylesheet" href="/css/index.css">
@endsection

@section('content')
<div class="flex-center position-ref full-height">
    <!-- Hero Section -->
    <section class="pricing py-5 pb-10">
        <div class="container">
            @include('util.message')
            <p><strong>💰 {{ __('audios.current_credits') }}: </strong>${{ Auth::user()->getWallet() }}</p>
            <div class="row">
            <!-- Free Tier -->
            <div class="col-lg-4">
                <div class="card mb-5 mb-lg-0">
                <div class="card-body">
                    <h5 class="card-title text-muted text-uppercase text-center">{{ __('audios.small') }}</h5>
                    <h6 class="card-price text-center">$5<span class="period"> {{ __('audios.one_time') }}</span></h6>
                    <hr>
                    <ul class="fa-ul">
                    <li><span class="fa-li"><i class="fas fa-check"></i></span><strong>12 {{ __('audios.credits') }}</strong></li>
                    </ul>
                    <a href="{{ route('profile.purchase', ['package' => 'small']) }}" class="btn btn-block btn-primary text-uppercase">{{ __('audios.buy') }}</a>
                </div>
                </div>
            </div>
            <!-- Plus Tier -->
            <div class="col-lg-4">
                <div class="card mb-5 mb-lg-0">
                <div class="card-body">
                    <h5 class="card-title text-muted text-uppercase text-center">{{ __('audios.medium') }}</h5>
                    <h6 class="card-price text-center">$20<span class="period"> {{ __('audios.one_time') }}</span></h6>
                    <hr>
                    <ul class="fa-ul">
                    <li><span class="fa-li"><i class="fas fa-check"></i></span><strong>40 {{ __('audios.credits') }}</strong></li>
                    </ul>
                    <a href="{{ route('profile.purchase', ['package' => 'medium']) }}" class="btn btn-block btn-primary text-uppercase">{{ __('audios.buy') }}</a>
                </div>
                </div>
            </div>
            <!-- Pro Tier -->
            <div class="col-lg-4">
                <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-muted text-uppercase text-center">{{ __('audios.dj') }}</h5>
                    <h6 class="card-price text-center">$60<span class="period"> {{ __('audios.one_time') }}</span></h6>
                    <hr>
                    <ul class="fa-ul">
                    <li><span class="fa-li"><i class="fas fa-check"></i></span><strong>130 {{ __('audios.credits') }}</strong></li>
                    </ul>
                    <a href="{{ route('profile.purchase', ['package' => 'dj']) }}" class="btn btn-block btn-primary text-uppercase">{{ __('audios.buy') }}</a>
                </div>
                </div>
            </div>
            </div>
        </div>
    </section>
</div>
@endsection