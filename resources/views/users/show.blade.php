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
                        @if($user->isAdmin())
                            <span class="badge badge-danger align-center">{{ __('audios.staff') }}</span>
                        @endif
                        {{ $user->getName() }}
                    </h5>
                    <h6>
                        {{ $user->getStatus() }}
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
                    @if(Auth::user()->isAdmin() && !$user->isAdmin())
                        <p>{{ __('audios.admin_panel') }}</p>
                        <a href="{{ route("users.delete", $user->getId()) }}"><i class="fas fa-trash" title="{{ __('audios.delete') }}"></i> Delete User</a>
                    @endif
                </div>
            </div>
            <div class="col-md-8">
            
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-audios" role="tabpanel" aria-labelledby="nav-audios-tab">
                        @foreach($audios as $audio)
                        <div class="card">
                            <img class="card-img-top" src="{{ Storage::url($audio->getCoverImage()) }}" height="300" width="50" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">{{ $audio->getTitle() }}</h5>
                                <p class="card-text">{{ $audio->getDescription() }}.</p>
                                <a href="{{route('show.audio', $audio->getId())}}" class="btn btn-warning mt-1">{{ __('audios.more_details') }}</a>
                            </div>
                        </div>
                        <br>
                        @endforeach
                    </div>
                    <div class="tab-pane fade" id="nav-bundles" role="tabpanel" aria-labelledby="nav-bundles-tab">
                        @foreach($bundles as $bundle)
                        <div class="card">
                            <img class="card-img-top" src="{{ Storage::url($bundle->getCoverImage()) }}" height="300" width="50" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">{{ $bundle->getTitle() }}</h5>
                                <p class="card-text">{{ $bundle->getDescription() }}.</p>
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