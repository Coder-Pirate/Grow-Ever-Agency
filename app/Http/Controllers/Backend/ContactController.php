<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Service;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function ContactAll()
    {
        $contact = Contact::latest()->get();

        return view('admin.backend.contact_all', compact('contact'));
    } // End Method

    public function ContactInfo($id){
        $contatInfo = Contact::find($id);

        return view('admin.backend.contact_view', compact('contatInfo'));

    }// End Method

    public function ContactEdit($id){

        $contatInfo = Contact::find($id);
        $category = Service::latest()->get()->where('status', 1);
        return view('admin.backend.contact_edit', compact('contatInfo', 'category'));


    }// End Method

    public function ContactUpdate(Request $request){

        $cid = $request->id;

        Contact::find($cid)->update([
         'name' => $request->name,
         'name_slug' => strtolower(str_replace(' ','-',$request->name)),
         'phone' => $request->phone,
         'email' => $request->email,
         'service_id' => $request->service_id,
         'massage' => $request->massage,
         'status' =>  $request->status,


     ]);

     $notification = array(
         'message' => 'Contact Updated Successfully',
         'alert-type' => 'success'
     );
     return redirect()->route('admin.contact')->with($notification);

    }// End Method

    public function ContactlDelete($id){

        


        Contact::find($id)->delete();

        $notification = array(
            'message' => 'Course Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);

    }



}



