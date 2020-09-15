<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Audio;
use Auth;

class BundlesController extends Controller
{

    public function bundles()
    {
        return view('bundles.bundles');
    }

}
