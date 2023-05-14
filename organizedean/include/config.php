<?php

$server="localhost";//server name
$user="root";		//user name ytoovumw_bscs3a
$pass="";			//user password kaAGi]gz8H2*
$dbname="uccp1";//database name


$conn= new mysqli($server,$user,$pass,$dbname);
if($conn->connect_error){
	die('Connection Failed'.$conn->connect_error);
}

?>
