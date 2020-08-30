@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Audios View</div>

                <div class="card-body">
                    Vista de Audios
                    <div class="row">
                        <div class="col-md">
                            <h4>Crear:</h4>
                        </div>
                        <div class="col-md">
                            <p>{{ route('audios.create') }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md">
                            <h4>Lista:</h4>
                        </div>
                        <div class="col-md">
                            <p>{{ route('audios.list') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection