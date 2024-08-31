<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Blogcatetory;
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


    public function ServicesDetails($id, $slug){

        $serviceData = Service::find($id);

        return view('frontend.page.services_details', compact('serviceData'));


    }// =======End Method======

    public function Blogs(){
        $blogCategory = Blogcatetory::where('status', 1)->latest()->get();
        $blog = Blog::where('status', 1)->latest()->get();

        return view('frontend.page.blog',compact('blog','blogCategory'));

    }// =======End Method======


}
