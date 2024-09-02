<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Carbon\Carbon;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function FaqAll()
    {
        $faq = Faq::latest()->get();

        return view('admin.backend.faq_all', compact('faq'));
    } // End Method

    public function FaqAdd()
    {


        return view('admin.backend.faq_add');
    } // End Method

    public function FaqStore(Request $request)
    {

        Faq::insert([
            'qustion' =>  $request->qustion,
            'answer' =>  $request->answer,
            'status' =>  1,
            'created_at' => Carbon::now(),

        ]);


        $notification = array(
            'message' => 'Faq Add Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.faq')->with($notification);
    } // End Method

    public function FaqEdit($id)
    {

        $faqData = Faq::find($id);
        return view('admin.backend.faq_edit', compact('faqData'));
    } // End Method

    public function FaqUpdateinfo(Request $request)
    {
        $id = $request->id;
        Faq::find($id)->update([
            'qustion' =>  $request->qustion,
            'answer' =>  $request->answer,
            'status' =>  $request->status,


        ]);


        $notification = array(
            'message' => 'Faq Update Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.faq')->with($notification);
    } // End Method


    public function FaqDelete($id)
    {



        Faq::find($id)->delete();

        $notification = array(
            'message' => 'Faq Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    } // End Method
}
