<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Blogcatetory;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function BlogCategoryAll()
    {

        $blogcat = Blogcatetory::latest()->get();
        return view('admin.backend.blogall_category', compact('blogcat'));
    } //End Method

    public function BlogCategoryAdd()
    {
        return view('admin.backend.blogcategory_add');
    } //End Method

    public function BlogCategoryStore(Request $request)
    {
        Blogcatetory::insert([
            'category_name' => $request->category_name,
            'category_slug' => strtolower(str_replace(' ','-',$request->category_name)),
            'status' => '1',
            'created_at' => Carbon::now(),

        ]);
        $notification = array(
            'message' => 'Instructor Registed Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.blog.category')->with($notification);
    } //End Method

    public function BlogCategoryEdit($id)
    {

        $id = Blogcatetory::find($id);
        return view('admin.backend.blogcategory_edit', compact('id'));
    } // End Method

    public function BlogCategoryUpdate(Request $request)
    {
        $bid = $request->id;

        Blogcatetory::find($bid)->update([
            'category_name' => $request->category_name,
            'category_slug' => strtolower(str_replace(' ','-',$request->category_name)),
            'status' =>  $request->status,


        ]);

        $notification = array(
            'message' => 'Course Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.blog.category')->with($notification);
    }// End Mehod

    public function BlogCategoryDelete($id){



        Blogcatetory::find($id)->delete();

        $blogData = Blog::where('category_id',$id)->get();
        foreach ($blogData as $item) {
            $item->title;
            unlink($item->image);
            blog::where('category_id',$id)->delete();
        }

        $notification = array(
            'message' => 'Course Updated Successfully',
            'alert-type' => 'success'
        );
         return redirect()->back()->with($notification);
    }
}
