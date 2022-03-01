<?php 
//header('Content-type:application/json');
header('Content-Type: application/json; Charset=UTF-8');
include 'includes/conffig.php';
require("includes/connect.php");
$conect = new connect();
//exit('True'); 
error_reporting(0);
?>

<?php

$operation = trim($_REQUEST['operation']);

$id = trim($_REQUEST['id']);
$token_id = trim($_REQUEST['token_id']);
$share_ride_id = trim($_REQUEST['share_ride_id']);
$name = trim($_REQUEST['name']);
$email = trim($_REQUEST['email']);
$gender = trim($_REQUEST['gender']);
$number = trim($_REQUEST['number']);
$dob = trim($_REQUEST['dob']);
$city = trim($_REQUEST['city']);
$type = trim($_REQUEST['type']);
$father_name = trim($_REQUEST['father_name']);
$car_model = trim($_REQUEST['car_model']);
$car_number = trim($_REQUEST['car_number']);
$car_color = trim($_REQUEST['car_color']);
$license_number = trim($_REQUEST['license_nnumber']);
$nic = trim($_REQUEST['nic']);
$address = trim($_REQUEST['address']);
$profile_pic = trim($_REQUEST['profile_pic']);
$rating = trim($_REQUEST['rating']);
$ride_id = trim($_REQUEST['ride_id']);
$ride_name = trim($_REQUEST['ride_name']);
$ride_number = trim($_REQUEST['ride_number']);
$seat_no = trim($_REQUEST['seat_no']);
$cost = trim($_REQUEST['cost']);
$seat_cost = trim($_REQUEST['seat_cost']);
$type = trim($_REQUEST['type']);
$status = trim($_REQUEST['status']);
$driver_id = trim($_REQUEST['driver_id']);
$driver_name = trim($_REQUEST['driver_name']);
$driver_number = trim($_REQUEST['driver_number']);
$driver_image = trim($_REQUEST['driver_image']);
$ride_image = trim($_REQUEST['ride_image']);
$start_lat = trim($_REQUEST['start_lat']);
$start_lan = trim($_REQUEST['start_lan']);
$start_name = trim($_REQUEST['start_name']);
$dest_lat = trim($_REQUEST['dest_lat']);
$dest_lan = trim($_REQUEST['dest_lan']);
$dest_name = trim($_REQUEST['dest_name']);
$date = trim($_REQUEST['date']);
$time = trim($_REQUEST['time']);
$ac = trim($_REQUEST['ac']);
$music = trim($_REQUEST['music']);
$smoking = trim($_REQUEST['smoking']);
$type = trim($_REQUEST['type']);
$request_status = trim($_REQUEST['request_status']);
$seat = trim($_REQUEST['seat']);
$seats = trim($_REQUEST['seats']);
$password = trim($_REQUEST['password']);
$booked_seats  = trim($_REQUEST['booked_seats']);
$live_lat = trim($_REQUEST['live_lat']);
$live_lan = trim($_REQUEST['live_lan']);


if(!isset($operation) || $operation == "") exit('There is no operation');





///////////////////////////////////////////////////////////
//firebase code
///////////////////////////////////////////////////////////
//firebase code
function send_notification($tokenid, $message, $title){
	
//	print_r($tokenid);
	
	#API access key from Google API's Console
    define( 'AAAAq1iE9Mk:APA91bGjVytX8VAIMthTPYAoM8nIZhVFlpIKv8MaqJPSOFTJ0DjNXcafQPBn25ZXH-AVHHW1FSNwFAOkiVEUQrZ0juMTBy1qSzxF_ic0pEXZg123Dg2UpLB961BT5asZhQYM0eWfm1GJ' );

	#prep the bundle
     $msg = array
          (
		'body' 	=> $message,
		'title'	=> $title,
             	'icon'	=> 'myicon',/*Default Icon*/
              	'sound' => 'mySound',/*Default sound*/
				 'vibrate' => 1,
          );
	$data = array
    (
         "city" => $city,
         "blood" => $blood,
         "name" => $name,
         "phone" => $phone
		 );

	$fields = array
			(
				'to'		=> $tokenid,
				'notification'	=> $msg,
			//	'data' => $data
			);
	
	
	$headers = array
			(
				'Authorization: key=' . API_ACCESS_KEY,
				'Content-Type: application/json'
			);
#Send Reponse To FireBase Server	
		$ch = curl_init();
		curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
		curl_setopt( $ch,CURLOPT_POST, true );
		curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
		curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
		curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
		curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
		$result = curl_exec($ch );
		curl_close( $ch );
#Echo Result Of FireBase Server
//echo $result;
	
	
}


/////////////////////////////////////////////////////////////



/////////////////////////////////////////////////////////

$i = explode(',',$treatment_ids);


////////////////////////////////////////////////////////////

//login
if($operation && $operation == 'login' && $number && $password && $token_id)
{ 
    
	
	$select = 'select * from users where number="'.$number.'" AND password="'.$password.'" ';
	$query 	= $conect->select_custom($select);
	
	
	$conect->update("users",
    	"`token_id`='$token_id' " , "`number`='$number' ");


	if($query->num_rows > 0)
	{
		$JsonArray   = array();
		$JsonArray[] = array('response'=>'1');
		while($num   =  $query->fetch_assoc()){
		$JsonArray[] = $num;
	}
		echo json_encode(array('JsonData'=>$JsonArray),  JSON_PRETTY_PRINT);
	}
	else
	{
		$JsonArray   = array();
		$JsonArray[] = array('response'=>'0', 'response-text'=>"Incorrect username / password !");
		echo json_encode(array('JsonData'=>$JsonArray),JSON_PRETTY_PRINT);
	}
}



//number verification
if($operation && $operation == 'verify' && $number)
{ 
    
	$select = 'select * from users where number="'.$number.'" ';
	$query 	= $conect->select_custom($select);

	if($query->num_rows > 0)
	{
		$JsonArray   = array();

		$JsonArray[] = array('response'=>'1', 'response-text'=>'Number already used');
		echo json_encode(array('JsonData'=>$JsonArray),JSON_PRETTY_PRINT);
	}
	else
	{
		$JsonArray   = array();
		$JsonArray[] = array('response'=>'0', 'response-text'=>"This number does not exist");
		echo json_encode(array('JsonData'=>$JsonArray),JSON_PRETTY_PRINT);
	}
}




//register 
elseif($operation && $operation == 'register' && $name && $city && $number 
			&& $gender &&  $email && $dob && $type && $password )
{ 

if($conect->insert("users","`name`,`city`,`number`,`gender`,`email`,`dob`,`password`,
		`type`",
"'$name','$city','$number','$gender','$email','$dob','$password','$type' "))
	{

		$JsonArray   = array();
		$JsonArray[] = array('response'=>'1', 'response-text'=>'Register successfully!');
		echo json_encode(array('JsonData'=>$JsonArray),JSON_PRETTY_PRINT);
	}
	
		elseif(mysql_errno() == 1062)
		{
			$JsonArray   = array();
			$JsonArray[] = array('response'=>'0', 'response-text'=>'Mobile already exists');
			echo json_encode(array('JsonData'=>$JsonArray),JSON_PRETTY_PRINT);
		} 
		else
		{
			$JsonArray   = array();
			$JsonArray[] = array('response'=>'0', 'response-text'=>mysql_error());
			echo json_encode(array('JsonData'=>$JsonArray),JSON_PRETTY_PRINT);
		}
}




//load rProfile
elseif($operation && $operation == 'profile' && $id)
{ 
	
	$select = 'select * from users where id="'.$id.'" ';
	$query 	= $conect->select_custom($select);
	
	if($query->num_rows > 0)
	{
		$JsonArray   = array();
		$JsonArray[] = array('response'=>'1');
		while($num   =  $query->fetch_assoc()){
		$JsonArray[] = $num;
	}
		echo json_encode(array('JsonData'=>$JsonArray),  JSON_PRETTY_PRINT);
	}
	else
	{
		$JsonArray   = array();
		$JsonArray[] = array('response'=>'0', 'response-text'=>'No record found');
		echo json_encode(array('JsonData'=>$JsonArray),JSON_PRETTY_PRINT);
	}
}






//share ride 
elseif($operation && $operation == 'share_ride' && $driver_id && $driver_name && $driver_number && $car_number && $car_model && $car_color
			&& $city &&  $start_lat && $start_lan && $start_name && $dest_lat && $dest_lan && $dest_name && $seat_no
			&& $seat_cost && $time && $date && $music && $ac && $smoking && $status && $profile_pic && $rating && $booked_seats)
{ 

if($conect->insert("share_ride","`driver_id`,`driver_name`,`driver_number`,`car_number`,`car_model`,`car_color`,`city`,
		`start_lat`,`start_lan`,`start_name`,`dest_lat`,`dest_lan`,`dest_name`,`seat_no`,`seat_cost`,`time`,`date`,`music`
		,`ac`,`smoking`,`status`,`driver_image`,`rating`,`booked_seats`",
        "'$driver_id','$driver_name','$driver_number','$car_number','$car_model','$car_color','$city','$start_lat','$start_lan','$start_name'
        ,'$dest_lat','$dest_lan','$dest_name','$seat_no','$seat_cost','$time','$date','$music','$ac','$smoking','$status','$profile_pic'
        ,'$rating','$booked_seats'"))
	{

		$JsonArray   = array();
		$JsonArray[] = array('response'=>'1', 'response-text'=>'Ride successfully shared !');
		echo json_encode(array('JsonData'=>$JsonArray),JSON_PRETTY_PRINT);
		
		
	// //////////////////notifications
    $select = 'select * from users';
	$query 	= $conect->select_custom($select);
	
	while($token = $query->fetch_assoc()){
		
    $token_id = $token['token_id'];
    $message = $driver_name.' '.'shared a new ride';
    $title = 'Ride request update';
   
	print_r($token_id);
	send_notification($token_id, $message, $title);
	}	
		
	}
	
		elseif(mysql_errno() == 1062)
		{
			$JsonArray   = array();
			$JsonArray[] = array('response'=>'0', 'response-text'=>'already exists');
			echo json_encode(array('JsonData'=>$JsonArray),JSON_PRETTY_PRINT);
		} 
		else
		{
			$JsonArray   = array();
			$JsonArray[] = array('response'=>'0', 'response-text'=>mysql_error());
			echo json_encode(array('JsonData'=>$JsonArray),JSON_PRETTY_PRINT);
		}
}





//driver my rides
elseif($operation && $operation == 'driver_rides' && $driver_id)
{ 
	
	$select = 'select * from share_ride where driver_id="'.$driver_id.'" AND status="1" ORDER BY id DESC';
	$query 	= $conect->select_custom($select);
	
	if($query->num_rows > 0)
	{
		$JsonArray   = array();
		$JsonArray[] = array('response'=>'1');
		while($num   =  $query->fetch_assoc()){
		$JsonArray[] = $num;
	}
		echo json_encode(array('JsonData'=>$JsonArray),  JSON_PRETTY_PRINT);
	}
	else
	{
		$JsonArray   = array();
		$JsonArray[] = array('response'=>'0', 'response-text'=>'No ride found');
		echo json_encode(array('JsonData'=>$JsonArray),JSON_PRETTY_PRINT);
	}
}






//driver ride requests
elseif($operation && $operation == 'driver_requests' && $driver_id && $share_ride_id)
{ 
	
	$select = 'select * from request_ride where driver_id="'.$driver_id.'" AND share_ride_id="'.$share_ride_id.'" AND request_status="1" ORDER BY id DESC';
	$query 	= $conect->select_custom($select);
	
	if($query->num_rows > 0)
	{
		$JsonArray   = array();
		$JsonArray[] = array('response'=>'1');
		while($num   =  $query->fetch_assoc()){
		$JsonArray[] = $num;
	}
		echo json_encode(array('JsonData'=>$JsonArray),  JSON_PRETTY_PRINT);
	}
	else
	{
		$JsonArray   = array();
		$JsonArray[] = array('response'=>'0', 'response-text'=>'No ride found');
		echo json_encode(array('JsonData'=>$JsonArray),JSON_PRETTY_PRINT);
	}
}




//change ride request status
elseif($operation && $operation == 'change_status' && $id && $status && $ride_id)
{ 
	if($conect->update("request_ride",
    	"`status`='$status' " , "`id`='$id' ")){

		$JsonArray = array();
		$JsonArray[] = array('response'=>'1', 'response-text'=>'Status request updated!');
		echo json_encode(array('JsonData'=>$JsonArray),JSON_PRETTY_PRINT); 
	}
	else{
		$JsonArray = array();
		$JsonArray[] = array('response'=>'0', 'response-text'=>'Unable to update');
		echo json_encode(array('JsonData'=>$JsonArray),JSON_PRETTY_PRINT);
	}
	
	
	
	//notification status changed
	$select = 'select * from users where id="'.$ride_id.'" ';
	$query 	= $conect->select_custom($select);
	
	
	while($token = $query->fetch_assoc()){
		
    $token_id = $token['token_id'];
	print_r($token_id);
	send_notification($token_id,'You have an update on your journey requested','Status request updated !');
		
	}
	
		
}




//insert driver history
elseif($operation && $operation == 'driver_history' && $driver_id && $name && $time 
			&& $date &&  $start_name && $dest_name && $seats && $cost )
{ 

if($conect->insert("driver_history","`driver_id`,`name`,`time`,`date`,`start_name`,`dest_name`,`seats`,
		`cost`",
"'$driver_id','$name','$time','$date','$start_name','$dest_name','$seats','$cost' "))
	{

		$JsonArray   = array();
		$JsonArray[] = array('response'=>'1', 'response-text'=>'Register successfully!');
		echo json_encode(array('JsonData'=>$JsonArray),JSON_PRETTY_PRINT);
	}
	
		elseif(mysql_errno() == 1062)
		{
			$JsonArray   = array();
			$JsonArray[] = array('response'=>'0', 'response-text'=>'Mobile already exists');
			echo json_encode(array('JsonData'=>$JsonArray),JSON_PRETTY_PRINT);
		} 
		else
		{
			$JsonArray   = array();
			$JsonArray[] = array('response'=>'0', 'response-text'=>mysql_error());
			echo json_encode(array('JsonData'=>$JsonArray),JSON_PRETTY_PRINT);
		}
}





//get driver history
elseif($operation && $operation == 'd_history' && $driver_id )
{ 

    $select = 'select * from driver_history where driver_id="'.$driver_id.'" ORDER BY id DESC';
	$query 	= $conect->select_custom($select);
	
	if($query->num_rows > 0)
	{
		$JsonArray   = array();
		$JsonArray[] = array('response'=>'1');
		while($num   =  $query->fetch_assoc()){
		$JsonArray[] = $num;
	}
		echo json_encode(array('JsonData'=>$JsonArray),  JSON_PRETTY_PRINT);
	}
	else
	{
		$JsonArray   = array();
		$JsonArray[] = array('response'=>'0', 'response-text'=>'No record found');
		echo json_encode(array('JsonData'=>$JsonArray),JSON_PRETTY_PRINT);
	}
}




//update seats booked in share ride
elseif($operation && $operation == 'update_seat' && $id && $booked_seats)
{ 
	if($conect->update("share_ride",
    	"`booked_seats`='$booked_seats' " , "`id`='$id' ")){

		$JsonArray = array();
		$JsonArray[] = array('response'=>'1', 'response-text'=>'Number of seats updated!');
		echo json_encode(array('JsonData'=>$JsonArray),JSON_PRETTY_PRINT); 
	}
	else{
		$JsonArray = array();
		$JsonArray[] = array('response'=>'0', 'response-text'=>'Unable to update');
		echo json_encode(array('JsonData'=>$JsonArray),JSON_PRETTY_PRINT);
	}
		
}



//ride apis
//load all rides
elseif($operation && $operation == 'all_rides' )
{ 
	
	$select = 'select * from share_ride where status="1" ORDER BY id DESC ';
	$query 	= $conect->select_custom($select);
	
	if($query->num_rows > 0)
	{
		$JsonArray   = array();
		$JsonArray[] = array('response'=>'1');
		while($num   =  $query->fetch_assoc()){
		$JsonArray[] = $num;
	
	}           
		echo json_encode(array('JsonData'=>$JsonArray),  JSON_PRETTY_PRINT);
	}
	else
	{
		$JsonArray   = array();
		$JsonArray[] = array('response'=>'0', 'response-text'=>'No ride found');
		echo json_encode(array('JsonData'=>$JsonArray),JSON_PRETTY_PRINT);
	}



//get all ride_id ti get their tokens
// 	$select = 'select * from share_ride where status="1" ORDER BY id DESC ';
// 	$query 	= $conect->select_custom($select);
	
// 	while($token = $query->fetch_assoc()){
		
//         $rdate = $token['date'];
    
//     if($date >= $rdate){
   
//     $found = 'yes';
//     //send notification of ride started to all customers
//     $select = 'select * from share_ride where date = "'.$rdate.'" AND status="1" ORDER BY id DESC ';
// 	$query 	= $conect->select_custom($select);


// if($query->num_rows > 0)
// 	{
// 		$JsonArray   = array();
// 		$JsonArray[] = array('response'=>'1');
// 		while($num   =  $query->fetch_assoc()){
// 		$JsonArray[] = $num;
	
// 	}           
// 		echo json_encode(array('JsonData'=>$JsonArray),  JSON_PRETTY_PRINT);
// 	}
// 	else
// 	{
// 		$JsonArray   = array();
// 		$JsonArray[] = array('response'=>'0', 'response-text'=>'No race found');
// 		echo json_encode(array('JsonData'=>$JsonArray),JSON_PRETTY_PRINT);
// 	}


// }


// 	}

//         if($found != 'yes'){
            
//         $JsonArray   = array();
// 		$JsonArray[] = array('response'=>'0', 'response-text'=>'No race found');
// 		echo json_encode(array('JsonData'=>$JsonArray),JSON_PRETTY_PRINT);
//         }


}





//request ride 
elseif($operation && $operation == 'request_ride' && $driver_id && $driver_name && $driver_number && $car_number && $car_model && $car_color
		 &&  $start_lat && $start_lan && $start_name && $dest_lat && $dest_lan && $dest_name && $seat_no
			&& $cost && $time && $date && $music && $ac && $smoking && $request_status && $rating && $booked_seats
			&& $driver_image && $share_ride_id && $ride_id && $ride_name && $ride_number && $status && $ride_image)
{ 

if($conect->insert("request_ride","`driver_id`,`driver_name`,`driver_number`,`car_number`,`car_model`,`car_color`,
		`start_lat`,`start_lan`,`start_name`,`dest_lat`,`dest_lan`,`dest_name`,`seat_no`,`cost`,`time`,`date`,`music`
		,`ac`,`smoking`,`request_status`,`rating`,`booked_seats`
		,`driver_image`,`share_ride_id`,`ride_id`,`ride_name`,`ride_number` ,`status` ,`ride_image`",
        "'$driver_id','$driver_name','$driver_number','$car_number','$car_model','$car_color','$start_lat','$start_lan','$start_name'
        ,'$dest_lat','$dest_lan','$dest_name','$seat_no','$cost','$time','$date','$music','$ac','$smoking','$request_status'
        ,'$rating','$booked_seats', '$driver_image', '$share_ride_id', '$ride_id', '$ride_name', '$ride_number' , '$status', '$ride_image'"))
	{

		$JsonArray   = array();
		$JsonArray[] = array('response'=>'1', 'response-text'=>'Request successfully sent!');
		echo json_encode(array('JsonData'=>$JsonArray),JSON_PRETTY_PRINT);
	}
	
		elseif(mysql_errno() == 1062)
		{
			$JsonArray   = array();
			$JsonArray[] = array('response'=>'0', 'response-text'=>'already exists');
			echo json_encode(array('JsonData'=>$JsonArray),JSON_PRETTY_PRINT);
		} 
		else
		{
			$JsonArray   = array();
			$JsonArray[] = array('response'=>'0', 'response-text'=>mysql_error());
			echo json_encode(array('JsonData'=>$JsonArray),JSON_PRETTY_PRINT);
		}
		
		
		
		
		
	$select = 'select * from users where id="'.$driver_id.'" ';
	$query 	= $conect->select_custom($select);
	
	
	while($token = $query->fetch_assoc()){
		
    $token_id = $token['token_id'];
    $message = 'You have received a reservation request from'.' '.$driver_name;
    $title = 'Reservation request';
   
	print_r($token_id);
	send_notification($token_id, $message, $title);
		
	}
		
		
		
}




//ride my rides
elseif($operation && $operation == 'ride_requests' && $ride_id )
{ 
	
	$select = 'select * from request_ride where ride_id="'.$ride_id.'" AND request_status="1"  ORDER BY id DESC';
	$query 	= $conect->select_custom($select);
	
	if($query->num_rows > 0)
	{
		$JsonArray   = array();
		$JsonArray[] = array('response'=>'1');
		while($num   =  $query->fetch_assoc()){
		$JsonArray[] = $num;
	}
		echo json_encode(array('JsonData'=>$JsonArray),  JSON_PRETTY_PRINT);
	}
	else
	{
		$JsonArray   = array();
		$JsonArray[] = array('response'=>'0', 'response-text'=>'No ride found');
		echo json_encode(array('JsonData'=>$JsonArray),JSON_PRETTY_PRINT);
	}
}






//insert ride history
elseif($operation && $operation == 'ride_history' && $ride_id && $driver_name && $time 
			&& $date &&  $start_name && $dest_name && $seats && $cost )
{ 

if($conect->insert("ride_history","`ride_id`,`driver_name`,`time`,`date`,`start_name`,`dest_name`,`seats`,
		`cost`",
"'$ride_id','$driver_name','$time','$date','$start_name','$dest_name','$seats','$cost' "))
	{

		$JsonArray   = array();
		$JsonArray[] = array('response'=>'1', 'response-text'=>'Registered successfully!');
		echo json_encode(array('JsonData'=>$JsonArray),JSON_PRETTY_PRINT);
	}
	
		elseif(mysql_errno() == 1062)
		{
			$JsonArray   = array();
			$JsonArray[] = array('response'=>'0', 'response-text'=>'No history found');
			echo json_encode(array('JsonData'=>$JsonArray),JSON_PRETTY_PRINT);
		} 
		else
		{
			$JsonArray   = array();
			$JsonArray[] = array('response'=>'0', 'response-text'=>mysql_error());
			echo json_encode(array('JsonData'=>$JsonArray),JSON_PRETTY_PRINT);
		}
}





//get ride history
elseif($operation && $operation == 'r_history' && $ride_id )
{ 

    $select = 'select * from ride_history where ride_id="'.$ride_id.'" ORDER BY id DESC';
	$query 	= $conect->select_custom($select);
	
	if($query->num_rows > 0)
	{
		$JsonArray   = array();
		$JsonArray[] = array('response'=>'1');
		while($num   =  $query->fetch_assoc()){
		$JsonArray[] = $num;
	}
		echo json_encode(array('JsonData'=>$JsonArray),  JSON_PRETTY_PRINT);
	}
	else
	{
		$JsonArray   = array();
		$JsonArray[] = array('response'=>'0', 'response-text'=>'No record found');
		echo json_encode(array('JsonData'=>$JsonArray),JSON_PRETTY_PRINT);
	}
}




//start ride
elseif($operation && $operation == 'start_ride' && $id && $request_status)
{ 
	if($conect->update("request_ride",
    	"`ride_started`='$request_status' " , "`share_ride_id`='$id' ")){

		$JsonArray = array();
		$JsonArray[] = array('response'=>'1', 'response-text'=>'Status request updated!');
		echo json_encode(array('JsonData'=>$JsonArray),JSON_PRETTY_PRINT); 
	}
	else{
		$JsonArray = array();
		$JsonArray[] = array('response'=>'0', 'response-text'=>'Unable to update');
		echo json_encode(array('JsonData'=>$JsonArray),JSON_PRETTY_PRINT);
	}
	
	
	
	
	//get all ride_id ti get their tokens
	$select = 'select * from request_ride where share_ride_id="'.$id.'"  AND ride_started="00" ';
	$query 	= $conect->select_custom($select);
	
	while($token = $query->fetch_assoc()){
		
    $ride_id = $token['ride_id'];
    
    
    
    //send notification of ride started to all customers
    $select = 'select token_id from users where id="'.$ride_id.'" ';
	$query 	= $conect->select_custom($select);


	while($token = $query->fetch_assoc()){
		
    $token_id = $token['token_id'];
    $message = "Your Ride is on the way! Open the app to track the ride";
    $title = 'Start of the ride';
   
	print_r($token_id);
	send_notification($token_id, $message, $title);
		
	}



	print_r($ride_id); 

	}
	


		
}




//send lat lan update live
elseif($operation && $operation == 'live_loc' && $id && $live_lat && $live_lan)
{ 
	if($conect->update("share_ride",
    	"`live_lat`='$live_lat' , `live_lan`='$live_lan',  `status`='2' " , "`id`='$id' ")){

		$JsonArray = array();
		$JsonArray[] = array('response'=>'1', 'response-text'=>'Status request updated!');
		echo json_encode(array('JsonData'=>$JsonArray),JSON_PRETTY_PRINT); 
	}
	else{
		$JsonArray = array();
		$JsonArray[] = array('response'=>'0', 'response-text'=>'Unable to update');
		echo json_encode(array('JsonData'=>$JsonArray),JSON_PRETTY_PRINT);
	}
		
}




//end ride
elseif($operation && $operation == 'end_ride' && $id && $status)
{ 
	if($conect->update("share_ride",
    	"`status`='$status' " , "`id`='$id' ")){

		$JsonArray = array();
		$JsonArray[] = array('response'=>'1', 'response-text'=>'Request status updated!');
		echo json_encode(array('JsonData'=>$JsonArray),JSON_PRETTY_PRINT); 
	}
	else{
		$JsonArray = array();
		$JsonArray[] = array('response'=>'0', 'response-text'=>'Unable to update');
		echo json_encode(array('JsonData'=>$JsonArray),JSON_PRETTY_PRINT);
	}
		
}

elseif($operation && $operation == 'end_ride2' && $id && $request_status)
{ 
	if($conect->update("request_ride",
    	"`request_status`='$request_status' " , "`share_ride_id`='$id' ")){

		$JsonArray = array();
		$JsonArray[] = array('response'=>'1', 'response-text'=>'Request status updated!');
		echo json_encode(array('JsonData'=>$JsonArray),JSON_PRETTY_PRINT); 
	}
	else{
		$JsonArray = array();
		$JsonArray[] = array('response'=>'0', 'response-text'=>'Unable to update');
		echo json_encode(array('JsonData'=>$JsonArray),JSON_PRETTY_PRINT);
	}
	
	
	
	
	
	//get all ride_id ti get their tokens
	$select = 'select * from request_ride where share_ride_id="'.$id.'"  AND request_status="00" ';
	$query 	= $conect->select_custom($select);
	
	while($token = $query->fetch_assoc()){
		
    $ride_id = $token['ride_id'];
    
    
    
    //send notification of ride started to all customers
    $select = 'select token_id from users where id="'.$ride_id.'" ';
	$query 	= $conect->select_custom($select);


	while($token = $query->fetch_assoc()){
		
    $token_id = $token['token_id'];
    $message = 'Thank you for Using our Services. Your Ride Ended Safetly.';
    $title = 'Ride Ended';
   
	print_r($token_id);
	send_notification($token_id, $message, $title);
		
	}



	print_r($ride_id); 

	}
	
		
}





//get driver live location
elseif($operation && $operation == 'driver_live' && $share_ride_id)
{ 
	
	$select = 'select * from share_ride where id="'.$share_ride_id.'" ';
	$query 	= $conect->select_custom($select);
	
	if($query->num_rows > 0)
	{
		$JsonArray   = array();
		$JsonArray[] = array('response'=>'1');
		while($num   =  $query->fetch_assoc()){
		$JsonArray[] = $num;
	}
		echo json_encode(array('JsonData'=>$JsonArray),  JSON_PRETTY_PRINT);
	}
	else
	{
		$JsonArray   = array();
		$JsonArray[] = array('response'=>'0', 'response-text'=>'No ride found');
		echo json_encode(array('JsonData'=>$JsonArray),JSON_PRETTY_PRINT);
	}
}





//update rating
elseif($operation && $operation == 'rating' && $id && $rating)
{ 
	if($conect->update("users",
    	"`rating`='$rating' " , "`id`='$id' ")){

		$JsonArray = array();
		$JsonArray[] = array('response'=>'1', 'response-text'=>'Request status updated!');
		echo json_encode(array('JsonData'=>$JsonArray),JSON_PRETTY_PRINT); 
	}
	else{
		$JsonArray = array();
		$JsonArray[] = array('response'=>'0', 'response-text'=>'Unable to update');
		echo json_encode(array('JsonData'=>$JsonArray),JSON_PRETTY_PRINT);
	}
		
}




//logout
elseif($operation && $operation == 'logout' && $token_id && $id)
{ 
	if($conect->update("users",
    	"`token_id`='$token_id' " , "`id`='$id' ")){

		$JsonArray = array();
		$JsonArray[] = array('response'=>'1', 'response-text'=>'Request status updated!');
		echo json_encode(array('JsonData'=>$JsonArray),JSON_PRETTY_PRINT); 
	}
	else{
		$JsonArray = array();
		$JsonArray[] = array('response'=>'0', 'response-text'=>'Unable to update');
		echo json_encode(array('JsonData'=>$JsonArray),JSON_PRETTY_PRINT);
	}
		
}




//////////new updates



//admin insert
elseif($operation && $operation == 'admin_add' && $email && $password )
{ 

if($conect->insert("admins","`email`,`password`", "'$email','$password' "))
	{

		$JsonArray   = array();
		$JsonArray[] = array('response'=>'1', 'response-text'=>'Register successfully!');
		echo json_encode(array('JsonData'=>$JsonArray),JSON_PRETTY_PRINT);
	}
	
		elseif(mysql_errno() == 1062)
		{
			$JsonArray   = array();
			$JsonArray[] = array('response'=>'0', 'response-text'=>'User already exists');
			echo json_encode(array('JsonData'=>$JsonArray),JSON_PRETTY_PRINT);
		} 
		else
		{
			$JsonArray   = array();
			$JsonArray[] = array('response'=>'0', 'response-text'=>mysql_error());
			echo json_encode(array('JsonData'=>$JsonArray),JSON_PRETTY_PRINT);
		}
}




//admin login 
if($operation && $operation == 'admin_login' && $email && $password )
{ 
    
	
	$select = 'select * from admins where email="'.$email.'" AND password="'.$password.'" ';
	$query 	= $conect->select_custom($select);
	
	

	if($query->num_rows > 0)
	{
		$JsonArray   = array();
		$JsonArray[] = array('response'=>'1');
		while($num   =  $query->fetch_assoc()){
		$JsonArray[] = $num;
	}
		echo json_encode(array('JsonData'=>$JsonArray),  JSON_PRETTY_PRINT);
	}
	else
	{
		$JsonArray   = array();
		$JsonArray[] = array('response'=>'0', 'response-text'=>'Incorrect username/password!');
		echo json_encode(array('JsonData'=>$JsonArray),JSON_PRETTY_PRINT);
	}
}




//admin update 
elseif($operation && $operation == 'admin_update' && $email && $password)
{ 
	if($conect->update("admins",
    	"`email`='$email' " , "`password`='$password' ")){

		$JsonArray = array();
		$JsonArray[] = array('response'=>'1', 'response-text'=>'Mis a jour!');
		echo json_encode(array('JsonData'=>$JsonArray),JSON_PRETTY_PRINT); 
	}
	else{
		$JsonArray = array();
		$JsonArray[] = array('response'=>'0', 'response-text'=>'Unable to update');
		echo json_encode(array('JsonData'=>$JsonArray),JSON_PRETTY_PRINT);
	}
		
}





//admin delete 
elseif($operation && $operation == 'admin_delete' && $email )
{ 
	if($conect->delete("admins",
    	"`email`='$email'  ")){

		$JsonArray = array();
		$JsonArray[] = array('response'=>'1', 'response-text'=>'User Record Deleted!');
		echo json_encode(array('JsonData'=>$JsonArray),JSON_PRETTY_PRINT); 
	}
	else{
		$JsonArray = array();
		$JsonArray[] = array('response'=>'0', 'response-text'=>'Unable to update');
		echo json_encode(array('JsonData'=>$JsonArray),JSON_PRETTY_PRINT);
	}
		
}


//driver cancel ride
elseif($operation && $operation == 'delete_ride' && $id && $status && $driver_name)
{ 
    
    $conect->update("request_ride",
    	"`status`='$status',request_status='Dcanceled' " , "`share_ride_id`='$id' ");
    
    
	if($conect->update("share_ride",
    	"`status`='$status' " , "`id`='$id' ")){

		$JsonArray = array();
		$JsonArray[] = array('response'=>'1', 'response-text'=>'Ride Canceled Successfully!');
		echo json_encode(array('JsonData'=>$JsonArray),JSON_PRETTY_PRINT); 
	}
	else{
		$JsonArray = array();
		$JsonArray[] = array('response'=>'0', 'response-text'=>'Unsuccessfull!');
		echo json_encode(array('JsonData'=>$JsonArray),JSON_PRETTY_PRINT);
	}
	
	


//////////////////notifications

    //get all ride rides
    $select = 'select * from request_ride where share_ride_id="'.$id.'" ';
	$query 	= $conect->select_custom($select);
	
		$JsonArray   = array();
		$JsonArray[] = array('response'=>'1');
		while($num   =  $query->fetch_assoc()){
		$JsonArray[] = $num[ride_id];
// 		print_r($num[ride_id]);
	}
	
	
	//get all token_id from users table with ride ids
	foreach($JsonArray as $value){
		
		 $select = 'select token_id from users where id="'.$value.'" ';
	     $query 	= $conect->select_custom($select);
		
		while($token = $query->fetch_assoc()){
		
    $token_id = $token['token_id'];
    $message = 'Your Scheduled Ride was Canceled by.'.' '.$driver_name;
    $title = 'Ride Canceled';
   
// 	print_r($token_id);
	send_notification($token_id, $message, $title);
		
	}
		
	}
		
}




//ride cancel ride
elseif($operation && $operation == 'cancel_ride' && $id && $share_ride_id && $status && $ride_name && $booked_seats && $driver_id)
{ 

    //get total booked seats value
    $select = 'select * from share_ride where id="'.$share_ride_id.'" ';
	$query 	= $conect->select_custom($select);
	
	while($token = $query->fetch_assoc()){
    $totalBookedseats = $token['booked_seats'];
	print_r($token_id);
	}
	
    $seats = $totalBookedseats - $booked_seats;
    if($booked_seats > 00){
    $conect->update("share_ride",
    	"`booked_seats`='$seats' " , "`id`='$share_ride_id' ");
    }
    
    
	if($conect->update("request_ride",
    	"`status`='$status', request_status='Rcanceled' " , "`id`='$id' ")){

		$JsonArray = array();
		$JsonArray[] = array('response'=>'1', 'response-text'=>'Ride Canceled Successfully!');
		echo json_encode(array('JsonData'=>$JsonArray),JSON_PRETTY_PRINT); 
	}
	else{
		$JsonArray = array();
		$JsonArray[] = array('response'=>'0', 'response-text'=>'Unsuccessfull!');
		echo json_encode(array('JsonData'=>$JsonArray),JSON_PRETTY_PRINT);
	}
	
	


// //////////////////notifications
    $select = 'select * from users where id="'.$driver_id.'" ';
	$query 	= $conect->select_custom($select);
	
	
	while($token = $query->fetch_assoc()){
		
    $token_id = $token['token_id'];
    $message = $ride_name.' '.'has canceled the Ride';
    $title = 'Ride request update';
   
	print_r($token_id);
	send_notification($token_id, $message, $title);
		
	}

		
}





//load all drivers
elseif($operation && $operation == 'all_drivers' )
{ 
	
	$select = 'select * from users where type = "driver" AND status = "1" ORDER BY id DESC ';
	$query 	= $conect->select_custom($select);
	
	if($query->num_rows > 0)
	{
		$JsonArray   = array();
		$JsonArray[] = array('response'=>'1');
		while($num   =  $query->fetch_assoc()){
		$JsonArray[] = $num;
	}
		echo json_encode(array('JsonData'=>$JsonArray),  JSON_PRETTY_PRINT);
	}
	else
	{
		$JsonArray   = array();
		$JsonArray[] = array('response'=>'0', 'response-text'=>'No ride found');
		echo json_encode(array('JsonData'=>$JsonArray),JSON_PRETTY_PRINT);
	}
}






//update ride
// elseif($operation && $operation == 'share_ride' && $driver_id && $driver_name && $driver_number && $car_number && $car_model && $car_color
// 			&& $city &&  $start_lat && $start_lan && $start_name && $dest_lat && $dest_lan && $dest_name && $seat_no
// 			&& $seat_cost && $time && $date && $music && $ac && $smoking && $status && $profile_pic && $rating && $booked_seats)
// { 

// if($conect->insert("share_ride","`driver_id`,`driver_name`,`driver_number`,`car_number`,`car_model`,`car_color`,`city`,
// 		`start_lat`,`start_lan`,`start_name`,`dest_lat`,`dest_lan`,`dest_name`,`seat_no`,`seat_cost`,`time`,`date`,`music`
// 		,`ac`,`smoking`,`status`,`driver_image`,`rating`,`booked_seats`",
//         "'$driver_id','$driver_name','$driver_number','$car_number','$car_model','$car_color','$city','$start_lat','$start_lan','$start_name'
//         ,'$dest_lat','$dest_lan','$dest_name','$seat_no','$seat_cost','$time','$date','$music','$ac','$smoking','$status','$profile_pic'
//         ,'$rating','$booked_seats'"))
// 	{

// 		$JsonArray   = array();
// 		$JsonArray[] = array('response'=>'1', 'response-text'=>'Ride Shared successfully!');
// 		echo json_encode(array('JsonData'=>$JsonArray),JSON_PRETTY_PRINT);
// 	}
	
// 		elseif(mysql_errno() == 1062)
// 		{
// 			$JsonArray   = array();
// 			$JsonArray[] = array('response'=>'0', 'response-text'=>'already exists');
// 			echo json_encode(array('JsonData'=>$JsonArray),JSON_PRETTY_PRINT);
// 		} 
// 		else
// 		{
// 			$JsonArray   = array();
// 			$JsonArray[] = array('response'=>'0', 'response-text'=>mysql_error());
// 			echo json_encode(array('JsonData'=>$JsonArray),JSON_PRETTY_PRINT);
// 		}
// }



	
	
?>