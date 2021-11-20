<html>

    <body id="bgbody" >

    <head>
	<link rel="title icon" type="image/x-icon" href="style/images/favicon.ico" />
         <!-- Bootstrap -->
        <link href = "style/css/bootstrap.min.css" rel = "stylesheet">
        <title>TUTBUS</title>
        <meta name="viewport" content="width=device-width,initial-scale=1"/>
        
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
                <a class="navbar-brand" href="index.php"><img src="logo_transparent.png" style="height:120px;margin-top:-43px"></a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>

                    </li>


                    <li class="dropdown" style="position: absolute; top: 0;right: 50px;">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Sign up<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="Register/stud_reg.php">Student</a></li>
                        </ul>
                    </li>

                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
   
    <div class="container">
        <div class="jumbotron">
            <h1>Online Bus Booking</h1>
            <p>Book a Bus Online.</p>
        </div>      
    

    <form class="navbar-form navbar-left right jumbotron" role="search"  method="post">
        <div class="form-group">
            <br><input type="text" class="form-control" placeholder="Username" name="username" id="username" required><br>
            <br><input type="password" class="form-control" placeholder="Password" name="password" id="password" required><br>
			<span id="error" class="text-danger"></span>

        </div>
        <div>
            <br><button type="submit" class="btn btn-primary"name="login">Login</button>
        </div>
    </form>

    </div>

    </body>
</html>

<?php
 
  include("Register/autho.php");
  include("Database/connection.php");
  
  class Account{
	  
	  public $conn;
	  //auto delete the table after 15 minutes
	  function auto_delete($conn){
		 
		   $this->conn=$conn;
           $sql="DELETE FROM student_booking
           WHERE bookid IN(SELECT time_id
		   FROM time
		   WHERE ADDTIME(time,'0:15:0')<CURRENT_TIME())";
                
		   return mysqli_query($conn,$sql);		 
	  }
	  
	  //auto update the table after 6 hours
	  function auto_update(){
		  
		   $query="UPDATE time
           SET numBooked=0
		   WHERE ADDTIME(time,'6:0:0')<CURRENT_TIME())";
		   
           return mysqli_query($this->conn,$query);
	  }
	  
	  //login
	  function login(){
		  
		   if(isset($_POST['login'])){
			   
	          session_start();
			  
	          $username=$_POST['username'];
	          $password=$_POST['password'];
	          $numRows=fetchData($username,$password,$this->conn);
			  
	          if($numRows>0){
		  
		         $_SESSION['username']=$username;
		         $sql="select * from user where username='$username'";
		         $results=mysqli_query($this->conn,$sql);
		  
                 while($row=mysqli_fetch_assoc($results)){
		     
		              $type=$row['login_type'];
			 
		              if($type==1){
			             header("LOCATION:login.php");
			            }else{
			             header("LOCATION:admin_login.php");	  
		                }
		  
	                }
                }
				else{
					echo "<script>var error_msg = 'Wrong Username/Password';
					              $('#error').text(error_msg);
								  $('#username').css('border-color', '#cc0000');
			                      $('#password').css('border-color', '#cc0000');
						  </script>";
				}
            }

	    }
	  
    }
	
	
	$info=new Account();
	$info->auto_delete($conn);
	$info->auto_update();
	$info->login();
  

?>