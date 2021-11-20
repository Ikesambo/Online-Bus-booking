<?php
   include("../../../Database/connection.php");
   session_start();
   
   $query="UDATE time 
           SET numBooked=numBooked-1
		   WHERE time_id='$reference'";
   mysqli_query($conn,$query);
   
   $user=$_SESSION['username'];
   $sql="delete from student_booking where username='$user'";
   mysqli_query($conn,$sql);

?>