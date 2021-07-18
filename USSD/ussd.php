<?php

 header("Content-type:text/plane");

require('AfricasTalkingGateway.php');

require('www.php');

$phone_number = $_POST['phoneNumber'];

$textFromUser = $_POST['text'];

$sessionID = $_POST['sessionId'];

$serviceCode = $_POST['serviceCode'];

if(empty($textFromUser)){

	$textFromUser = "0";

}else{

	$textFromUser = "0*".$textFromUser;

}

$inputArray = explode("*", $textFromUser);

$level = count($inputArray);

switch ($level) {

	case 1:

		$response = "CON Welcome to Infinty_cares (U) Limited";

	    $response .= "\n 1. Register";

	    $response .= "\n 2. Add a Charity fund";

	    echo $response;

		break;
		//jjjjj

	case 2:		// text = 0*1  OR  0*2 

		 if($inputArray[1]   ==  1) {//he wants to register// 

		 	echo "CON What is is your name?";



		 }elseif ($inputArray[1] == 2) {

		 	$checkmembers = $sqliCon->query("SELECT * FROM members WHERE phone_number = '$phone_number' ");

		 	if($checkmembers->num_rows == 0) 

		 		echo "END User with phone_number $phone_number has no account";

		 	else{

		 		while ($results = $checkmembers->fetch_assoc()) {

		 			echo "CON ".$results['name']."\n Enter the amount";

		 		}

		 	}
				
					  

		 
		 }else{

		 	echo "END Invalid option";

		 }
		  
		break;

	case 3: 

	     if($inputArray[1]   ==  1) {//he wants to register// // 0*1*Charles

		 	$user_name = $inputArray[2];

		 	$saveUser = $sqliCon->query("INSERT INTO members(phone_number,name)VALUES('$phone_number','$user_name')");

		 	if($saveUser){

		 		$message = "Hello ".$user_name." Thank you for registering with Infinity cares Charity ltd";		        
				$apikey     = "70f84cd3abc1f560cde8d674bbf107e2dc5ab8cf8be71c93a3ea203860647b13";			 
				$gateway    = new AfricasTalkingGateway("sandbox", $apikey,"sandbox");

				$gateway->sendMessage($phone_number, $message); 

				echo "END Thank you for registering"; 

		 	}else{

		 		echo "END Failed to register ".$sqliCon->error;

		 	}


		 }elseif ($inputArray[1] == 2) { 

		 	$amount = $inputArray[2];

		 	$checkmembers = $sqliCon->query("SELECT id,name FROM members WHERE phone_number = '$phone_number'");

		 	if($checkmembers->num_rows == 1){
		 
		 	while ($rows = $checkmembers->fetch_assoc()) {

		 		$member_id = $rows['id'];

		 	    $member_name = $rows['name'];

		 	    $sqliCon->query("INSERT INTO funds(member_id,amount_given)VALUES('$member_id','$amount')");

		 	    $message = "Hello $member_name, Thank you for supporting Infinity cares. You have recorded $amount(s)";
			    $apikey     = "70f84cd3abc1f560cde8d674bbf107e2dc5ab8cf8be71c93a3ea203860647b13";			 
			    $gateway    = new AfricasTalkingGateway("sandbox", $apikey,"sandbox");
			    $gateway->sendMessage($phone_number, $message);
		 	    echo "END $message";
		 		 
		 	}

		 }else{

		 	echo "END No user found";

		 }
	 
	}  

	 
		break;
	
	default:

		echo"The option selected is not valid";

		break;
}
