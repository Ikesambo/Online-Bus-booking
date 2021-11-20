<?php 
 
  include("Database/connection.php"); 
  session_start();
  
  $username=$_SESSION['username'];
  $sql="select * from user where username='$username'";
  $results=mysqli_query($conn,$sql);
  while($row=mysqli_fetch_assoc($results)){
	  
	  $surname=$row['surname'];
	  $names=$row['first_name'];
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
        <script type="text/javascript" src="style/js/jquery.js"></script>
		<link rel="stylesheet" href="style/css/mystyle.css">
           <style>
  	          div.scroll-2{
	          margin:4px,4px;
	       	  padding:4px;
	     	  height:400px;
		      overflow-x:hidden;
		      overflow-y:auto;
		      text-align:justify;
             }
           </style>
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
                <a class="navbar-brand" href="login.php"><img src="logo_transparent.png" style="height:120px;margin-top:-43px"></a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="schedule/schedule_list/pdf.php">View Bus Schedule</a>
                    </li>
                    <li>
                        <a href="booking/manage/save_pdf/pdf.php">Manage Booking</a>
                    </li>

                    <li class="dropdown" style="position: absolute; top: 0;right: 50px;">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo strtoupper($surname)." ".strtoupper($initals);  ?><span class="caret"></span></a>
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
	 <div style="width:80%;margin:0 auto;
	      	     box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12)
				 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17)
				 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;border-radius:10px">
	    <div style="width:90%; margin:0 auto" >
	    <br>
	    <h5 style="text-align:center" class="text-info"><b>MAKE BOOKING</b></h5>
 
	         <select name="firstname" id="firstCamp" style="width:100%;height:40px; border-radius:15px" onchange="change()">
	            <option value="" disabled selected hidden >FROM?</option>
		        <option value="arcadia" id="a_arcadia" onclick="change()">ARCADIA</option>
     		    <option value="garankua" id="a_garankua" onclick="change()">GA-RANKUA</option>
			    <option value="south" id="a_south" onclick="change()">SOSHANGUVE(SOUTH)</option>
			    <option value="north" id="a_north" onclick="change()">SOSHANGUVE(NORTH)</option>
			    <option value="pretoria" id="a_pretoria" onclick="change()">PRETORIA</option>
	         </select><br><br>

	         <select name="lastName" id="secCamp" style="width:100%;height:40px;border-radius:15px" onchange="change()">
	            <option value="" disabled selected hidden>WHERE TO?</option>
			    <option value="arcadia" id="a_sec_arcadia" onclick="change()">ARCADIA</option>
			    <option value="garankua" id="a_sec_garankua" onclick="change()">GA-RANKUA</option>						
			    <option value="south" id="a_sec_south" onclick="change()">SOSHANGUVE(SOUTH)</option>
			    <option value="north" id="a_sec_north" onclick="change()">SOSHANGUVE(NORTH)</option>
		        <option value="pretoria" id="a_sec_pretoria" onclick="change()">PRETORIA</option>
	         </select><br><br>

    	     <button
         			 type="button" style="width:100%;height:40px;border-radius:15px" 
                     class="btn btn-danger" onclick="search()">MAKE A BOOKING
			 </button>
	        <br><br>
  
	    </div>
	 </div>
	 <br><br><br>
	 <div style="width:80%;margin:0 auto;
	      	     box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12)
				 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17)
				 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;border-radius:10px" class="scroll-2"><br>
        <h5 style="text-align:center" class="text-info"><b>NOTICE BOARD</b><h5><br>
		<div style="width:90%; margin:0 auto;box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12)
					0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17)
					0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;border-radius:10px">
		  <br>
             <?php
                include("notices/notice_list.php");
             ?>
		  <br>
		</div>
	 </div>
	 <div style="width:100%;margin-top:15%;background-color:#0C090A;height:100px" >
	    <div style="width:90%;margin:0 auto">
		  <br>
	      <h4>|</h4>
		</div>
     </div>
  </body>
	
</html>
 <script>


function search(){

	 var firstName=document.getElementById('firstCamp').value;
	 var secName=document.getElementById('secCamp').value;

     if(firstName==""||secName==""){
  
        alert("Both Fields are required");

      }
     else{
        createCookie('firstName',firstName,2);	
        createCookie('lastName',secName,2);				
        window.location.href = 'schedule/select_schedule/index.php';
 
      }

} 
 function change(){
	 
	 var firstName=document.getElementById('firstCamp').value;
	 var secName=document.getElementById('secCamp').value;

      if(firstName=='south'){
		 
		 document.getElementById('a_sec_arcadia').disabled=false;
		 document.getElementById('a_sec_north').disabled=false;
		 document.getElementById('a_sec_pretoria').disabled=false;
		 document.getElementById('a_sec_garankua').disabled=false;
		 return document.getElementById('a_sec_south').disabled=true;
	 }
     	 if(firstName=='north'){
		 
		 document.getElementById('a_sec_arcadia').disabled=false;
		 document.getElementById('a_sec_south').disabled=false;
		 document.getElementById('a_sec_pretoria').disabled=false;
		 document.getElementById('a_sec_garankua').disabled=false;
		 return document.getElementById('a_sec_north').disabled=true;
	 }
	 if(firstName=='arcadia'){
		 
		 document.getElementById('a_sec_south').disabled=false;
		 document.getElementById('a_sec_north').disabled=false;
		 document.getElementById('a_sec_pretoria').disabled=false;
		 document.getElementById('a_sec_garankua').disabled=false;
		 return document.getElementById('a_sec_arcadia').disabled=true;
	 }
	 if(firstName=='garankua'){
	
		 document.getElementById('a_sec_arcadia').disabled=false;
		 document.getElementById('a_sec_north').disabled=false;
		 document.getElementById('a_sec_pretoria').disabled=false;
		 document.getElementById('a_sec_south').disabled=false;	
		 return document.getElementById('a_sec_garankua').disabled=true;
	 }
	 if(firstName=='pretoria'){

		 document.getElementById('a_sec_arcadia').disabled=false;
		 document.getElementById('a_sec_north').disabled=false;
		 document.getElementById('a_sec_south').disabled=false;
		 document.getElementById('a_sec_garankua').disabled=false;
		 return document.getElementById('a_sec_pretoria').disabled=true;
	 }


      if(secName=='south'){
		 
		 document.getElementById('a_arcadia').disabled=false;
		 document.getElementById('a_north').disabled=false;
		 document.getElementById('a_pretoria').disabled=false;
		 document.getElementById('a_garankua').disabled=false;
		 return document.getElementById('a_south').disabled=true;
	 }
     	 if(secName=='north'){
		 
		 document.getElementById('a_arcadia').disabled=false;
		 document.getElementById('a_south').disabled=false;
		 document.getElementById('a_pretoria').disabled=false;
		 document.getElementById('a_garankua').disabled=false;
		 return document.getElementById('a_north').disabled=true;
	 }
	 if(secName=='arcadia'){
		 
		 document.getElementById('a_south').disabled=false;
		 document.getElementById('a_north').disabled=false;
		 document.getElementById('a_pretoria').disabled=false;
		 document.getElementById('a_garankua').disabled=false;
		 return document.getElementById('a_arcadia').disabled=true;
	 }
	 if(secName=='garankua'){
	
		 document.getElementById('a_arcadia').disabled=false;
		 document.getElementById('a_north').disabled=false;
		 document.getElementById('a_pretoria').disabled=false;
		 document.getElementById('a_south').disabled=false;	
		 return document.getElementById('a_garankua').disabled=true;
	 }
	 if(secName=='pretoria'){

		 document.getElementById('a_arcadia').disabled=false;
		 document.getElementById('a_north').disabled=false;
		 document.getElementById('a_south').disabled=false;
		 document.getElementById('a_garankua').disabled=false;
		 return document.getElementById('a_pretoria').disabled=true;
	 }
	 
 }


 </script> 
		   

