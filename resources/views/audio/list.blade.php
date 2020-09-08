@extends('layouts.master')

@section('content')
<div class="container">
    @foreach($audios->sortBy('id')->chunk(3) as $chunk)
    <div class="row p-5">
        @foreach($chunk as $audio)
            <div class="col-md-5 p-5" >
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="{{ asset('img/base.svg') }}" alt="Card image cap">
                    <div class="card-body">
                        <h4>{{ $audio->getTitle() }}</h4>
                        <p class="card-text m-0"><small class="text-muted">ID: 
                        @if($loop->index <= 1 && $loop->parent->first)
                            <strong>{{ $audio->getId() }}</strong>
                        @else
                            {{ $audio->getId() }}
                        @endif
                        </small></p>
                        <p class="card-text m-0"><small class="text-muted">Precio: {{ $audio->getPrice() }}</small></p>
                        <p class="card-text m-0"><small class="text-muted">Tipo: {{ $audio->getType() }}</small></p>
                        <div class="card-body">
                            <a href="{{ route('audio.show', $audio->getId()) }}" class="btn btn-primary">Show</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    @endforeach
</div>
@endsection

