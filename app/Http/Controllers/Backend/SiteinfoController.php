<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Siteinfo;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class SiteinfoController extends Controller
{
    public function SiteInfo()
    {

        $siteinfo = Siteinfo::find(1);

        return view('admin.backend.site_info', compact('siteinfo'));
    } //End Method

    public function SiteInfoIconUpdate(Request $request)
    {

        $id = $request->id;
        $oldImg = $request->old_icon;

        $image = $request->file('image');
        $manager = new ImageManager(new Driver()); //ImageManager
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        $img = $manager->read($request->file('image'));
        $img = $img->resize(48, 48)->save(base_path('public/upload/siteimage/' . $name_gen));
        $save_url = 'upload/siteimage/' . $name_gen;



        if (file_exists($oldImg)) {
            unlink($oldImg);
        }

        Siteinfo::find($id)->update([


            'fabicon' =>  $save_url,
            'updated_at' => Carbon::now(),



        ]);


        $notification = array(
            'message' => 'Siteinfo  Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    } //End Method


    public function SiteInfoLogoUpdate(Request $request)
    {

        $id = $request->id;
        $oldImg = $request->old_logo;

        $image = $request->file('image');
        $manager = new ImageManager(new Driver()); //ImageManager
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        $img = $manager->read($request->file('image'));
        $img = $img->resize(160, 36)->save(base_path('public/upload/siteimage/' . $name_gen));
        $save_url = 'upload/siteimage/' . $name_gen;



        if (file_exists($oldImg)) {
            unlink($oldImg);
        }

        Siteinfo::find($id)->update([


            'logo' =>  $save_url,
            'updated_at' => Carbon::now(),



        ]);


        $notification = array(
            'message' => 'Siteinfo  Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    } //End Method


    public function SiteInfoOthersUpdate(Request $request)
    {

        $id = $request->id;


        Siteinfo::find($id)->update([


            'site_name' => $request->site_name,
            'contact_number' => $request->contact_number,
            'working_days' => $request->working_days,
            'working_hours' => $request->working_hours,
            'branch_name' => $request->branch_name,
            'branch_address' => $request->branch_address,
            'fb_url' => $request->fb_url,
            'tw_url' => $request->tw_url,
            'wh_url' => $request->wh_url,
            'in_url' => $request->in_url,
            'updated_at' => Carbon::now(),

        ]);



        $notification = array(
            'message' => 'Siteinfo  Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
