<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Audio;
use Auth;

class HireController extends Controller
{

    public function hire()
    {
        return view('hire.view');
    }

}
