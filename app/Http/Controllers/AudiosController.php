<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Audio;

class AudiosController extends Controller
{

    public function finder()
    {

        $data = [];
        $audio = Audio::findOrFail($id);

        if($audio == null) {
            return redirect()->route('home.audios');
        }

        return view('audio.show', ['title' => trans('messages.audios_show_title')])->with("audio", $audio);

    }

    public function upload()
    {
        return view('audios.upload');
    }

    public function uploadAudio(Request $request)
    {

        $request->validate([
            "title" => "required",
            "description" => "required",
            "type" => "required",
            "filename" => "required",
            "photoId" => "required",
            "contributors" => "",
            "categories" => "required",
            "price" => "required|numeric|gt:0"
        ]);

        Audio::create($request->only(['title', 'description', 'type', 'filename', 'photoId', 'contributors', 'categories', 'price']));
        return back()->with('success','Audio created successfully!');

    }

    public function saveFile(Request $request, $name, $spath) {

        $filenameWithExt = $request->file($name)->getClientOriginalName();
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        $extension = $request->file($name)->getClientOriginalExtension();
        $fileNameToStore = $filename.'_'.time().'.'.$extension;

        $path = $request->file($name)->storeAs($spath, $fileNameToStore);
        return $path;

    }

    public function save(Request $request)
    {

        error_log('tick');

        $request->validate([
            "title" => "required",
            "description" => "required",
            "type" => "required|in:Audio,Song,MIDI",
            "contributors" => "",
            "categories" => "required",
            "price" => "required|numeric|gt:0",
            "image" => "required|max:2048",
            "audio" => "required|max:20480",
        ]);

        $cover = $request->file('image');
        $audio = $request->file('audio');

        $coverPath = $this->saveFile($request, 'image', 'public/covers');
        $audioPath = $this->saveFile($request, 'audio', 'public/audios');

        $newAudio = Audio::create($request->only(['title', 'description', 'type', 'contributors', 'categories', 'price']));
        $newAudio->cover_image = $coverPath;
        $newAudio->audio_file = $audioPath;

        $newAudio->save();
        
        return back()->with('success','Audio created successfully!');

    }

}
