<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class adminController extends Controller
{
    //

    public function __construct(){
        $this->middleware('check');
    }

    public function head(){
        return view('includes.head');
    }
    public function add_user(){
        return view('admin.add_user');
    }

    public function insert_user(Request $request){

        $file=$request->file('profile_pic');
        $profile_pic=$file->getClientOriginalName();
        $file->move('public/uploads/',$profile_pic);


        $file=$request->file('document_1');
        $document1=$file->getClientOriginalName();
        $file->move('public/uploads/',$document1);

        $file=$request->file('document_2');
        $document2=$file->getClientOriginalName();
        $file->move('public/uploads/',$document2);

        $file=$request->file('license_pic');
        $license_pic=$file->getClientOriginalName();
        $file->move('public/uploads/',$license_pic);


        $file=$request->file('nic_1');
        $nic1=$file->getClientOriginalName();
        $file->move('public/uploads/',$nic1);

        $file=$request->file('nic_2');
        $nic2=$file->getClientOriginalName();
        $file->move('public/uploads/',$nic2);



        $data=array(
            'name'=>$request['name'],
            'father_name'=>$request['father_name'],
            'dob'=>$request['dob'],
            'email'=>$request['email'],
            'number'=>$request['number_phoneCode'].$request['number'],
            //'code' => $request['number_phoneCode'],
            'password'=>$request['password'],
            'city'=>$request['city'],
            'car_model'=>$request['car_model'],
            'car_number'=>$request['car_number'],
            'car_color'=>$request['car_color'],
            'license_number'=>$request['license_number'],
            'nic'=>$request['nic'],
            'address'=>$request['address'],
            'profile_pic'=>$profile_pic,
            'document_1'=>$document1,
            'document_2'=>$document2,
            'license_pic'=>$license_pic,
            'nic_1'=>$nic1,
            'nic_2'=>$nic2
        );

        DB::Table('users')->insert($data);

       return redirect('/all_users');

    }
    public function all_users(){
        $users=DB::table('users')->where([
                ['type', '=', 'driver'],
                ['status', '!=', '3']
            ])->get();
            
        return view('admin.all_users',array('users'=>$users));
    }
    
    
    
    
    ////////////////all drivers inserted from app////////////////////
    
    
    public function insert_driver(Request $request){

        $file=$request->file('profile_pic');
        $profile_pic=$file->getClientOriginalName();
        $file->move('public/uploads/',$profile_pic);


        $file=$request->file('document_1');
        $document1=$file->getClientOriginalName();
        $file->move('public/uploads/',$document1);

        $file=$request->file('document_2');
        $document2=$file->getClientOriginalName();
        $file->move('public/uploads/',$document2);

        $file=$request->file('license_pic');
        $license_pic=$file->getClientOriginalName();
        $file->move('public/uploads/',$license_pic);


        $file=$request->file('nic_1');
        $nic1=$file->getClientOriginalName();
        $file->move('public/uploads/',$nic1);

        $file=$request->file('nic_2');
        $nic2=$file->getClientOriginalName();
        $file->move('public/uploads/',$nic2);



        $data=array(
            'name'=>$request['name'],
            'father_name'=>$request['father_name'],
            'dob'=>$request['dob'],
            'email'=>$request['email'],
            'number'=>$request['number_phoneCode'].$request['number'],
            //'code' => $request['number_phoneCode'],
            'password'=>$request['password'],
            'city'=>$request['city'],
            'car_model'=>$request['car_model'],
            'car_number'=>$request['car_number'],
            'car_color'=>$request['car_color'],
            'license_number'=>$request['license_number'],
            'nic'=>$request['nic'],
            'address'=>$request['address'],
            'profile_pic'=>$profile_pic,
            'document_1'=>$document1,
            'document_2'=>$document2,
            'license_pic'=>$license_pic,
            'nic_1'=>$nic1,
            'nic_2'=>$nic2
        );

        DB::Table('users')->insert($data);

       return redirect('/unactive_drivers');

    }
    public function unactive_drivers(){
        $users=DB::table('users')->where([
                ['type', '=', 'driver'],
                ['status', '=', '3']
            ])->get();
            
        return view('admin.unactive_drivers',array('users'=>$users));
    }
    
    
        ////////////////end drivers inserted from app////////////////////

    
    
    public function insert_puser(Request $request){


        $data=array(
            'name'=>$request['name'],
            
            'dob'=>$request['dob'],
            'email'=>$request['email'],
            'number'=>$request['number'],
            'city'=>$request['city']
            
           
            
        );

        DB::Table('users')->insert($data);

       return redirect('/all_pusers');

    }

    public function all_pusers(){
        $users=DB::table('users')->where('type','ride')->get();
        return view('admin.all_pusers',array('users'=>$users));
    }
    
    
    public function delete_user($id){
       DB::Table('users')->where('id',$id)->delete();
        return back();
    }
    public function edit_user($id){
        $user=DB::table('users')->where('id',$id)->get();
         return view('admin.edit_user',array('user'=>$user));
    }
    
    public function edit_puser($id){
        $user=DB::table('users')->where('id',$id)->get();
         return view('admin.edit_puser',array('user'=>$user));
    }
    public function update_user(Request $request){
        $file=$request->file('profile_pic');
        if(isset($file)){
            $profile_pic=$file->getClientOriginalName();
            $file->move('public/uploads/',$profile_pic);
        }
        else{
            $profile_pic=$request['edit_profile_pic'];
        }


        $file=$request->file('document_1');
        if(isset($file)){
            $document1=$file->getClientOriginalName();
            $file->move('public/uploads/', $document1);
        }
        else{
            $document1=$request['edit_document_1'];
        }


        $file=$request->file('document_2');
        if(isset($file)){
            $document2=$file->getClientOriginalName();
            $file->move('public/uploads/', $document2);
        }
        else{
            $document2=$request['edit_document_2'];
        }


        $file=$request->file('license_pic');
        if(isset($file)){
            $license_pic=$file->getClientOriginalName();
            $file->move('public/uploads/', $license_pic);
        }
        else{
            $license_pic=$request['edit_license_pic'];
        }


        $file=$request->file('nic_1');
        if(isset($file)){
            $nic1=$file->getClientOriginalName();
            $file->move('public/uploads/', $nic1);
        }
        else{
            $nic1=$request['edit_nic_1'];
        }


        $file=$request->file('nic_2');
        if(isset($file)){
            $nic2=$file->getClientOriginalName();
            $file->move('public/uploads/', $nic2);
        }
        else{
            $nic2=$request['edit_nic_2'];
        }

       $status=$request['status'];
        $data=array(
            'name'=>$request['name'],
            'father_name'=>$request['father_name'],
            'dob'=>$request['dob'],
            'email'=>$request['email'],
            'number'=>$request['number'],
            'city'=>$request['city'],
            'car_model'=>$request['car_model'],
            'car_number'=>$request['car_number'],
            'car_color'=>$request['car_color'],
            'license_number'=>$request['license_number'],
            'nic'=>$request['nic'],
            'address'=>$request['address'],
            'profile_pic'=>$profile_pic,
            'document_1'=>$document1,
            'document_2'=>$document2,
            'license_pic'=>$license_pic,
            'nic_1'=>$nic1,
            'nic_2'=>$nic2,
            'status'=>$status
        );


        DB::Table('users')->where('id',$request['id'])->update($data);

      return redirect('all_users');

    }
    public function count_all_users(){
       $users= DB::Table('users')->get();
       $count=count($users);
        return $count;
    }
    public function count_active_users(){
        $users= DB::Table('users')->where('status',1)->get();
        $count=count($users);
        return $count;
    }
    public function count_unactive_users(){
        $users= DB::Table('users')->where('status',0)->get();
        $count=count($users);
        return $count;
    }

    public function sign_out(Request $request){
        $request->session()->forget('email');
        return redirect('/');
    }
    
    
    
    
    
    ////////////////
    public function all_shared_rides(Request $request){


         $data=array(
            'driver_name'=>$request['driver_name'],
            'driver_number'=>$request['driver_number'],
            'car_number'=>$request['car_number'],
            'car_model'=>$request['car_model'],
            'car_color'=>$request['car_color'],
            'city'=>$request['city'],
            'start_name'=>$request['start_name'],
            'dest_name'=>$request['dest_name'],
            'seat_no'=>$request['seat_no'],
            'seat_cost'=>$request['seat_cost'],
            'time'=>$request['time'],
            'date'=>$request['date'],
            'status'=>$request['status']
        );

        DB::Table('share_ride')->insert($data);

       return redirect('/shared_rides');

    }

    public function shared_rides(){
        $users=DB::table('share_ride')->where('status','1')->get();
        return view('admin.shared_rides',array('users'=>$users));
    }
    
    
    
    
   
     public function update_ride(Request $request){
         
         $status='3';
         
        //  $data=array(
            // 'status'=>'3'
        // );
         
         DB::Table('share_ride')->where('id',$request['id'])->update(['status' => '3']);

      return redirect('shared_rides');
     }
     public function update_ride_status($id){
       DB::Table('share_ride')->where('id',$id)->update(['status' => '3']);
        return back();
    }
    
    
}
