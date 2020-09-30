<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Audio;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $audios = Audio::all();
        $date = \Carbon\Carbon::now();

        $audios = $audios->sortBy('created_at')->reverse()->slice(0, 2);
        return view('welcome')->with('audios', $audios);
        
    }
}
