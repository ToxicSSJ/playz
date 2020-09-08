@extends('layouts.master')

@section("title", "Create Audio")

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('util.message')
            <div class="card">
                <div class="card-header">Create audio</div>
                <div class="card-body">
                @if($errors->any())
                <ul id="errors">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                @endif

                <form method="POST" action="{{ route('audio.save') }}">
                    @csrf
                    <input type="text" placeholder="Enter title" name="title" value="{{ old('title') }}" />
                    <textarea rows="5" cols="60" placeholder="Enter description" name="description" value="{{ old('description') }}"></textarea>
                    <input type="text" placeholder="Enter type" name="type" value="{{ old('type') }}" />
                    <input type="text" placeholder="Enter filename" name="filename" value="{{ old('filename') }}" />
                    <input type="text" placeholder="Enter photoId" name="photoId" value="{{ old('photoId') }}" />
                    <input type="text" placeholder="Enter contributors" name="contributors" value="{{ old('contributors') }}" />
                    <input type="text" placeholder="Enter categories" name="categories" value="{{ old('categories') }}" />
                    <input type="text" placeholder="Enter price" name="price" value="{{ old('price') }}" />
                    <input type="submit" value="Send" />
                </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

