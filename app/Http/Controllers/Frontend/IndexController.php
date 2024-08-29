<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Home;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function Index(){

        $hero = Home::find(1);
        $abouthome = Home::find(2);
        return view('frontend.index', compact('hero','abouthome'));


    }// =======End Method======

    public function Services(){

        return view('frontend.page.services');
    }// =======End Method======
}
