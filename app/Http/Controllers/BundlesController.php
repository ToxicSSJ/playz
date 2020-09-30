<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\AudioBundle;
use App\AudioInfo;
use App\Audio;
use Auth;

class BundlesController extends Controller
{

    public function show($id)
    {

        $data = [];
        $bundle = AudioBundle::findOrFail($id);

        if($bundle == null) {
            return redirect()->route('home.bundles');
        }

        $audios = collect([]);

        foreach($bundle->infos()->get() as $info) {
            
            error_log($info->audio()->get()->first()->getId());
            $audios->push($info->audio()->get()->first());

        }

        return view('bundles.show', ['title' => trans('messages.audios_show_title')])->with("bundle", $bundle)->with("audios", $audios);

    }

    public function bundles()
    {

        return view('bundles.bundles')->with('bundles', AudioBundle::all());

    }
    
    public function bundleAdd()
    {
        if(!Auth::check()) {
            return back()->with('error','Cannot access to user bundles.');
        }

        $userAudios = Auth::user()->audios()->get();
        return view('bundles.add')->with('audios', $userAudios);
    }

    public function save(Request $request)
    {

        error_log('tick ' . Auth::check());

        if(!Auth::check())
            return back()->with('error','Login before upload!');

        $request->validate([
            "title" => "required",
            "description" => "required",
            "audios" => "required",
            "price" => "required|numeric|gt:0",
            "image" => "required|max:2048"
        ]);
        
        $cover = $request->file('image');
        $coverPath = $this->saveFile($request, 'image', 'public/covers');

        $newBundle = new AudioBundle([

            'title' => $request->get('title'),
            'description' => $request->get('description'),
            'price' => $request->get('price'),

            'cover_image' => $coverPath

        ]);

        $newBundle->author()->associate(Auth::user());
        $newBundle->save();

        foreach($request->get('audios') as $audio) {

            AudioInfo::create([

                'audio_id' => $audio,
                'bundle_id' => $newBundle->getId()
    
            ]);
            

        }
        
        return back()->with('success','Bundle created successfully!');

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
