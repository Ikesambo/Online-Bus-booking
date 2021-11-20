<?php 
 
  include("Database/connection.php"); 
  include("cookies.php");
  session_start();
  
  class User{
	  
	  public $surname;
	  public $initials;
	  
	  function fetchData($conn,$username){
		  
            $sql="select * from user where username='$username'";
            $results=mysqli_query($conn,$sql);
			
            while($row=mysqli_fetch_assoc($results)){
	            $surname=$row['surname'];
	            $names=$row['first_name'];
	            $secValue=substr($names,strpos($names," ")+1);
	            $initals=$names[0].$secValue[0];
				
				$this->surname=strtoupper($surname);
				$this->initials=strtoupper($initals);
	  	  
            }
	    }
	  function display_surname(){
		
           return $this->surname;
		   
	    }
      function display_initials(){
			
			return $this->initials;
		}
	   
    }
	
    $username=$_SESSION['username'];
    $details=new User();
	$details->fetchData($conn,$username);


?>
<html>

    <body id="bgbody" >

        <head>
	      <link rel="title icon" type="image/x-icon" href="style/images/favicon.ico" />
          <!-- Bootstrap -->
          <link href = "style/css/bootstrap.min.css" rel = "stylesheet">
          <title>TUTBUS</title>
          <link rel="stylesheet" href="style/css/styles.css">
          <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
          <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
	      <link rel="stylesheet" href="style/css/mystyle.css">
        </head>
        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
           <div class="container">
               <!-- Brand and toggle get grouped for better mobile display -->
               <div class="navbar-header">
                   <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                      <span class="sr-only">Toggle navigation</span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                   </button>
                   <a class="navbar-brand" ><img src="logo_transparent.png" style="height:120px;margin-top:-43px"></a>
               </div>
               <!-- Collect the nav links, forms, and other content for toggling -->
               <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                  <ul class="nav navbar-nav">
                      <li>
                        <a href="schedule/edit_schedule">Manage Booking</a>
                      </li>
                      <li>
                        <a href="booking/book_list/pdf.php">View Booking</a>
                      </li>
                      <li>
                        <a href="booking/stop_bookings/">Stop Bookings</a>
                      </li>

                      <li class="dropdown" style="position: absolute; top: 0;right: 50px;">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $details->display_surname()." ".$details->display_initials();  ?><span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="update.php">Profile</a></li>
                            <li><a href="">Account Settings</a></li>
							<li><a href="index.php">Log Out</a></li>
                        </ul>
                      </li>

                  </ul>
               </div>
               <!-- /.navbar-collapse -->
           </div>
           <!-- /.container -->
           </nav>
           <div class="container">
	          <?php
		         include("booking/index.php");
		      ?>
	       </div>
	       <form method="POST" action="ajax.php">
	          <div class="box">
	             <div style="width:90%; margin:0 auto">
	                <br>
	                <h4 style="text-align:center"><b>MAKE ANNOUNCEMENT</b></h4>
	                <input type="text" id="subject" placeholder="SUBJECT..">
                    <textarea rows="10" cols="100" placeholder="ANNOUNCEMENT HERE.." id="announcement"></textarea><br>
	                <button type="button"   id="submit" style="width:100%;height:40px"  onclick="stop()">POST ANNOUNCEMENT</button>
	   
	       </form>

	       <br><br>
	      </div>
	   </div>
	   <br><br><br>
   </body>
	
</html>

<script> 
  function stop(){
	  
	  var subject=document.getElementById('subject').value;
	  var announcement=document.getElementById('announcement').value;
	  
	  $.ajax({
		    url:'ajax.php',
			data:{'subject':subject,'announcement':announcement},
			type:'post',
			success: function(data){
				alert('ANNOUNCEMENT POSTED');
				window.location.href=window.location.href;
			}
	  });
  }
</script>

