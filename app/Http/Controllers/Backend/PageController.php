<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function PagesAll()
    {

        $pages = Page::all();
        return view('admin.backend.pages_all', compact('pages'));
    } // End Method

    public function PagesInfoedit($id)
    {

        $pages = Page::find($id);
        return view('admin.backend.pages_edit', compact('pages'));
    } // End Method

    public function PagesUpdateinfo(Request $request)
    {


        $id = $request->id;

        Page::find($id)->update([

            'id' => $request->id,
            'title' => $request->title,
            'title_slug' => strtolower(str_replace(' ', '-', $request->title)),
            'description' => $request->description,
            'status' => $request->status,


        ]);

        $notification = array(
            'message' => 'Info  Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.pages')->with($notification);
    } // End Method
}
