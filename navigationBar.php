<?php 
 
  include("Database/connection.php"); 
  session_start();
  
  $username=$_SESSION['username'];
  $sql="select * from user where username='$username'";
  $results=mysqli_query($conn,$sql);
  while($row=mysqli_fetch_assoc($results)){
	  
	  $surname=$row['surname'];
	  $names=$row['first_name'];
	  $studNo=$row['email'];
	  $secValue=substr($names,strpos($names," ")+1);
	  $initals=$names[0].$secValue[0];
	  
	  
  }

  

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
                <a class="navbar-brand" href="../../login.php"><img src="../../logo_transparent.png" style="height:120px;margin-top:-43px"></a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">

                    <li class="dropdown" style="position: absolute; top: 0;right: 50px;">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo strtoupper($surname)." ".strtoupper($initals);  ?><span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="Register/owner_reg_form.php">Profile</a></li>
                            <li><a href="Register/add-record-form.php">Account Settings</a></li>
							<li><a href="Register/add-record-form.php">Notifications</a></li>
							<li><a href="index.php">Log Out</a></li>
                        </ul>
                    </li>

                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>