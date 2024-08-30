<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Carbon\Carbon;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    public function ServicesAll(){
        $services = Service::latest()->get();

        return view('admin.backend.services',compact('services'));

    }// End Method

    public function ServicesAdd(){

        return view('admin.backend.service_add');

    }// End Method

    public function AdminServicesAdd(Request $request){
        Service::insert([
            'title' => $request->title,
            'icon_class' => $request->icon_class,
            'short_desc' => $request->short_desc,
            'description' => $request->description,
            'status' => '1',
            'created_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'Instructor Registed Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.services')->with($notification);
    }// End Method

    public function AdminServicesEdit($id){

        $id = Service::findOrFail($id);
        return view('admin.backend.service_edit',compact('id'));

    }

    public function AdminServicesUpdate(Request $request){

        $sid = $request->id;

           Service::find($sid)->update([
            'title' => $request->title,
            'icon_class' => $request->icon_class,
            'short_desc' => $request->short_desc,
            'description' => $request->description,
            'status' =>  $request->status,


        ]);

        $notification = array(
            'message' => 'Course Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.services')->with($notification);


    }//  End Method

    public function AdminServicesDelete($id){

        Service::find($id)->delete();

        $notification = array(
            'message' => 'Course Updated Successfully',
            'alert-type' => 'success'
        );
         return redirect()->back()->with($notification);


    }//  End Method


    public function upload(Request $request)
    {
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $path = $file->store('images', 'public');
            return response()->json(['link' => Storage::url($path)]);
        }
        return response()->json(['error' => 'No file uploaded.'], 400);
    }
}


