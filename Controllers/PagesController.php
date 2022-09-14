<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        $title = "Welcome to Laravel!";
        return view('index', compact('title'));
        //return view('index)'->with('title', $title);
    }

    public function about(){
        $data = array(
            'title' => 'About',
        );
        return view('about')->with($data);
    }

    public function rooms(){
        $data = array(
            'title' => 'Rooms',
        );
        return view('rooms')->with($data);
    }
}
