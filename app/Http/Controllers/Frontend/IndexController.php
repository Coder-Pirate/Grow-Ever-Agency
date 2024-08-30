<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Home;
use App\Models\Service;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function Index(){

        $hero = Home::find(1);
        $abouthome = Home::find(2);
        $service = Service::where('status', 1)->orderBy('title', 'ASC')->get();
        return view('frontend.index', compact('hero','abouthome','service'));


    }// =======End Method======

    public function Services(){
        $service = Service::where('status', 1)->orderBy('title', 'ASC')->get();

        return view('frontend.page.services',compact('service'));
    }// =======End Method======


    public function ServicesDetails($id){

        $id = Service::findOrFail($id);

        return view('frontend.page.services_details', compact('id'));


    }// =======End Method======
}
