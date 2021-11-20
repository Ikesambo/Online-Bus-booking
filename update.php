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
                <a class="navbar-brand" href=""><img src="logo_transparent.png" style="height:120px;margin-top:-43px"></a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">

                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
   
    <div class="container">
        <div class="jumbotron">
            <h1>PROFILE</h1>
        </div>      
    

    <form class="navbar-form navbar-left right jumbotron" role="search" method="post">
        <div class="form-group">
		    <br><label>STUDENT NO:</label>
            <br><input type="text" class="form-control" placeholder="Student No" name="studNo" disabled value='<?php echo $studNo; ?>' ><br>
			<br><label>EMAIL ADDRESS:</label>
			<br><input type="text" class="form-control" placeholder="Email Address" name="email" disabled value='<?php echo $username;?>'><br>
			<br><label>FIRST NAMES:</label>
			<br><input type="text" class="form-control" placeholder="First Names" name="names" value='<?php echo $names; ?>' disabled><br>
			<br><label>SURNAME:</label>
			<br><input type="text" class="form-control" placeholder="Surname" name="surname" value='<?php echo $surname; ?>' disabled><br>
        </div>
        <div>
            
        </div>
    </form>

    </div>

    </body>
</html>

