<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Audio;
use App\AudioBundle;
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
        return view('profile', [
            'audios' => $audios,
            'bundles' => $bundles,
        ]);
    }

    public function purchase($package)
    {

        if (!Auth::check())
            return back()->with('error', 'Login before charge!');

        switch ($package)
        {
            case "small":
                Auth::user()->setWallet(Auth::user()->getWallet() + 12);
                Auth::user()->save();
                return back()->with('success', 'Charge completed!');
            case "medium":
                Auth::user()->setWallet(Auth::user()->getWallet() + 40);
                Auth::user()->save();
                return back()->with('success', 'Charge completed!');
            case "dj":
                Auth::user()->setWallet(Auth::user()->getWallet() + 130);
                Auth::user()->save();
                return back()->with('success', 'Charge completed!');
            default:
                return back()->with('error', 'Bad package!');
        }

    }

    public function charge()
    {
        return view('charge');
    }

}
