<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class BlogPostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function allblog()
    {
        $blog=DB::table('blogs')->get();
        return view('admin.blog.all_blog',compact('blog'));
    }


    public function blog()
    {
    	$blog=DB::table('blogs')->get();
    	return view('admin.blog.add_blog',compact('blog'));
    }


    public function storeblog(Request $request)
    {

        $data=array();
        
        $data['title']=$request->title; 
        $data['details']=$request->details;


        $image=$request->file('image');
        if ($image) 
        {

            $image_name= date('dmy_H_s_i'); 
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/media/blog/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
          
            $data['image']=$image_url;
            $person=DB::table('blogs')->insert($data);
                   $notification=array(
                                      'messege'=>'Successfully Blog Inserted ',
                                      'alert-type'=>'success'
                                       );
            return Redirect()->back()->with($notification);                      
        }
        else
        {
            $person=DB::table('blogs')->insert($data);
                   $notification=array(
                                      'messege'=>'Done!',
                                      'alert-type'=>'success'
                                      );
            return Redirect()->back()->with($notification); 
        }

    }

    public function ViewBlog($id)
    {
        $blog=DB::table('blogs')

                       ->where('blogs.id',$id)
                       ->first();
       
        return view('admin.blog.show_blog',compact('blog'));

       
    }


    public function DeleteBlog($id)
    {
        $data=DB::table('blogs')->where('id',$id)->first();
        $picture=$data->image;
        unlink($picture);

        DB::table('blogs')->where('id',$id)->delete();
        $notification=array(
                        'messege'=>'Blog Info Delete Success',
                        'alert-type'=>'success'
                         );
        return Redirect()->back()->with($notification);     

    }

}
