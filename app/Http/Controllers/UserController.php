<?php

namespace App\Http\Controllers;

use App\Audio;
use App\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Foundation\Console\StorageLinkCommand;

class UserController extends Controller
{

    public function show($id)
    {
        $user = User::findOrFail($id);
        $audios = Audio::where('author_id', $id)->get();

        return view('users.show', [
            'user' => $user,
            'audios' => $audios,
        ]);
    }

    public function delete($id)
    {

        if(!Auth::check())
            return back()->with('error','Login before delete!');

        if(!Auth::user()->isAdmin())
            return back()->with('error','Inssuficient permissions!');

        $user = User::findOrFail($id);

        if($user == null)
            return redirect()->route('home');

        if($user->getId() == Auth::user()->getId())
            return back()->with('error','You cannot delete yourself!');

        $user->delete();

        $audios = Audio::all();
        $date = \Carbon\Carbon::now();

        $audios = $audios->sortBy('created_at')->reverse()->slice(0, 2);
        return view('welcome')->with('audios', $audios);

    }

}
