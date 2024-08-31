<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Blogcatetory;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Colors\Rgb\Channels\Red;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;


class BlogController extends Controller
{
    public function BlogAll()
    {
        $blog = Blog::latest()->get();

        return view('admin.backend.blog', compact('blog'));
    } // End Method

    public function BlogAdd()
    {
        $category = Blogcatetory::latest()->get()->where('status', 1);
        $blogData = Blog::all();
        return view('admin.backend.blog_add', compact('category', 'blogData'));
    } //End Method

    public function BlogStore(Request $request)
    {

        $image = $request->file('image');
        $manager = new ImageManager(new Driver()); //ImageManager
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        $img = $manager->read($request->file('image'));
        $img = $img->resize(750, 500)->save(base_path('public/upload/blogimage/' . $name_gen));
        $save_url = 'upload/blogimage/' . $name_gen;


        Blog::insertGetId([
            'title' =>  $request->title,
            'title_slug' => strtolower(str_replace(' ','-',$request->title)),
            'image' =>  $save_url,
            'category_id' =>  $request->category_id,
            'user_id' =>  Auth::user()->id,
            'contant' =>  $request->contant,
            'status' =>  1,
            'created_at' => Carbon::now(),

        ]);


        $notification = array(
            'message' => 'Course Inserted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.blog.all')->with($notification);
    }

    public function BlogEdit($id)
    {
        $blogData = Blog::find($id);
        $category = Blogcatetory::latest()->get()->where('status', 1);
        return view('admin.backend.blog_edit', compact('blogData', 'category'));
    }

    public function BlogUpdate(Request $request)
    {

        $id = $request->id;
        $oldImage = $request->old_img;

        if($request->file('image')){


        $image = $request->file('image');
        $manager = new ImageManager(new Driver()); //ImageManager
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        $img = $manager->read($request->file('image'));
        $img = $img->resize(750, 500)->save(base_path('public/upload/blogimage/' . $name_gen));
        $save_url = 'upload/blogimage/' . $name_gen;


        if (file_exists($oldImage)) {
            unlink($oldImage);
        }



        Blog::find($id)->update([
            'title' =>  $request->title,
            'title_slug' => strtolower(str_replace(' ','-',$request->title)),
            'image' =>  $save_url,
            'category_id' =>  $request->category_id,
            'user_id' =>  Auth::user()->id,
            'contant' =>  $request->contant,
            'status' =>  $request->status,
            'created_at' => Carbon::now(),

        ]);
    }else{
        Blog::find($id)->update([
            'title' =>  $request->title,
            'title_slug' => strtolower(str_replace(' ','-',$request->title)),
            'category_id' =>  $request->category_id,
            'user_id' =>  Auth::user()->id,
            'contant' =>  $request->contant,
            'status' =>  $request->status,
            'created_at' => Carbon::now(),

        ]);
    }


        $notification = array(
            'message' => 'Course Inserted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.blog.all')->with($notification);
    } //End Method

    public function BlogDelete($id) {

        $blog = Blog::find($id);
        unlink($blog->image);

        Blog::find($id)->delete();

        $notification = array(
            'message' => 'Course Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);

    } //End Method
}
