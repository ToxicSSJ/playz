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
    <br />
    <div>
        <h2>Últimos Bundles</h2>
        @foreach($bundles->sortBy('id')->chunk(3) as $chunk)
        <div class="row p-5">
            @foreach($chunk as $bundle)
                <div class="col d-flex d-table align-items-stretch align-middle">
                    <div class="card d-table-cell " style="width: 18rem;">
                        <img class="card-img-top" src="{{ Storage::url($bundle->getCoverImage()) }}" alt="Card image cap">
                        <div class="card-body">
                            <h4>{{ $bundle->getTitle() }}</h4>
                            </small></p>
                            <p class="card-text m-0"><small class="text-muted">Author: {{ $bundle->author()->first()->getName() }}</small></p>
                            <p class="card-text m-0"><small class="text-muted">Precio: {{ $bundle->getPrice() }} USD</small></p>
                            <div class="card-body">
                                <a href="{{route('bundle.show', $bundle->getId())}}" class="btn btn-success">See More</a>
                                <a href="#" class="btn btn-primary">Agregar</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        @endforeach
    </div>
</div>
@endsection
