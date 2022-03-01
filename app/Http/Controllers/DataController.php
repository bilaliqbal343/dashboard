<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class DataController extends Controller
{
    public function index(Request $request)
    {
        
        $imagesPath = [];    
        foreach($request->profile_pic as $file) 
        {
            $new_file = time().$file->getClientOriginalName();

            $file->move('public/uploads/',$new_file);

            array_push($imagesPath,$new_file);
        }

        DB::table('users')->insert([
            'name' => $request->name,
            'city' => $request->city,
            'number' => $request->number,
            'gender' => $request->gender,
            'email' => $request->email,
            'profile_pic' => implode(',', $imagesPath),
            'dob' => $request->dob,
            'type' => $request->type,
            'password' => $request->password
        ]);
        

        return response()->json(['success'=> 'success'  ,'status' => 1 , 'message' => 'Account Created Successfully']);
    }
    
    
    public function insertdriver(Request $request)
    {
        $imagesPath = [];    
        foreach($request->profile_pic as $file) 
        {
            $new_file = time().$file->getClientOriginalName();

            $file->move('public/uploads/',$new_file);

            array_push($imagesPath,$new_file);
            
        }

        DB::table('users')->insert([
            'name' => $request->name,
            'father_name' => $request->father_name,
            'city' => $request->city,
            'number' => $request->number,
            'gender' => $request->gender,
            'email' => $request->email,
            'profile_pic' =>  (isset($imagesPath[0]) ? $imagesPath[0] : ''),
   
            'document_1'  => (isset($imagesPath[1]) ? $imagesPath[1] : ''),
            'document_2'  => (isset($imagesPath[2]) ? $imagesPath[2] : ''),
            'license_pic' => (isset($imagesPath[3]) ? $imagesPath[3] : ''),
            'nic_1'        => (isset($imagesPath[4]) ? $imagesPath[4] : ''),
            'nic_2'        => (isset($imagesPath[5]) ? $imagesPath[5] : ''),
            
            'dob' => $request->dob,
            'type' => $request->type,
            'car_color' => $request->car_color,
            'car_model' => $request->car_model,
            'car_number' => $request->car_number,
            'license_number' => $request->license_number,
            'nic' => $request->nic,
            'address' => $request->address,
            'password' => $request->password,
            'status' => '3'
        ]);
        

        return response()->json(['success'=> 'success'  ,'status' => 1 , 'message' => 'Account Created Successfully']);
    }

    
    
    public function update(Request $request)
    {
        $imagesPath = [];    
        foreach($request->images as $file) 
        {
            $new_file = time().$file->getClientOriginalName();

            $file->move('public/uploads/',$new_file);

            array_push($imagesPath,asset('public/uploads/'.$new_file));
        }

        DB::table('testing')->where('id',$request->id)->update([
            'field1' => $request->field1,
            'field2' => $request->field2,
            'field3' => $request->field3,
            'field4' => $request->field4,
            'field5' => $request->field5,
            'images' => implode(',', $imagesPath),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        return response()->json(['status' => True, 'message' => 'Data Updated Successfully']);
    }
}
