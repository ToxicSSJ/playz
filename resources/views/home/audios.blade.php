@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Audios View</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md">
                            <h4>Create:</h4>
                        </div>
                        <div class="col-md">
                            <a href="{{ route('audio.create') }}"><p>Click</p></a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md">
                            <h4>List:</h4>
                        </div>
                        <div class="col-md">
                            <a href="{{ route('audio.list') }}"><p>Click</p></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection