@extends('layouts.master')

@section("title", $data["title"])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Saved: {{ $data["product"]["name"] }}</div>
                <div class="card-body">
                    <b>Show: </b><a href="{{ route('product.show', $data['product']['id']) }}">{{ route('product.show', $data['product']['id']) }}</a><br />
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
