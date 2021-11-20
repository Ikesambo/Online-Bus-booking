<?php

    function fetchData($username,$password,$conn){
		
		  $sql="select * from user where username='$username' AND password='$password'";
		  $results=mysqli_query($conn,$sql);
		  
		    $numRows=mysqli_num_rows($results);
            return $numRows;
			
	  }

?>