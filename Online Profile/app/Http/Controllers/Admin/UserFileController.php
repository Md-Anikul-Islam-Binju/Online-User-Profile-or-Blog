<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class UserFileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }


    public function file()
    {
    	$file=DB::table('files')->get();
    	return view('admin.file.user_file',compact('file'));
    }


    public function storefile(Request $request)
    {
    	$validatedData = $request->validate([
        'name' => 'required|unique:files|max:50',
        ]);


      $data=array();
        $data['name']=$request->name; 
        $file=$request->file('up_file');
            
                if($file)
                {
   
		            $file_name = date('dmy_H_s_i');
		            $ext=strtolower($file->getClientOriginalExtension());
		            $file_full_name=$file_name.'.'.$ext;
		            $upload_path='public/media/allfile/';
		            $file_url=$upload_path.$file_full_name;
		            $success=$file->move($upload_path,$file_full_name);
		            $data['up_file']=$file_url;


                    $file=DB::table('files')->insert($data);
                    $notification=array(
                                         'messege'=>'Successfully File Inserted ',
                                         'alert-type'=>'success'
                                       );

                    return Redirect()->back()->with($notification);                      
                }
                else
                {
                  $file=DB::table('files')->insert($data);
                  $notification=array(
                                       'messege'=>'Done!',
                                       'alert-type'=>'success'
                                     );
                  return Redirect()->back()->with($notification); 
                }
       
    }


    public function DeleteFile($id)
    {
    	$data=DB::table('files')->where('id',$id)->first();
        $file=$data->up_file;
        unlink($file);

    	DB::table('files')->where('id',$id)->delete();
    	$notification=array(
                        'messege'=>'File Delete Success',
                        'alert-type'=>'success'
                         );
        return Redirect()->back()->with($notification);   	

    }



}
