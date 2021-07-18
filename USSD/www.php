<?php

$sqliCon = new mysqli("localhost","root","3!Bw_c!aHup]J-En");

$sqliCon->query("CREATE DATABASE IF NOT EXISTS infinity_cares");

mysqli_select_db($sqliCon, "infinity_cares");

$sqliCon->query("CREATE TABLE IF NOT EXISTS members(id int( 11) not null auto_increment, PRIMARY KEY(id), phone_number varchar(20) not null unique, name varchar(50) not null)");


$sqliCon->query("CREATE TABLE IF NOT EXISTS funds(id int( 11) not null auto_increment, PRIMARY KEY(id), member_id int(11) not null, funds_given int(11) not null, FOREIGN KEY(member_id) REFERENCES members(id))");