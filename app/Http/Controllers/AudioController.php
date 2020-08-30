<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Audio;

class AudioController extends Controller
{

    /*public function show($id)
    {
        $data = []; //to be sent to the view
        $audio = Audio::findOrFail($id);

        if($audio == null) {
            return redirect()->route('home.index');
        }

        $data["title"] = $product->getName();
        $data["product"] = $product;
        $data["sizes"] = $listOfSizes;
        return view('audio.show')->with("data",$data);
    }*/


    public function create()
    {
        $data = []; //to be sent to the view
        $data["title"] = "Create product";
        $data["products"] = Audio::all();

        return view('audio.create')->with("data",$data);
    }

    public function save(Request $request)
    {

        $request->validate([
            "name" => "required",
            "price" => "required|numeric|gt:0"
        ]);

        Audio::create($request->only(["name","price"]));
        return back()->with('success','Item created successfully!');

    }

}
