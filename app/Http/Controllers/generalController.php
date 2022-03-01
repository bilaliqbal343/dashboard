<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

use Illuminate\Support\Facades\Session;

class generalController extends Controller
{
    //
    public function admin_login(Request $request)
    {
       $user=DB::Table('admins')->where('email',$request['email'])->where('password',$request['password'])->first();
        
       if($user)
        {
            $request->session()->put('email',$request['email']);
            return redirect('/add_user');
        }
        else{
            session()->flash('msg','Invalid Email & Password');
            return view('welcome');
        }

    }
}
