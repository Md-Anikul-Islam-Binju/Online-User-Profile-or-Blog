<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Filesystem\Filesystem;
use Image;
use File;
use DB;

class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }


   //site setting



    public function setting()
    {
       $setting=DB::table('settings')->get();
       return view('admin.setting.setting',compact('setting'));
    }

    public function StoreSetting(Request $request)
    {
    	 $data=array();
         $data['name']=$request->name;
         $data['phone']=$request->phone;
         $data['mail']=$request->mail;
         $data['address']=$request->address;
         $data['link1']=$request->link1;
         $data['link2']=$request->link2;
         $data['link3']=$request->link3;
         $data['link4']=$request->link4;

         DB::table('settings')->insert($data);
         $notification=array(
                        'messege'=>'Setting Data Insert Success',
                        'alert-type'=>'success'
                         );
         return Redirect()->back()->with($notification);
    }

    public function DeleteSetting($id)
    {
    	DB::table('settings')->where('id',$id)->delete();

    	$notification=array(
                        'messege'=>'Setting Data Delete Success',
                        'alert-type'=>'success'
                         );
        return Redirect()->back()->with($notification);

    }


    public function Inactive($id)
    {   
      DB::table('settings')->where('id',$id)->update(['status'=> 0]);

      $notification=array(
                     'messege'=>'Successfully Setting Info Inactive',
                     'alert-type'=>'success'
                    );
      return Redirect()->back()->with($notification);

    }

    public function Active($id)
    {
      DB::table('settings')->where('id',$id)->update(['status'=> 1]);

      $notification=array(
                     'messege'=>'Successfully Setting Info Active',
                     'alert-type'=>'success'
                    );
      return Redirect()->back()->with($notification);
    }



    //site slider

    public function slider()
    {
       $slider=DB::table('sliders')->get();
       return view('admin.setting.slider',compact('slider')); 
    }


    public function storeslider(Request $request)
    {
    
      $data=array();
       
        $image=$request->file('slider');
            if ($image) {
                $image_name= date('dmy_H_s_i');

                $ext1=strtolower($image->getClientOriginalExtension());
                $image_full_name=$image_name.'.'.$ext1;
                $upload_path='public/media/slider/';
                $image_url=$upload_path.$image_full_name;
                $success=$image->move($upload_path,$image_full_name);

              
                $data['slider']=$image_url;
                $slider=DB::table('sliders')
                          ->insert($data);
                    $notification=array(
                     'messege'=>'Successfully Slider Inserted ',
                     'alert-type'=>'success'
                    );
                return Redirect()->back()->with($notification);                      
            }
            else
            {
              $slider=DB::table('sliders')
                          ->insert($data);
                 $notification=array(
                     'messege'=>'Done!',
                     'alert-type'=>'success'
                      );
                return Redirect()->back()->with($notification); 
            } 
       
    }


    public function InactiveSlider($id)
    {   
      DB::table('sliders')->where('id',$id)->update(['status'=> 0]);

      $notification=array(
                     'messege'=>'Successfully Slider Inactive',
                     'alert-type'=>'success'
                    );
      return Redirect()->back()->with($notification);

    }

    public function ActiveSlider($id)
    {
      DB::table('sliders')->where('id',$id)->update(['status'=> 1]);

      $notification=array(
                     'messege'=>'Successfully Slider Active',
                     'alert-type'=>'success'
                    );
      return Redirect()->back()->with($notification);
    }




    public function DeleteSlider($id)
    {
    	$data=DB::table('sliders')->where('id',$id)->first();
    	$image=$data->slider;
    	unlink($image);
    	DB::table('sliders')->where('id',$id)->delete();
    	$notification=array(
                        'messege'=>'Slider Delete Success',
                        'alert-type'=>'success'
                         );
        return Redirect()->back()->with($notification);   	

    }


    //admin account create


    public function account()
    {
       return view('admin.setting.account_create'); 
    }


}
