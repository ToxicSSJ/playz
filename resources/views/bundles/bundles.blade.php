@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card-body">

                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
                @endif

                <div class="form-group row">
                    <input id="audio_title" name="audio_title" type="text" class="form-control col-md-9" placeholder="Enter bundle title">
                    <a class="btn btn-success ml-3 col-md-2 " href="{{ route('bundle.add') }}"><i class="fas fa-plus"></i> Add Bundle</a>
                </div>

            </div>
        </div>
    </div>
    <div id="results"></div>
    <br />
    <div>
        <h2>Latest Bundles</h2>
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
                                <a href="#" class="btn btn-primary">Add to cart</a>
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
@section('scripts')
<script>

    $(function() {
        $("#audio_title").autocomplete({
            minLength: 1,
            delay: 500,
            select: function(event, ui) {

                var bg = "{{ asset('img/finder/sfx-bg.jpg') }}";
                var id = ui.item.id;
                var img = ui.item.cover_image;
                var author = ui.item.author_name;
                var title = ui.item.title;
                var description = ui.item.description;

                $('#results').append("<h4>Resultado</h4><div class=\"card\"><div class=\"card-header heading-footer container_foto\" style=\"background-image: url(" + bg + ");\"></div><div class=\"card-block text-center p-3 mt-12\"><img class=\"panel-profile-img rounded-square\" src=\"" + img + "\"><div class=\"text-left\"><p class=\"author-title text-left\"><i class=\"fas fa-file-audio\"></i><strong> " + title + "</strong></p><p>" + description + "</p><a href=\"/bundle/show/" + id + "\" id=\"play\" class=\"btn btn-primary\">{{ __('audios.see_more') }}</a></div></div></div>");

            },
            source: function(request, response) {
                $.getJSON('{{ route('api.bundles') }}?title=' + request.term,
                    function(data) {

                        var array = $.map(data, function(row) {
                            return {
                                id: row.id,
                                label: row.title,
                                author_id: row.author_id,
                                author_name: row.author_name,
                                title: row.title,
                                description: row.description,
                                type: row.type,
                                audio_file: row.audio_file,
                                cover_image: row.cover_image,
                                cache_image_link: row.image_link,
                                cache_audio_link: row.audio_link,
                                contributors: row.contributors,
                                categories: row.categories,
                                price: row.price
                            }
                        })

                        // if (run !== undefined) {
                        // 
                        //    run.pause();
                        //    run.hide();
                        //
                        // }

                        $('#results').empty();
                        response($.ui.autocomplete.filter(array, request.term));

                    });
            }
        });
    });

</script>
@endsection