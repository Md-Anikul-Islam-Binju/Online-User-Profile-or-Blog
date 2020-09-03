<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class UserBlogController extends Controller
{
    public function blog()
    {
    	$blog=DB::table('blogs')->get();
    	return view('blog.blog_page',compact('blog'));
    }


    public function singleblogpage($id)
    {
    	     $blog=DB::table('blogs')
                       ->where('blogs.id',$id)
                       ->first();
       
             return view('blog.single_blog',compact('blog'));
    }


    public function downlode($id)
    {
        //$upload_path='public/media/allfile/';
        //return response()->download($upload_path'.'$id);

        // $file=DB::table('files')->where('id',$id)->download();
        // $notification=array(
        //                 'messege'=>'File Delete Success',
        //                 'alert-type'=>'success'
        //                  );
        // return Redirect()->back()->with($notification); 

        



        // $file=DB::table('files')->get();
        // return response()->json($file);  



    }
}
