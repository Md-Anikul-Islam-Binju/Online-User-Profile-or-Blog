<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class SingleUserController extends Controller
{


    public function single()
    {
    	return view('pages.single_user');
    }


    public function singlefamilymember($id)
    {
    	     $family=DB::table('familymembers')
                       ->where('familymembers.id',$id)
                       ->first();
       
             return view('pages.single_member',compact('family'));
    }
}
