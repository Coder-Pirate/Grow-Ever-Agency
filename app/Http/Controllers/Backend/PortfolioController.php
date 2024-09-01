<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use App\Models\Portfoliocategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;


class PortfolioController extends Controller
{
    public function PortfolioAll()
    {

        $portfolio = Portfolio::latest()->get();

        return view('admin.backend.portfiolo', compact('portfolio'));
    } // End Method

    public function PortfolioAdd()
    {

        $category = Portfoliocategory::latest()->get()->where('status', 1);
        $portfolioData = Portfolio::all();
        return view('admin.backend.portfolio_add', compact('category', 'portfolioData'));
    } // End Method


    public function PortfolioStore(Request $request)
    {

        $image = $request->file('image');
        $manager = new ImageManager(new Driver()); //ImageManager
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        $img = $manager->read($request->file('image'));
        $img = $img->resize(750, 500)->save(base_path('public/upload/portfolioimage/' . $name_gen));
        $save_url = 'upload/portfolioimage/' . $name_gen;


        Portfolio::insertGetId([
            'title' =>  $request->title,
            'title_slug' => strtolower(str_replace(' ', '-', $request->title)),
            'image' =>  $save_url,
            'category_id' =>  $request->category_id,
            'user_id' =>  Auth::user()->id,
            'contant' =>  $request->contant,
            'status' =>  1,
            'created_at' => Carbon::now(),

        ]);


        $notification = array(
            'message' => 'Portfolio Add Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.portfolio.all')->with($notification);
    } // End Method


    public function PortfolioEdit($id)
    {

        $portfolioData = Portfolio::find($id);
        $category = Portfoliocategory::latest()->get()->where('status', 1);
        return view('admin.backend.portfolio_edit', compact('portfolioData', 'category'));
    } // End Method


    public function PortfolioUpdate(Request $request)
    {

        $id = $request->id;
        $oldImage = $request->old_img;

        if ($request->file('image')) {


            $image = $request->file('image');
            $manager = new ImageManager(new Driver()); //ImageManager
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            $img = $manager->read($request->file('image'));
            $img = $img->resize(750, 500)->save(base_path('public/upload/portfolioimage/' . $name_gen));
            $save_url = 'upload/portfolioimage/' . $name_gen;


            if (file_exists($oldImage)) {
                unlink($oldImage);
            }



            Portfolio::find($id)->update([
                'title' =>  $request->title,
                'title_slug' => strtolower(str_replace(' ', '-', $request->title)),
                'image' =>  $save_url,
                'category_id' =>  $request->category_id,
                'user_id' =>  Auth::user()->id,
                'contant' =>  $request->contant,
                'status' =>  $request->status,
                'created_at' => Carbon::now(),

            ]);
        } else {
            Portfolio::find($id)->update([
                'title' =>  $request->title,
                'title_slug' => strtolower(str_replace(' ', '-', $request->title)),
                'category_id' =>  $request->category_id,
                'user_id' =>  Auth::user()->id,
                'contant' =>  $request->contant,
                'status' =>  $request->status,
                'created_at' => Carbon::now(),

            ]);
        }


        $notification = array(
            'message' => 'Portfolio Update Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.portfolio.all')->with($notification);
    } // End Method


    public function PortfolioDelete($id){

        $portfolio = Portfolio::find($id);
        unlink($portfolio->image);

        Portfolio::find($id)->delete();

        $notification = array(
            'message' => 'Portfolio Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);




    }// End Method


}
