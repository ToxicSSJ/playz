<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Audio;

class ProfileController extends Controller
{

    public function profile()
    {
        return view('profile');
    }

}
