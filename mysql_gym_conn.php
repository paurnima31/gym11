<?php

$servername="localhost";
$username="root";
$password="";
$db="gym";
$conn=mysqli_connect($servername,$username,$password,$db);

if(!$conn){
	die("sorry we failed to connect:".mysqli_connect_error());
}
else{
    
}

?>