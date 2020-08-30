<?php

namespace App\Http\Controllers;

class HomeController extends Controller {

  public function index() {
    return view('home.index');
  }

  public function contact() {
    return view('home.contact');
  }

  public function audios() {
    return view('home.audios');
  }

}