<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Audio;

class AudioController extends Controller
{

    public function test() 
    {

        //$url = Storage::temporaryUrl(
        //    'descargar.jpg', now()->addMinutes(5)
        //);

        return Storage::disk('public')->download('descarga.jpg');

    }

    public function show($id)
    {

        $data = [];
        $audio = Audio::findOrFail($id);

        if($audio == null) {
            return redirect()->route('home.audios');
        }

        return view('audio.show', ['title' => trans('messages.audios_show_title')])->with("audio", $audio);

    }

    public function delete($id)
    {

        $data = [];
        $audio = Audio::findOrFail($id);

        if($audio == null) {
            return redirect()->route('home.audios');
        }

        Audio::destroy($id);

        return view('audio.list', ['title' => trans('messages.audios_delete_title')])->with("audios", Audio::all());

    }

    public function create()
    {

        $data = [];
        $data["title"] = "Create product";
        $data["products"] = Audio::all();

        return view('audio.create', ['title' => trans('messages.audios_create_title')])->with("data", $data);

    }

    public function list()
    {

        return view('audio.list', ['title' => trans('messages.audios_list_title')])->with("audios", Audio::all());

    }

    public function audios()
    {

        return view('home.audios', ['title' => trans('messages.audios_title')]);

    }

    public function save(Request $request)
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

}
