<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Home;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;


class HomeController extends Controller
{
    public function HomeInfoAll()
    {

        $homeall = Home::all();
        return view('admin.backend.home_all', compact('homeall'));
    } // End Method

    public function HomeInfoedit($id)
    {
        $homeall = Home::find($id);
        return view('admin.backend.home_edit', compact('homeall'));
    } // End Method

    public function HomeUpdateinfo(Request $request)
    {

        $id = $request->id;

        Home::find($id)->update([

            'id' => $request->id,
            'name' => $request->name,
            'title' => $request->title,
            'short_dec' => $request->short_dec,


        ]);

        $notification = array(
            'message' => 'Info  Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.home.info')->with($notification);
    }// End Method


    public function HomeUpdateimage(Request $request) {

        $id = $request->id;
        $oldImg = $request->old_img;

        $image = $request->file('image');
        $manager = new ImageManager(new Driver()); //ImageManager
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        $img = $manager->read($request->file('image'));
        $img = $img->resize(571,460)->save(base_path('public/upload/homeimage/'.$name_gen));
        $save_url = 'upload/homeimage/'.$name_gen;



    if (file_exists($oldImg)) {
        unlink($oldImg);
    }

    Home::find($id)->update([


        'image' =>  $save_url,
        'updated_at' => Carbon::now(),



    ]);


        $notification = array(
            'message' => 'Image  Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.home.info')->with($notification);
    }// End Method
}
