<?php 

  $dbconnection = new mysqli("localhost","root","3!Bw_c!aHup]J-En","charity_tickets");
 

 // $dbconnection->query("CREATE DATABASE IF NOT EXISTS charity_tickets");
  
 $dbconnection->query("CREATE TABLE IF NOT EXISTS tickets(id INT(10) NOT NULL AUTO_INCREMENT,PRIMARY KEY(id),name VARCHAR(20) NOT NULL, price DOUBLE(10,2) )");


$dbconnection->query("INSERT INTO tickets (id, name, price) VALUES('101', 'VIP', '1000')");

$dbconnection->query("INSERT INTO tickets (id, name, price) VALUES('102', 'ORDINARY', '500')");


 
 
