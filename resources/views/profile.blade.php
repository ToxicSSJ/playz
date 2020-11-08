@extends('layouts.app')

@section('head')
<title>{{ __('audios.profile') }} - PlayZ</title>
@endsection

@section('content')
<link rel="stylesheet" href="/css/profile.css">

<div class="container emp-profile">
    @include('util.message')
    <form method="post">
        <div class="row">
            <div class="col-md-4">
                <div class="profile-img">
                    <img src="/img/profile/avatar.png" alt="" height="183" width="275" />
                </div>
            </div>
            <div class="col-md-6">
                <div class="profile-head">
                    <h5>
                        @if(Auth::user()->isAdmin())
                        <span class="badge badge-danger align-center">{{ __('audios.staff') }}</span>
                        @endif
                        {{ Auth::user()->getName() }}
                    </h5>
                    <h6>
                        Dj with Love - Test
                    </h6>
                    <p class="proile-rating">WALLET: <span>${{ Auth::user()->wallet }}</span></p>
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link active" id="nav-audios-tab" data-toggle="tab" href="#nav-audios" role="tab" aria-controls="nav-audios" aria-selected="true">Audios</a>
                            <a class="nav-item nav-link" id="nav-bundles-tab" data-toggle="tab" href="#nav-bundles" role="tab" aria-controls="nav-bundles" aria-selected="false">Bundles</a>
                        </div>
                    </nav>

                </div>
            </div>
            <div class="col-md-2">
                <input type="submit" class="profile-edit-btn" name="btnAddMore" value="Edit Profile" />
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="profile-work">
                    <p>USER ID</p>
                    <a href="">{{ Auth::user()->id }}</a>
                    <p>EMAIL</p>
                    <a href="">{{ Auth::user()->email }}</a>
                </div>
            </div>
            <div class="col-md-8">
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-audios" role="tabpanel" aria-labelledby="nav-audios-tab">
                        @foreach($audios as $audio)
                        <div class="card">
                            <img class="card-img-top" src="{{ Storage::url($audio->cover_image) }}" height="300" width="50" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">{{ $audio->title }}</h5>
                                <p class="card-text">{{ $audio->description }}.</p>
                                <a href="{{route('show.audio', $audio->getId())}}" class="btn btn-warning mt-1">{{ __('audios.more_details') }}</a>
                            </div>
                        </div>
                        <br>
                        @endforeach
                    </div>
                    <div class="tab-pane fade" id="nav-bundles" role="tabpanel" aria-labelledby="nav-bundles-tab">
                        @foreach($bundles as $bundle)
                        <div class="card">
                            <img class="card-img-top" src="{{ Storage::url($bundle->cover_image) }}" height="300" width="50" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">{{ $bundle->title }}</h5>
                                <p class="card-text">{{ $bundle->description }}.</p>
                                <a href="{{route('bundle.show', $bundle->getId())}}" class="btn btn-warning mt-1">{{ __('audios.more_details') }}</a>
                            </div>
                        </div>
                        <br>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </form>
</div>
<br>
@endsection