<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class PersonalInfoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        return view('admin.personal.create');
    }

    public function allinfo()
    {
        $person=DB::table('persons')->get();
        return view('admin.personal.index',compact('person'));
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
        $data['description']=$request->description;
        $data['achivment']=$request->achivment;


        $image=$request->file('image');
        if ($image) 
        {

            $image_name= date('dmy_H_s_i'); 
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/media/person/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
          
            $data['image']=$image_url;
            $person=DB::table('persons')->insert($data);
                   $notification=array(
                                      'messege'=>'Successfully User Information Inserted ',
                                      'alert-type'=>'success'
                                       );
            return Redirect()->back()->with($notification);                      
        }
        else
        {
            $person=DB::table('persons')->insert($data);
                   $notification=array(
                                      'messege'=>'Done!',
                                      'alert-type'=>'success'
                                      );
            return Redirect()->back()->with($notification); 
        }

    }


    public function ViewPerson($id)
    {
        $person=DB::table('persons')

                       ->where('persons.id',$id)
                       ->first();
       
        return view('admin.personal.show',compact('person'));

       
    }


    public function DeletePerson($id)
    {
    	$data=DB::table('persons')->where('id',$id)->first();
    	$image=$data->image;
    	unlink($image);

    	DB::table('persons')->where('id',$id)->delete();
    	$notification=array(
                        'messege'=>'Personal Info Delete Success',
                        'alert-type'=>'success'
                         );
        return Redirect()->back()->with($notification);   	

    }


    public function EditPerson($id)
    {   

        $person=DB::table('persons')->where('id',$id)->first();
        return view('admin.personal.edit',compact('person')); 
    }


    
    public function UpdatePerson(Request $request,$id)
    {
        

        $data=array();
        
        $data['firstname']=$request->firstname; 
        $data['lastname']=$request->lastname; 
        $data['email']=$request->email;
        $data['relagion']=$request->relagion;  
        $data['phone']=$request->phone;
        $data['birthdate']=$request->birthdate;  
        $data['job']=$request->job;
        $data['description']=$request->description;
        $data['achivment']=$request->achivment;


        

        $oldlogo=$request->old_logo;
        $image=$request->file('image');
            if ($image){              
                unlink($oldlogo);
                $image_name= date('dmy_H_s_i');
                $ext=strtolower($image->getClientOriginalExtension());
                $image_full_name=$image_name.'.'.$ext;
                $upload_path='public/media/person/';
                $image_url=$upload_path.$image_full_name;
                $success=$image->move($upload_path,$image_full_name);
              
                $data['image']=$image_url;
                $update = DB::table('persons')->where('id',$id)->update($data);
                        
                    $notification=array(
                     'messege'=>'Personal Information Update Success',
                     'alert-type'=>'success'
                    );
                    return Redirect()->route('all.person_info')->with($notification);                      
            }else{
                $update = DB::table('persons')->where('id',$id)->update($data);
                         
                 $notification=array(
                     'messege'=>'Personal Information Do Not Update!',
                     'alert-type'=>'success'
                      );
                      return Redirect()->route('all.person_info')->with($notification); 
            }



















        // $update = DB::table('persons')->where('id',$id)->update($data);

        // if ($update) {
        //     $notification=array(
        //                 'messege'=>'Personal Information Update Success',
        //                 'alert-type'=>'success'
        //                 );
        //     return Redirect()->route('all.person_info')->with($notification);
        // }
        // else
        // {

        //     $notification=array(
        //                 'messege'=>'Personal Information Do Not Update',
        //                 'alert-type'=>'success'
        //                 );
        //     return Redirect()->route('all.person_info')->with($notification);
        // } 
    }
}
