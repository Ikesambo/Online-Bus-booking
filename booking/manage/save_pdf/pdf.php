<?php 
 
  include("../../../Database/connection.php"); 
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
        <title>Online Bus Ticketing</title>
         
        
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
                <a class="navbar-brand" href="../../../login.php"><img src="../../../logo_transparent.png" style="height:120px;margin-top:-43px"></a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="pdf.css" />
    <script src="pdf.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>

</head>

<body>
    <div class="container d-flex justify-content-center mt-50 mb-50">
        <div class="row">
            <div class="col-md-12 text-right mb-3">
                
                <br><br><br><br><br><br>
				<button type="button" class="btn btn-primary"  id="cancel" onclick="cancel()"> CANCEL BOOKING</button>
				<button class="btn btn-primary" id="download"> DOWNLOAD PROOF</button>
            </div>
            <div class="col-md-12" >
			
                <div class="card" id="invoice">
                    <div class="" style="background-image:url('../../../logo_transparent.png')">
                  
              
              <?php
 			  include("../fetch.php")?> </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
<script> 
  function cancel(){
	  

	  
	  $.ajax({
		    url:'cancel.php',
			type:'post',
			success: function(data){
				alert('Succesfully cancelled booking');
				location.reload(true);
			}
	  });
  }	    
</script>