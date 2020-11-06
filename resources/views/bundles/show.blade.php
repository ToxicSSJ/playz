@extends('layouts.app')

@section('head')
<title>{{ $bundle->getTitle() }} - PlayZ</title>
@endsection

@section('content')
<link href="{{ asset('css/show.css') }}" rel="stylesheet">

<div class="container">
    <div class="jumbotron">
    <div class="container text-center text-lg-left">
        <div class="row">
            <div class="col-lg-8">
                <h1 class="display-4"><span class="badge badge-warning align-center">{{ __('audios.bundle') }}</span> {{ $bundle->getTitle() }}</h1>
                <div>
                    <p class="text-muted mr-7 pr-7 d-inline-block">{{ __('audios.author') }}: <a href="{{ route('users.show', $bundle->author()->first()->getId()) }}">{{ $bundle->author()->first()->getName() }}</a></p>,
                    <p class="text-muted d-inline-block">{{ __('audios.price') }}: {{ $bundle->getPrice() }} USD</p>
                </div>
                <p class="lead">{{ $bundle->getDescription() }}</p>
                <div class="row justify-content-left ml-1">
                    <span class="floatybox mr-3 d-inline-block">
                        <a class="btn btn-primary btn-lg w-100" href="#" role="button">{{ __('audios.buy') }}</a>
                        <p class="text-muted">{{ __('audios.no_credit_card_required') }}</p>
                    </span>
                </div>
            </div>
            <div class="col-lg-4 align-items-bottom d-flex">
                <div class="col-12">
                    <img src="{{ Storage::url($bundle->getCoverImage()) }}" alt="" class="img-fluid">
                    <p class="card-text m-0"><small class="text-muted">{{ __('audios.released') }}: {{ strtoupper(\Carbon\Carbon::parse($bundle->created_at)->format('d M, Y')) }}</small></p>
                    @if(Auth::user()->getId() == $bundle->author()->get()->first()->getId())
                    <p class="card-text m-0"><small class="text-muted">{{ __('audios.author_panel') }}: 
                        <a href="{{ route("bundle.delete", $bundle->getId()) }}"><i class="fas fa-trash" title="{{ __('bundles.delete') }}"></i></a>
                        <a href="#" onclick="return copyURL('{{ route("bundle.show", $bundle->getId()) }}');"><i class="fas fa-clipboard" title="{{ __('audios.copy_link') }}"></i></a>
                    </small></p>
                    @endif
                    @if(Auth::user()->isAdmin())
                    <p class="card-text m-0"><small class="text-muted">{{ __('audios.admin_panel') }}: 
                        <a href="{{ route("bundle.delete", $bundle->getId()) }}"><i class="fas fa-trash" title="{{ __('audios.delete') }}"></i></a>
                        <a href="#" onclick="return copyURL('{{ route("bundle.show", $bundle->getId()) }}');"><i class="fas fa-clipboard" title="{{ __('audios.copy_link') }}"></i></a>
                    </small></p>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card-body">

            </div>
        </div>
    </div>
    <div id="results"></div>
    <br />
    <div>
        <h2>This package includes</h2>
        @foreach($audios->sortBy('id')->chunk(3) as $chunk)
        <div class="row p-5">
            @foreach($chunk as $audio)
                <div class="col d-flex align-top align-items-stretch">
                    <div class="card" style="width: 18rem;">
                        <img class="card-img-top" src="{{ Storage::url($audio->getCoverImage()) }}" alt="Card image cap">
                        <div class="card-body">
                            <h4>{{ $audio->getTitle() }}</h4>
                            </small></p>
                            <!-- <p>{{ $audio->getDescription() }}</p> -->
                            <p class="card-text m-0"><small class="text-muted">{{ __('audios.author') }}: {{ $audio->author()->first()->getName() }}</small></p>
                            <p class="card-text m-0"><small class="text-muted">{{ __('audios.price') }}: {{ $audio->getPrice() }} USD</small></p>
                            <p class="card-text m-0"><small class="text-muted">{{ __('audios.type') }}: {{ $audio->getType() }}</small></p>
                            <div class="card-body">
                                <a href="javascript:void(0)" onclick="return play('{{ Storage::url($audio->cover_image) }}', '{{ Storage::url($audio->getAudioFile()) }}', '{{ $audio->author()->first()->getName() }}', '{{ $audio->getTitle() }}');" class="btn btn-secondary">{{ __('audios.play') }}</a>
                                <a href="#" class="btn mt-1 btn-primary">{{ __('audios.add_to_cart') }}</a>
                                <a href="{{route('show.audio', $audio->getId())}}" class="btn mt-1 btn-warning">{{ __('audios.more_details') }}</a>
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

                $('#results').append("<h4>Resultado</h4><div class=\"card\"><div class=\"card-header heading-footer container_foto\" style=\"background-image: url(" + bg + ");\"></div><div class=\"card-block text-center p-3 mt-12\"><img class=\"panel-profile-img rounded-square\" src=\"" + img + "\"><div class=\"text-left\"><p class=\"author-title text-left\"><i class=\"fas fa-file-audio\"></i><strong> " + title + "</strong></p><p>" + description + "</p><a href=\"javascript:void(0)\" id=\"play\" class=\"btn btn-primary\">{{ __('audios.play') }}</a></div></div></div>");

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
                $.getJSON('{{ route('api.audios') }}?title=' + request.term,
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