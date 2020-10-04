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

                <a class="btn btn-outline-dark" href="/home">&#x2190; Continue Shopping</a>

                <br>
                <br>
                <table class="table">
                    <tr>
                        <th>
                            <h5>Items:
                                <strong>cart Items</strong>
                            </h5>
                        </th>
                        <th>
                            <h5>Total:
                                <strong> total</strong> COP
                            </h5>
                        </th>
                        <th>
                            <a style="float:right; margin:5px;" class="btn btn-success btn-checkout" href="/home">Checkout</a>
                            <a style="float:right; margin:5px;" class="btn btn-success btn-danger" href="{{ route('audios.removeCart') }}">Cancel</a>
                        </th>
                    </tr>
                </table>

            </div>

            <br>
            <div class="box-element">
                <div class="cart-row">
                    <div style="flex:2"></div>
                    <div style="flex:2"><strong>Item</strong></div>
                    <div style="flex:1"><strong>Price</strong></div>

                </div>
                <!-- {% for item in items %} -->
                <div class="cart-row">
                    <div style="flex:2"><img class="row-image" src=""></div>
                    <div style="flex:2">
                        <p>productname</p>
                    </div>
                    <div style="flex:1">
                        <p>Product price</p>
                    </div>

                </div>
                <!-- {% endfor %} -->
            </div>
        </div>
    </div>
</div>
<br>
<br>
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