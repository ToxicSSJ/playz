var inline, run;
$(function () {
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

            if(type === "Song") {
                bg = "{{ asset('img/finder/song-bg.jpg') }}";
            } else if(type == "MIDI") {
                bg = "{{ asset('img/finder/midi-bg.jpg') }}";
            }

            $('#results').append("<p>Resultado:</p><div class=\"card\"><div class=\"card-header heading-footer container_foto\" style=\"background-image: url(" + bg + ");\"></div><div class=\"card-block text-center p-3 mt-12\"><img class=\"panel-profile-img rounded-square\" src=\"" + img + "\"><div class=\"text-left\"><p class=\"author-title text-left\"><i class=\"fas fa-file-audio\"></i><strong> " + title + "</strong></p><p>" + description + "</p><a href=\"#\" id=\"play\" class=\"btn btn-primary\">{{ __('audios.play') }}</a></div></div></div>");  

            $('#play').click(function() {

                if(run == undefined) {

                    run = $('body').stickyAudioPlayer({
                        url:       audio,
                        position:  'bottom', //'bottom'|'top'|'inline'
                        text:      author + " - " + title,
                        image:     img,
                        volume:    40,
                        repeat:    false,
                    });

                    run.play();
                    return;

                }

                run.changeAudio(audio, author + " - " + title, img);
                run.play();
                run.show();

            });

        },
        source: function( request, response ) {
            $.getJSON('{{ route('api.audios') }}?title=' + request.term, function(data) {

                var array = $.map(data, function(row){
                    return {
                        id:row.id,
                        label:row.title,
                        author_id:row.author_id,
                        author_name:row.author_name,
                        title:row.title,
                        description:row.description,
                        type:row.type,
                        audio_file:row.audio_file,
                        cover_image:row.cover_image,
                        cache_image_link:row.image_link,
                        cache_audio_link:row.audio_link,
                        contributors:row.contributors,
                        categories:row.categories,
                        price:row.price
                    }
                })

                if(run !== undefined) {

                    run.pause();
                    run.hide();

                }

                $('#results').empty();
                response($.ui.autocomplete.filter(array, request.term));

            });     
        }
    });
})