<?php
require 'db.php';

require 'AfricasTalkingGateway.php';

$status = $_GET['status'];

$tx_ref = $_GET['tx_ref'];

$readPayment = $dbconnection->query("SELECT * FROM payments WHERE tx_ref = '$tx_ref'");

$results = $readPayment->fetch_assoc();

$phone_number = $results['phone_number'];

$name = $results['name'];

$seatNumber = 'id';

if($status == "successful"){

	$dbconnection->query("UPDATE payments SET status='$status' WHERE tx_ref='$tx_ref' ");

	$message = "Hello ".$name." Thank you for paying Ticket 12, your seat number is ".$seatNumber.", The Confress starts at 12:30 PM Sunday";	

	//$apikey     = "70f84cd3abc1f560cde8d674bbf107e2dc5ab8cf8be71c93a3ea203860647b13";	

	//$gateway    = new AfricasTalkingGateway("Geofrey kimuli", $apikey,);

	//$gateway->sendMessage($phone_number, $message);

	header("Location:thank_you.php?message=' Hello ".$name." Your ticket has been purchased successfully, Thank you for supporting Infinty Charity Organisation'  ");

}else{

	header("Location:thank_you.php?message='You payment failed' ");

}

 