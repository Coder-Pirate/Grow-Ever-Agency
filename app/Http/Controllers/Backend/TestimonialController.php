<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class TestimonialController extends Controller
{
    public function TestimonialAll()
    {

        $testimonial = Testimonial::latest()->get();

        return view('admin.backend.testimonial_all', compact('testimonial'));
    } // End Method

    public function TestimonialAdd()
    {
        $testimonial = Testimonial::latest()->get();
        return view('admin.backend.testimonial_add', compact('testimonial'));
    } // End Method


    public function TestimonialStore(Request $request)
    {

        $image = $request->file('image');
        $manager = new ImageManager(new Driver()); //ImageManager
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        $img = $manager->read($request->file('image'));
        $img = $img->resize(65, 65)->save(base_path('public/upload/testimonimage/' . $name_gen));
        $save_url = 'upload/testimonimage/' . $name_gen;


        Testimonial::insertGetId([
            'title' =>  $request->title,
            'profession' =>  $request->profession,
            'image' =>  $save_url,
            'contant' =>   $request->contant,
            'status' =>  1,
            'created_at' => Carbon::now(),

        ]);


        $notification = array(
            'message' => 'Testimonial Add Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.testimonial')->with($notification);
    } // End Method

    public function TestimonialEdit($id)
    {

        $testimonialData = Testimonial::find($id);
        return view('admin.backend.testimonial_edit', compact('testimonialData'));
    } // End Method


    public function TestimonialUpdateinfo(Request $request)
    {

        $id = $request->id;
        $oldImage = $request->old_img;

        if ($request->file('image')) {


            $image = $request->file('image');
            $manager = new ImageManager(new Driver()); //ImageManager
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            $img = $manager->read($request->file('image'));
            $img = $img->resize(65, 65)->save(base_path('public/upload/testimonimage/' . $name_gen));
            $save_url = 'upload/testimonimage/' . $name_gen;


            if (file_exists($oldImage)) {
                unlink($oldImage);
            }



            Testimonial::find($id)->update([
                'title' =>  $request->title,
                'profession' =>  $request->profession,
                'image' =>  $save_url,
                'contant' =>   $request->contant,
                'status' => $request->status,




            ]);
        } else {
            Testimonial::find($id)->update([
                'title' =>  $request->title,
                'profession' =>  $request->profession,
                'contant' =>   $request->contant,
                'status' => $request->status,




            ]);
        }


        $notification = array(
            'message' => 'Team Member Update Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.testimonial')->with($notification);
    } // End Method


    public function TestimonialDelete($id){

        $testimonial = Testimonial::find($id);
        unlink($testimonial->image);

        Testimonial::find($id)->delete();

        $notification = array(
            'message' => 'Testimonial Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);

    }
}
