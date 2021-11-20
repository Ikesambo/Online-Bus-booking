<?php
  
  $host="localhost";
  $user="root";
  $password="";
  $dbName="tut_booking";
  
  $conn=mysqli_connect($host,$user,$password,$dbName);
  if(!$conn){
	  echo "connection Error, Something went wrong";
  }

?>