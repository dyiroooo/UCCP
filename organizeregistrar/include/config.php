<?php

$server="localhost";//server name
$user="ytoovumw_bscs3a";		//user name
$pass="kaAGi]gz8H2*";			//user password
$dbname="ytoovumw_bscs3a";//database name


$conn= new mysqli($server,$user,$pass,$dbname);
if($conn->connect_error){
	die('Connection Failed'.$conn->connect_error);
}

?>
