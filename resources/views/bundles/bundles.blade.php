@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-10">
                            <h3 class="w-75 p-3">{{ __('bundles.bundles') }}</h3>
                        </div>
                        <div class="col-md-2 float-right">
                            <a class="btn btn-success" href="{{ route('bundle.add') }}"><i class="fas fa-plus"></i> Add</a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Hire be here!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
