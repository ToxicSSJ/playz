@extends('layouts.app')

@section('head')
<title>{{ __('audios.finder_title') }} - PlayZ</title>
@endsection

@section('content')
<div class="row" style="margin-top:20px; margin-bottom:20px">
    <div class="col-lg-8 mx-auto">
        <div class="row p-5">
            <div class="col-md-12">
                <ul id="errors">
                    @foreach($data["audios"] as $audio)
                    <li>Nombre: {{ $audio->getTitle() }} - Precio: {{ $audio->getPrice() }}
                        - Cantidad: {{ Session::get('audios')[$audio->getId()] }}</li>
                    @endforeach
                    <br /><br />
                    Total: precio_total
                    <form action="{{ route('audios.buy') }}" method="POST">
                        @csrf
                        <button class="btn btn-primary" type="submit">Buy</button>
                    </form>
                </ul>
            </div>
        </div>

    </div>
</div>

@endsection