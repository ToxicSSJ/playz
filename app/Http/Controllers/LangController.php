<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Audio;
use App\User;
use Session;
use Auth;
use App;

class LangController extends Controller
{

    public function lang($newlang)
    {

        if (!Auth::check())
            return back()->with('error', 'Login before change lang!');

        
        error_log(App::getLocale() . " " . $newlang);

        switch ($newlang)
        {
            case "es":
                Auth::user()->setLocale('es');
                Auth::user()->save();
                Session::put('locale','es');
                App::setLocale('es');
                break;
            default:
                Auth::user()->setLocale('en');
                Auth::user()->save();
                Session::put('locale','en');
                App::setLocale('es');
                break;
        }

        return back()->with('success', 'Language changed!');

    }

}
