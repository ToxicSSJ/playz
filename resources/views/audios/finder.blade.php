@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card-header">{{ __('audios.find_audio') }}</div>
            <div class="card-body">

                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <div class="form-group">
                    <input id="audio_title" name="audio_title" type="text" class="form-control">
                </div>

            </div>
        </div>
    </div>
    <div id="results">
    </div>
    <div class="col-md-12">
        <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="..." alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
        <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="..." alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>

    </div>
</div>
@endsection
@section('scripts')
<script>
$(function () {
    /*$('#audio_title').autocomplete({
        source: function(request, response){
        
            $.getJSON('{{ route('api.audios') }}?title=' + request.term, function(data){
                var array = $.map(data, function(row){
                    return {
                        id:row.id,
                        author_id:row.author_id,
                        title:row.title,
                        description:row.description,
                        type:row.type,
                        audio_file:row.audio_file,
                        cover_image:row.cover_image,
                        contributors:row.contributors,
                        categories:row.categories,
                        price:row.price
                    }
                })

                $('#results').empty();

                response($.ui.autocomplete.filter(array, request.term));

            })
        },
        minLength:1,
        delay:500//,
        //select:function(event,ui){
            // $('#name').val(ui.item.name)
            // $('#buy_rate').val(ui.item.buy_rate)
            // $('#sale_price').val(ui.item.sale_price)
        //}
    });*/
    $("#audio_title").autocomplete({
        minLength: 1,
        source: function( request, response ) {
            $.getJSON('{{ route('api.audios') }}?title=' + request.term, function(data) {

                var array = $.map(data, function(row){
                    return {
                        id:row.id,
                        author_id:row.author_id,
                        title:row.title,
                        description:row.description,
                        type:row.type,
                        audio_file:row.audio_file,
                        cover_image:row.cover_image,
                        contributors:row.contributors,
                        categories:row.categories,
                        price:row.price
                    }
                })

                // $('#results').empty();

                //response($.ui.autocomplete.filter(array, request.term));

                console.log(array); // Shows correct results
                response(array);

            });     
        }
    });
})
</script>
@endsection