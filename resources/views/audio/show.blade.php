@extends('layouts.navbar.audio')

@section("title", "Audio Show")

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Audio: {{ $audio->getTitle() }}</div>
                <div class="card-body">
                    <p class="card-text m-0"><small class="text-muted">ID: {{ $audio->getId() }}</small></p>
                    <p class="card-text m-0"><small class="text-muted">Price: {{ $audio->getPrice() }}</small></p>
                    <p class="card-text m-0"><small class="text-muted">PhotoID: {{ $audio->getPhotoId() }}</small></p>
                    <p class="card-text m-0"><small class="text-muted">Filename: {{ $audio->getFilename() }}</small></p>
                    <p class="card-text m-0"><small class="text-muted">Type: {{ $audio->getType() }}</small></p>
                    <p class="card-text m-0"><small class="text-muted">Contributors: {{ $audio->getContributors() }}</small></p>
                    <p class="card-text m-0"><small class="text-muted">Categories: {{ $audio->getCategories() }}</small></p>
                    <br />
                    <p class="card-text"><b>Description:</b> {{ $audio->getDescription() }}</p>
                    <a href="{{ route('audio.delete', $audio->getId()) }}" class="btn btn-primary">Delete</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
