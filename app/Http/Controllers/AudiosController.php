<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Audio;
use App\User;
use Auth;

class AudiosController extends Controller
{

    public function finder()
    {
        return view('audios.finder');
    }

    public function upload()
    {
        return view('audios.upload');
    }

    public function getAutocompleteData(Request $request){
        error_log('test');
        if($request->has('title')){
            error_log('LEL');
            $data = Audio::where('title', 'like','%'.$request->input('title').'%')->get();

            foreach($data as $audio) {
                $audio->cover_image = Storage::url($audio->getCoverImage());
                $audio->audio_file = Storage::url($audio->getAudioFile());
                $audio->author_name = User::findOrFail($audio->getAuthorId())->name;
                error_log($audio->cover_image);
            }

            return $data;

        }
    }

    public function save(Request $request)
    {

        error_log('tick ' . Auth::check());

        if(!Auth::check())
            return back()->with('error','Login before upload!');

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

        $newAudio = Audio::create([

            'title' => $request->get('title'),
            'description' => $request->get('description'),
            'type' => $request->get('type'),
            'contributors' => $request->get('contributors'),
            'categories' => $request->get('categories'),
            'price' => $request->get('price'),

            'author_id' => Auth::user()->getId(),
            'audio_file' => $audioPath,
            'cover_image' => $coverPath

        ]);
        
        return back()->with('success','Audio created successfully!');

    }

    public function saveFile(Request $request, $name, $spath) 
    {

        $filenameWithExt = $request->file($name)->getClientOriginalName();
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        $extension = $request->file($name)->getClientOriginalExtension();
        $fileNameToStore = $filename.'_'.time().'.'.$extension;

        $path = $request->file($name)->storeAs($spath, $fileNameToStore);
        return $path;

    }

}
