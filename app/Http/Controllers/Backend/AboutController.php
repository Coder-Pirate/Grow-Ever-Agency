<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\About;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;


class AboutController extends Controller
{
    public function AboutInfo(){
        $about = About::all();
        return view('admin.backend.about', compact('about'));
    }//End Method

    public function AboutEdit($id){

        $about = About::find($id);
        return view('admin.backend.about_edit', compact('about'));
    }//End Method

    public function AboutUpdateinfo(Request $request){
        $id = $request->id;

        About::find($id)->update([

            'id' => $request->id,
            'sub_title' => $request->sub_title,
            'title' => $request->title,
            'description' => $request->description,


        ]);

        $notification = array(
            'message' => 'Info  Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.about')->with($notification);


    }// End Method

    public function AboutUpdateimage(Request $request){
        $id = $request->id;
        $oldImg = $request->old_img;

        $image = $request->file('image');
        $manager = new ImageManager(new Driver()); //ImageManager
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        $img = $manager->read($request->file('image'));
        $img = $img->resize(302,360)->save(base_path('public/upload/aboutimage/'.$name_gen));
        $save_url = 'upload/aboutimage/'.$name_gen;



    if (file_exists($oldImg)) {
        unlink($oldImg);
    }

    About::find($id)->update([


        'image' =>  $save_url,
        'updated_at' => Carbon::now(),



    ]);


        $notification = array(
            'message' => 'Image  Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.about')->with($notification);


    }// End Method
}
