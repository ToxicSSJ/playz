<!doctype html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
</head>

<body>
    <center>
        <div class="navbar__container">
            <a href="{{ url('/') }}" id="navbar__logo">
                <i class="fas fa-compact-disc fa-lg"></i>PlayZ - {{ __('audios.invoice') }} (#{{ $order->id }})
            </a>
        </div>
    </center>
    <br>
    <table class="table">
        <tr>
            <th>Item</th>
            <th>Price</th>
        </tr>
        @foreach($order->items()->get() as $item)
        <tr>
            <td>{{$item->audio()->get()->first()->getTitle()}}</td>
            <td>{{$item->price}}</td>
        </tr>
        @endforeach
    </table>
    <strong>{{ __('audios.total') }}: </strong>${{ $order->total }} - <strong>{{ __('audios.date') }}: </strong>{{ $order->created_at }}

</body>

</html>