<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Audio;
use App\Order;
use App\Item;
use App\User;
use Auth;

class AudiosController extends Controller
{

    public function finder()
    {
        return view('audios.finder')->with('audios', Audio::all());
    }

    public function delete($id)
    {

        if (!Auth::check())
            return back()->with('error', 'Login before delete!');

        $data = [];
        $audio = Audio::findOrFail($id);

        if ($audio == null)
            return redirect()->route('home.audios');

        if ($audio->author()->get()->first()->getId() != Auth::user()->getId())
            return back()->with('error', 'You cannot delete this audio!');
        if (!Auth::user()->isAdmin())
            if ($audio->author()->get()->first()->getId() != Auth::user()->getId())
                return back()->with('error', 'You cannot delete this audio!');

        $audio->delete();

        return view('audios.finder')->with('error', 'Audio deleted!')->with('audios', Audio::all());
    }

    public function show($id)
    {

        $data = [];
        $audio = Audio::findOrFail($id);

        if ($audio == null) {
            return redirect()->route('home.audios');
        }

        $audios = $audio->author()->get()->first()->audios()->get();
        $newaudios = $audios->filter(function ($audio2) use ($audio) {
            return $audio2->getId() != $audio->getId();
        })->values();

        return view('audios.show', ['title' => trans('messages.audios_show_title')])->with("audio", $audio)->with("audios", $newaudios);
    }

    public function upload()
    {
        return view('audios.upload');
    }

    public function getAutocompleteData(Request $request)
    {

        if ($request->has('title')) {

            $data = Audio::where('title', 'like', '%' . $request->input('title') . '%')->get();

            foreach ($data as $audio) {
                $audio->setCoverImage(Storage::url($audio->getCoverImage()));
                $audio->setAudioFile(Storage::url($audio->getAudioFile()));
                $audio->setAuthorName($audio->author()->first()->getName());
                error_log($audio->getCoverImage());
            }

            return $data;
        }
    }

    public function save(Request $request)
    {

        if (!Auth::check())
            return back()->with('error', 'Login before upload!');

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

        $newAudio = new Audio([

            'title' => $request->get('title'),
            'description' => $request->get('description'),
            'type' => $request->get('type'),
            'contributors' => $request->get('contributors'),
            'categories' => $request->get('categories'),
            'price' => $request->get('price'),

            'audio_file' => $audioPath,
            'cover_image' => $coverPath

        ]);

        // error_log(Auth::user()->getId());

        // Auth::user()->audios()->save($newAudio);
        $newAudio->author()->associate(Auth::user()->getId());
        $newAudio->save();

        return back()->with('success', 'Audio created successfully!');
    }

    public function saveFile(Request $request, $name, $spath)
    {

        $filenameWithExt = $request->file($name)->getClientOriginalName();
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        $extension = $request->file($name)->getClientOriginalExtension();
        $fileNameToStore = $filename . '_' . time() . '.' . $extension;

        $path = $request->file($name)->storeAs($spath, $fileNameToStore);
        return $path;
    }

    public function getBundles()
    {

        $data = AudioBundle::all();
        return $data;
    }

    public function getInfos($bundle)
    {

        $data = AudioInfo::where('', 'equals', '')->get();

        foreach ($data as $audio) {

            $audio->cover_image = Storage::url($audio->getCoverImage());
            $audio->audio_file = Storage::url($audio->getAudioFile());
            $audio->author_name = User::findOrFail($audio->getAuthorId())->name;
        }

        return $data;
    }

    public function addToCart($id, Request $request)
    {
        $audios = $request->session()->get("audios");
        $audios[$id] = 1;
        $request->session()->put('audios', $audios);
        // dd($audios);
        return back();
    }

    public function removeCart(Request $request)
    {
        $request->session()->forget('audios');
        return redirect()->route('find');
    }

    public function cart(Request $request)
    {
        $audios = $request->session()->get("audios");
        if ($audios) {
            $keys = array_keys($audios);
            $audiosModels = Audio::find($keys);
            $data["audios"] = $audiosModels;
            return view('audios.cart')->with("data", $data);
        }

        return redirect()->route('find');
    }

    public function buy(Request $request)
    {
        $order = new Order();
        $order->setTotal("0");
        $order->save();

        $totalPrice = 0;

        $audios = $request->session()->get("audios");
        if ($audios) {
            $keys = array_keys($audios);
            for ($i = 0; $i < count($keys); $i++) {
                $item = new Item();
                $item->setAudioId($keys[$i]);
                $item->setOrderId($order->getId());
                $item->setQuantity($audios[$keys[$i]]);
                $item->save();
                $currentAudio = Audio::find($keys[$i]);
                $totalPrice = $totalPrice + $currentAudio->getPrice() * $audios[$keys[$i]];
            }

            $order->setTotal($totalPrice);
            $order->save();

            $request->session()->forget('audios');
        }

        return redirect()->route('find');
    }
}
