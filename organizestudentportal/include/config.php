<?php

$server="localhost";//server name
$user="root";		//user name
$pass="";			//user password
$dbname="uccp1";//database name


$conn= new mysqli($server,$user,$pass,$dbname);
if($conn->connect_error){
	die('Connection Failed'.$conn->connect_error);
}

?>