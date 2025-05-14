<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\System;

class PagesController extends Controller
{
    public function home() {
        $route = 'home';
        $systems = \App\Models\System::all();
        return view('pages.home', compact('route', 'systems'));
    }

    public function about() {
        $route = 'about';
        return view('pages.about', compact('route'));
    }

    public function bulletim() {
        $route = 'bulletim';
        return view('pages.bulletim', compact('route'));
    }

    public function mission() {
        $route = 'mission';
        return view('pages.mission', compact('route'));
    }

    public function ministry() {
        $route = 'ministry';
        return view('pages.ministry', compact('route'));
    }

    public function contact() {
        $route = 'contact';
        return view('pages.contact', compact('route'));
    }
}

