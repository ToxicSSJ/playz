<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Audio;
use App\AudioBundle;
use App\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Console\StorageLinkCommand;

class ProfileController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function profile()
    {
        $audios = Audio::where('author_id', Auth::user()->id)->get();
        $bundles = AudioBundle::where('author_id', Auth::user()->id)->get();
        $orders = Order::where('author_id', Auth::user()->id)->get();

        return view('profile', [
            'audios' => $audios,
            'bundles' => $bundles,
            'orders' => $orders
        ]);
    }
}
