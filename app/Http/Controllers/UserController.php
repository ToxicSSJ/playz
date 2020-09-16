<?php

namespace App\Http\Controllers;

use App\Audio;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show($id)
    {

        $user = User::findOrFail($id);
        $audios = Audio::all();

        return view('users.show', [
            'user' => $user,
            'audios' => $audios,
        ]);
    }
}
