<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Blog;
use App\Models\Blogcatetory;
use App\Models\Contact;
use App\Models\Faq;
use App\Models\Home;
use App\Models\Page;
use App\Models\Portfolio;
use App\Models\Portfoliocategory;
use App\Models\Service;
use App\Models\Team;
use App\Models\Testimonial;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function Index()
    {

        $hero = Home::find(1);
        $abouthome = Home::find(2);
        $service = Service::where('status', 1)->orderBy('title', 'ASC')->get();
        $faq = Faq::where('status', 1)->orderBy('qustion', 'ASC')->limit(6)->get();
        $testimonial = Testimonial::where('status', 1)->latest()->limit(6)->get();
        $category = Service::latest()->get()->where('status', 1);

        return view('frontend.index', compact('hero', 'abouthome', 'service', 'faq', 'testimonial', 'category'));
    } // =======End Method======


    //-----------------------------------------------------------------Services----------------

    public function Services()
    {
        $service = Service::where('status', 1)->orderBy('title', 'ASC')->get();

        return view('frontend.page.services', compact('service'));
    } // =======End Method======


    public function ServicesDetails($id, $slug)
    {

        $serviceData = Service::find($id);

        return view('frontend.page.services_details', compact('serviceData'));
    } // =======End Method======


    //-----------------------------------------------------------------Blog----------------


    public function Blogs()
    {
        $blogCategory = Blogcatetory::where('status', 1)->latest()->get();
        $blog = Blog::where('status', 1)->latest()->paginate(16);
        $latestblog = Blog::where('status', 1)->latest()->limit(3)->get();

        return view('frontend.page.blog', compact('blog', 'blogCategory', 'latestblog'));
    } // =======End Method======


    public function BlogCategory($id, $slug)
    {
        $blogCategory = Blogcatetory::where('status', 1)->latest()->get();
        $blog = Blog::where('category_id', $id)->where('status', 1)->paginate(16);
        $latestblog = Blog::where('status', 1)->latest()->limit(3)->get();

        return view('frontend.page.blogcategory', compact('blog', 'blogCategory', 'latestblog'));
    } // =======End Method======



    public function BlogDetails($id, $slug)
    {


        $blog = Blog::find($id);

        return view('frontend.page.blogdetails', compact('blog'));
    } // =======End Method======

    //-----------------------------------------------------------------Blog----------------

    public function Portfolio()
    {
        $portfolioCategory = Portfoliocategory::where('status', 1)->latest()->get();
        $portfolio = Portfolio::where('status', 1)->latest()->paginate(16);
        $latestportfolio = Portfolio::where('status', 1)->latest()->limit(3)->get();

        return view('frontend.page.portfolio', compact('portfolioCategory', 'portfolio', 'latestportfolio'));
    } // =======End Method======


    public function PortfolioCategory($id, $slug)
    {

        $portfolioCategory = Portfoliocategory::where('status', 1)->latest()->get();
        $portfolio = Portfolio::where('category_id', $id)->where('status', 1)->paginate(16);
        $latestportfolio = Portfolio::where('status', 1)->latest()->limit(3)->get();

        return view('frontend.page.portfoliocategory', compact('portfolioCategory', 'portfolio', 'latestportfolio'));
    } // =======End Method======


    public function PortfolioDetails($id, $slug)
    {
        $portfolio = Portfolio::find($id);

        return view('frontend.page.portfoliodetails', compact('portfolio'));
    } // =======End Method======

    //----------------------------------About Page-----------------------------------------------

    public function About()
    {
        $about = About::Find(1);
        $team = Team::where('status', 1)->latest()->get();

        return view('frontend.page.about', compact('about', 'team'));
    } // =======End Method======

    //----------------------------------About Page-----------------------------------------------


    public function Faq()
    {
        $faq = Faq::where('status', 1)->latest()->get();

        return view('frontend.page.faq', compact('faq'));
    } // =======End Method======

    public function Pages($id, $slug){

        $pages = Page::find($id);

        return view('frontend.page.pagedetails', compact('pages'));
    }// ==========End Method =============


    public function Contact(){

        $category = Service::latest()->get()->where('status', 1);
        return view('frontend.page.contact_us', compact('category'));
    }// ==========End Method =============


    public function ContactSubmit(Request $request){

        Contact::insertGetId([
            'name' =>  $request->name,
            'name_slug' => strtolower(str_replace(' ','-',$request->name)),
            'phone' =>  $request->phone,
            'email' =>  $request->email,
            'service_id' =>  $request->service_id,

            'massage' =>  $request->massage,
            'status' =>  0,
            'created_at' => Carbon::now(),

        ]);

        return redirect()->route('index');

    }// ==========End Method =============
}
