@extends('layouts.app')

@section('head')
<title>{{ __('audios.finder_title') }} - PlayZ</title>
<link href="{{ asset('css/finder.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container">
    @include('util.message')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card-body">

                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
                @endif

                <div class="form-group">
                    <input id="audio_title" name="audio_title" type="text" class="form-control" placeholder="{{ __('audios.enter_audio_title') }}">
                </div>

            </div>
        </div>
    </div>
    <div id="results"></div>
    <br />
    <div>
        <h2>{{ __('audios.latest_audios') }}</h2>
        @foreach($audios->sortBy('id')->chunk(3) as $chunk)
        <div class="row p-5">
            @foreach($chunk as $audio)
            <div class="col d-flex d-table align-items-stretch align-middle">
                <div class="card d-table-cell " style="width: 18rem;">
                    <img class="card-img-top" src="{{ Storage::url($audio->getCoverImage()) }}" alt="Card image cap">
                    <div class="card-body">
                        <h4>{{ $audio->getTitle() }}</h4>
                        </small></p>

                        <p class="card-text m-0"><small class="text-muted">{{ __('audios.author') }}: {{ $audio->author()->first()->getName() }}</small></p>
                        <p class="card-text m-0"><small class="text-muted">{{ __('audios.price') }}: {{ $audio->getPrice() }} USD</small></p>
                        <p class="card-text m-0"><small class="text-muted">{{ __('audios.type') }}: {{ $audio->getType() }}</small></p>
                        <div class="card-body">
                            <a href="javascript:void(0)" onclick="return play('{{ Storage::url($audio->cover_image) }}', '{{ Storage::url($audio->audio_file) }}', '{{ $audio->author()->first()->getName() }}', '{{ $audio->getTitle() }}');" class="btn btn-secondary float-left mr-1">Play</a>
                            <form action="{{ route('audio.addToCart', $audio->getId()) }}" method="POST">
                                @csrf
                                <div class="form-row">
                                    <button type="submit" class="btn btn-primary float-left mr-1">{{ __('audios.add_to_cart') }}</button>
                                </div>
                            </form>

                            <a href="{{route('show.audio', $audio->getId())}}" class="btn btn-warning mt-1 mb-1 float-left">{{ __('audios.more_details') }}</a>
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
    var inline, run;

    function play(img, audio, author, title) {

        if (run == undefined) {

            run = $('body').stickyAudioPlayer({
                url: audio,
                position: 'bottom', //'bottom'|'top'|'inline'
                text: author + " - " + title,
                image: img,
                volume: 40,
                repeat: false,
            });

            run.play();
            return;

        }

        run.changeAudio(audio, author + " - " + title, img);
        run.play();
        run.show();

    }

    $(function() {
        $("#audio_title").autocomplete({
            minLength: 1,
            delay: 500,
            select: function(event, ui) {

                var bg = "{{ asset('img/finder/sfx-bg.jpg') }}";
                var id = ui.item.id;
                var img = ui.item.cover_image;
                var audio = ui.item.audio_file;
                var author = ui.item.author_name;
                var title = ui.item.title;
                var description = ui.item.description;
                var type = ui.item.type;

                if (type === "Song") {
                    bg = "{{ asset('img/finder/song-bg.jpg') }}";
                } else if (type == "MIDI") {
                    bg = "{{ asset('img/finder/midi-bg.jpg') }}";
                }

                $('#results').append("<h4>{{ __('audios.results') }}</h4><div class=\"card\"><div class=\"card-header heading-footer container_foto\" style=\"background-image: url(" + bg + ");\"></div><div class=\"card-block text-center p-3 mt-12\"><img class=\"panel-profile-img rounded-square\" src=\"" + img + "\"><div class=\"text-left\"><p class=\"author-title text-left\"><i class=\"fas fa-file-audio\"></i><strong> " + title + "</strong></p><p>" + description + "</p><a href=\"javascript:void(0)\" href=\"/audio/show/" + id + "\" id=\"play\" class=\"btn btn-primary\">{{ __('audios.play') }}</a><a href=\"/audio/show/" + id + "\" id=\"more_details\" class=\"btn btn-warning ml-1\">{{ __('audios.more_details') }}</a></div></div></div>");

                $('#play').click(function() {

                    play(img, audio, author, title);
                    /*if (run == undefined) {

                        run = $('body').stickyAudioPlayer({
                            url: audio,
                            position: 'bottom', //'bottom'|'top'|'inline'
                            text: author + " - " + title,
                            image: img,
                            volume: 40,
                            repeat: false,
                        });

                        run.play();
                        return;

                    }

                    run.changeAudio(audio, author + " - " + title, img);
                    run.play();
                    run.show();*/

                });

            },
            source: function(request, response) {
                function(data) {
                    $.getJSON(
                        '{{ route('api.audios') }}?title=' + request.term,

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

                        $('#results').empty(); response($.ui.autocomplete.filter(array, request.term));

                    });
            }
        });
    });
</script>
@endsection