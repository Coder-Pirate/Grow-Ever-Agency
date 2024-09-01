<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;


class TeamController extends Controller
{
    public function TeamAll()
    {

        $team = Team::latest()->get();

        return view('admin.backend.team_all', compact('team'));
    } // End Method

    public function TeamAdd()
    {

        return view('admin.backend.team_add');
    } // End Method

    public function TeamStore(Request $request)
    {

        $image = $request->file('image');
        $manager = new ImageManager(new Driver()); //ImageManager
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        $img = $manager->read($request->file('image'));
        $img = $img->resize(370, 410)->save(base_path('public/upload/teamimage/' . $name_gen));
        $save_url = 'upload/teamimage/' . $name_gen;


        Team::insertGetId([
            'name' =>  $request->name,
            'designation' =>  $request->designation,
            'fb_url' =>  $request->fb_url,
            'tw_url' =>  $request->tw_url,
            'in_url' =>  $request->in_url,
            'image' =>  $save_url,
            'status' =>  1,
            'created_at' => Carbon::now(),

        ]);


        $notification = array(
            'message' => 'Team Member Add Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.team')->with($notification);
    } // End Method

    public function TeamEdit($id)
    {

        $teamData = Team::find($id);
        return view('admin.backend.team_edit', compact('teamData'));
    } // End Method


    public function TeamUpdate(Request $request){

        $id = $request->id;
        $oldImage = $request->old_img;

        if($request->file('image')){


        $image = $request->file('image');
        $manager = new ImageManager(new Driver()); //ImageManager
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        $img = $manager->read($request->file('image'));
        $img = $img->resize(750, 500)->save(base_path('public/upload/teamimage/' . $name_gen));
        $save_url = 'upload/teamimage/' . $name_gen;


        if (file_exists($oldImage)) {
            unlink($oldImage);
        }



        Team::find($id)->update([
            'name' =>  $request->name,
            'designation' =>  $request->designation,
            'fb_url' =>  $request->fb_url,
            'tw_url' =>  $request->tw_url,
            'in_url' =>  $request->in_url,
            'image' =>  $save_url,
            'status' => $request->status,


        ]);
    }else{
        Team::find($id)->update([
            'name' =>  $request->name,
            'designation' =>  $request->designation,
            'fb_url' =>  $request->fb_url,
            'tw_url' =>  $request->tw_url,
            'in_url' =>  $request->in_url,
            'status' => $request->status,


        ]);
    }


        $notification = array(
            'message' => 'Team Member Update Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.team')->with($notification);

    }// End Method

    public function TeamDelete($id){

        $blog = Team::find($id);
        unlink($blog->image);

        Team::find($id)->delete();

        $notification = array(
            'message' => 'Course Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);

    }// End Method
}
