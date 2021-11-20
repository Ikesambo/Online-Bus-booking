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
                <a class="navbar-brand" href="../index.php"><img src="../logo_transparent.png" style="height:120px;margin-top:-43px"></a>
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
            <h1>Registration</h1>
            <p>Register As Student.</p>
			<p id="register_msg"></p>
        </div>      
    

    <form class="navbar-form navbar-left right jumbotron" role="search" method="post">
        <div class="form-group">
		    <span id="reg_error" class="text-danger"></span><br>
		    <span id="std_error" class="text-danger"></span>
            <br><input type="number" class="form-control" placeholder="Student No" name="studNo" id="studNo" required><br>
			<span id="email_error" class="text-danger"></span>
			<br><input type="text" class="form-control" placeholder="Email Address" name="email" id="email" required><br>
			<br><input type="text" class="form-control" placeholder="First Names" name="names" id="names" required><br>
			<br><input type="text" class="form-control" placeholder="Surname" name="surname" id="surname" required><br>
			
            <br><input type="password" class="form-control" placeholder="Password" name="password" id="password" required><br>
			<span id="pass_error" class="text-danger"></span>
			<span id="match_error" class="text-danger"></span>
			<br><input type="password" class="form-control" placeholder="Confirm Password" name="sec_password" id="sec_password" required><br>
            <p id="erropass"></p>
        </div>
        <div>
            <br><button type="submit" class="btn btn-primary" name="register" id="register">SIgn up</button>
        </div>
    </form>

    </div>

    </body>
</html>

<script>

	
</script>

<?php
  include("../Database/connection.php");
  include("insert_data.php");
  include("autho.php");
  
  if(isset($_POST['register'])){
	  
	 $studNo=$_POST['studNo'];
	 $username=$_POST['email'];
	 $names=$_POST['names'];
	 $surname=$_POST['surname'];
	 $password=$_POST['password'];
	 $sec_password=$_POST['sec_password'];
	 
	 $sql="select * from user where username='$username'";
	 $results=mysqli_query($conn,$sql);
		  
	 $numRows=mysqli_num_rows($results);
	 if($numRows==0){
		 
	    if(strlen($studNo)!=8){
		 
		    $error_studNo= "<script>var error_msg = 'Student number should be 8 numbers';
			              $('#std_error').text(error_msg);
			              $('#studNo').css('border-color', '#cc0000');
			      </script>";
	    }
		else{
			$error_studNo="";
		}
	    if(!filter_var($username,FILTER_VALIDATE_EMAIL)){
		    $error_ema= "<script>var error_email = 'wrong email entered';
			              $('#email_error').text(error_email);
			              $('#email').css('border-color', '#cc0000');
			      </script>";
	        }
	    else{
			$error_ema="";
		}
	    if($password!=$sec_password){
		 
		    $erro_Pass= "<script>var error_match = 'Password does not match';
			              $('#match_error').text(error_match);
			              $('#password').css('border-color', '#cc0000');
					      $('#sec_password').css('border-color', '#cc0000');
			             </script>";
	        }
		else{
			$erro_pass="";
		}
		if(strlen($password)<8){
			$erroPassLen= "<script>var error_pass = 'password is too short';
			              $('#pass_error').text(error_pass);
			              $('#password').css('border-color', '#cc0000');
					      $('#sec_password').css('border-color', '#cc0000');
			               </script>";
		}
		else{
			$erroPassLen="";
		}
		
		
		if($error_studNo!=""||$error_ema!=""||$erro_pass!=""||$erroPassLen!=""){
			
			echo $error_studNo.$error_ema.$erroPassLen;
			echo $erro_pass;
		}
	    else{
            $student=new Person();
            $student->setDetails($studNo,$username,$names,$surname,$password,1,$conn);
	        echo $student->insertDetails();
	    }
	 
    }
	else{
		
		    echo "<script>var error_email = 'Email Already Registered';
			              $('#reg_error').text(error_email);
			              $('#email').css('border-color', '#cc0000');
			      </script>";
	    }
		
  }
  
?>