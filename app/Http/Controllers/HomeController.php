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

        $meetings = json_decode(file_get_contents('http://ec2-184-72-114-127.compute-1.amazonaws.com/public/api/v2/meetings'), true);
        error_log($meetings['data'][0]['place']);

        $audios = $audios->sortBy('created_at')->reverse()->slice(0, 2);
        return view('welcome')->with('audios', $audios)->with('meetings', collect($meetings['data']));
        
    }
}
