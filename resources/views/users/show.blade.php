@extends('layouts.app')

@section('head')
<title>{{ $user->getName() }} - PlayZ</title>
@endsection

@section('content')

<link rel="stylesheet" href="/css/profile.css">
<div class="container emp-profile">
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
                        {{ $user->getName() }}
                    </h5>
                    <h6>
                        Dj with Love
                    </h6>
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link nav-tab active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Audios</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="profile-work">
                    <p>USER ID</p>
                    <a href="">{{ $user->getId() }}</a>
                    <p>EMAIL</p>
                    <a href="">{{ $user->getEmail() }}</a>
                </div>
            </div>
            <div class="col-md-8">
                <div class="tab-content profile-tab" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="row">
                            @foreach($audios as $audio)
                            <div class="card">
                                <img class="card-img-top" src="{{ Storage::url($audio->getCoverImage()) }}" height="300" width="50" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $audio->getTitle() }}</h5>
                                    <p class="card-text">{{ $audio->getDescription() }}.</p>
                                    <a href="#" class="btn btn-primary">Go somewhere</a>
                                </div>
                            </div>
                            <br>
                            @endforeach
                        </div>


                    </div>

                </div>
            </div>
        </div>
    </form>
</div>
<br>
@endsection