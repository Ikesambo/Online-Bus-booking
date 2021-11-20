<?php  
 session_start();  
 $connect = mysqli_connect("localhost", "root", "", "testing");  
 if(isset($_POST["username"]))  
 {  
      $query = "  
      SELECT * FROM admin_login  
      WHERE username = '".$_POST["username"]."'  
      AND password = '".$_POST["password"]."'  
      ";  
      $result = mysqli_query($connect, $query);  
      if(mysqli_num_rows($result) > 0)  
      {  
           $_SESSION['username'] = $_POST['username'];  
           echo 'Success';  
      }  
      else  
      {  
           echo 'No';  
      }  
 }  
 if(isset($_POST["action"]))  
 {  
      unset($_SESSION["username"]);  
 }  
 ?>