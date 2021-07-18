<?php

require ('AfricasTalking.php');

$username = "sandbox";

$apikey = "70f84cd3abc1f560cde8d674bbf107e2dc5ab8cf8be71c93a3ea203860647b13";

$recipients = "+25678421181";

$gateway = new AfricasTalkingGateway($username, $apikey, "sandbox");

$gateway->sendMessage($recipients, "it has worked now"); 