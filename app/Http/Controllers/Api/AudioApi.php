<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Audio;
use Illuminate\Support\Facades\Storage;

class AudioApi extends Controller
{
    public function index()
    {
        return Audio::all();
    }

    public function show($id)
    {
        return Audio::findOrFail($id);
    }

    public function latest()
    {
        $audios = Audio::all();
        $latestAudios = [];
        // ! This code below isn't working properly
        // TODO: Debug this code and search the problem.
        // for ($i = sizeof($audios) - 1; $i < sizeof($audios) - 3; $i--) {
        //     array_push($latestAudios, $audios[$i]);
        // }

        foreach ($audios as $audio) {
            $audio->setCoverImage(Storage::url($audio->getCoverImage()));
            $audio->setAudioFile(Storage::url($audio->getAudioFile()));
            $audio->setAuthorName(Storage::url($audio->author()->first()->getName()));
            error_log($audio->getCoverImage());
        }

        if (sizeof($audios) > 3) {
            array_push(
                $latestAudios,
                $audios[sizeof($audios) - 1],
                $audios[sizeof($audios) - 2],
                $audios[sizeof($audios) - 3]
            );
        } else {
            return $audios;
        }

        return $latestAudios;
    }
}
