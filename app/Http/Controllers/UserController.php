<?php

namespace App\Http\Controllers;

use App\Audio;
use App\User;
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
}
