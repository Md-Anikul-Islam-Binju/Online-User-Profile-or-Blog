<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class FamilyMemberController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        return view('admin.familymember.create');
    }

    public function allinfo()
    {
        $family=DB::table('familymembers')->get();
        return view('admin.familymember.index',compact('family'));
    }

    public function store(Request $request)
    {

        $data=array();
        
        $data['firstname']=$request->firstname; 
        $data['lastname']=$request->lastname; 
        $data['email']=$request->email;
        $data['relagion']=$request->relagion;  
        $data['phone']=$request->phone;
        $data['birthdate']=$request->birthdate;  
        $data['job']=$request->job;
        $data['relation']=$request->relation;
        $data['description']=$request->description;
        $data['achivment']=$request->achivment;


        $image=$request->file('image');
        if ($image) 
        {

            $image_name= date('dmy_H_s_i'); 
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/media/familymember/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
          
            $data['image']=$image_url;
            $family=DB::table('familymembers')->insert($data);
                   $notification=array(
                                      'messege'=>'Successfully Familymembers Information Inserted ',
                                      'alert-type'=>'success'
                                       );
            return Redirect()->back()->with($notification);                      
        }
        else
        {
            $family=DB::table('familymembers')->insert($data);
                   $notification=array(
                                      'messege'=>'Done!',
                                      'alert-type'=>'success'
                                      );
            return Redirect()->back()->with($notification); 
        }

    }


    public function ViewFamily($id)
    {
        $family=DB::table('familymembers')

                       ->where('familymembers.id',$id)
                       ->first();
       
        return view('admin.familymember.show',compact('family'));

       
    }


    public function DeleteFamily($id)
    {
    	$data=DB::table('familymembers')->where('id',$id)->first();
    	$image=$data->image;
    	unlink($image);

    	DB::table('familymembers')->where('id',$id)->delete();
    	$notification=array(
                        'messege'=>'Familymembers Info Delete Success',
                        'alert-type'=>'success'
                         );
        return Redirect()->back()->with($notification);   	

    }


    public function EditFamily($id)
    {   

        $family=DB::table('familymembers')->where('id',$id)->first();
        return view('admin.familymember.edit',compact('family')); 
    }


    
    public function UpdateFamily(Request $request,$id)
    {
        

        $data=array();
        
 
        $data['firstname']=$request->firstname; 
        $data['lastname']=$request->lastname; 
        $data['email']=$request->email;
        $data['relagion']=$request->relagion;  
        $data['phone']=$request->phone;
        $data['birthdate']=$request->birthdate;  
        $data['job']=$request->job;
        $data['relation']=$request->relation;
        $data['description']=$request->description;
        $data['achivment']=$request->achivment;



        $oldlogo=$request->old_logo;
        $image=$request->file('image');
            if ($image){              
                unlink($oldlogo);
                $image_name= date('dmy_H_s_i');
                $ext=strtolower($image->getClientOriginalExtension());
                $image_full_name=$image_name.'.'.$ext;
                $upload_path='public/media/familymember/';
                $image_url=$upload_path.$image_full_name;
                $success=$image->move($upload_path,$image_full_name);
              
                $data['image']=$image_url;
                $update = DB::table('familymembers')->where('id',$id)->update($data);
                        
                    $notification=array(
                     'messege'=>'Familymembers Information Update Success',
                     'alert-type'=>'success'
                    );
                    return Redirect()->route('all.family_info')->with($notification);                      
            }else{
                $update = DB::table('familymembers')->where('id',$id)->update($data);
                         
                 $notification=array(
                     'messege'=>'Familymembers Information Do Not Update!',
                     'alert-type'=>'success'
                      );
                      return Redirect()->route('all.family_info')->with($notification); 
            }
    }
}
