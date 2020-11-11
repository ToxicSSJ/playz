@extends('layouts.app')

@section('head')
<title>{{ __('audios.finder_title') }} - PlayZ</title>
<!-- Custom CSS-->
<link rel="stylesheet" href="/css/cart.css">
@endsection

@section('content')
<br>
<br>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="box-element">

                <a class="btn btn-outline-dark" href="/find">&#x2190; Continue Shopping</a>

                <br>
                <br>
                <table class="table">
                    <tr>
                        <th>
                            <h5>Items:
                                <strong>{{ count(session()->get("audios")) }}</strong>
                            </h5>
                        </th>
                        <th>
                            <h5>Total:
                                $
                                <strong>
                                    {{ $data["totalPrice"] }}
                                </strong> USD
                            </h5>
                        </th>
                        <th>
                            <form action="{{ route('audios.buy') }}" method="POST">
                                @csrf
                                <button style="float:right; margin:5px;" class="btn btn-success btn-checkout" type="submit">Check out</button>
                            </form>

                            <a style="float:right; margin:5px;" class="btn btn-danger" href="{{ route('audios.removeCart') }}">Cancel</a>
                        </th>
                    </tr>
                </table>

            </div>

            <br>
            <div class="box-element">
                <div class="cart-row">
                    <div style="flex:1"></div>
                    <div style="flex:3"><strong>Item</strong></div>
                    <div style="flex:1"><strong>Price</strong></div>
                    <!-- // ! Remove Item By item functionality isn't working properly -->
                    <!-- <div style="flex:1"><strong>Remove</strong></div> -->
                </div>
                @foreach($data["audios"] as $audio)
                <div class="cart-row">
                    <div style="flex:1">
                        <img class="row-image" src="{{ Storage::url($audio->getCoverImage()) }}">
                    </div>
                    <div style="flex:3">
                        <p>{{ $audio->getTitle() }}</p>
                    </div>
                    <div style="flex:1">
                        <p>{{ $audio->getPrice() }}</p>
                    </div>
                    <!-- // ! Remove Item By item functionality isn't working properly -->
                    <!-- <div style="flex:1">
                        <form action=" route('audio.removeItem', $audio->getId())" method="POST">
                            @csrf
                            <div class="form-row">
                                <button type="submit" class="btn btn-danger">
                                    <strong>X</strong>
                                </button>
                                 $audio->getId()
                            </div>
                        </form>
                    </div> -->
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<br>
<br>
@endsection