<!DOCTYPE html>  
<html>  

<body>  
           <br />  
           <div class="container" style="width:700px;">   
                <br />  
                <br />  
                <br />  
                <br />  
                <br />  
<?php    
     
               
                ?>  
   
                <?php 
                  include ("cookies.php");				
                ?>  
           </div>  
           <br />  
 	   	
 <div id="myModal" class="modal fade"> 
 <form method="POST"> 
      <div class="modal-dialog">  
   <!-- Modal content-->  
           <div class="modal-content">  
                <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">×</button>  
                     <h4 class="modal-title">Please select campuses</h4>  
                </div>  
                <div class="modal-body">  
                     <label>From?</label>  
					 <select name="firstname" id="first" class="form-control" onchange="change()">
					    <option value=""></option>
						<option value="arcadia" id="arcadia" onclick="change()">ARCADIA</option>
						<option value="garankua" id="garankua" onclick="change()">GA-RANKUA</option>
						<option value="south" id="south" onclick="change()">SOSHANGUVE(SOUTH)</option>
					    <option value="north" id="north" onclick="change()">SOSHANGUVE(NORTH)</option>
						<option value="pretoria" id="pretoria" onclick="change()">PRETORIA</option>
					 </select>
                     <br />  
                     <label>To?</label>  
					 <select name="lastName" id="last" class="form-control">
					    <option value=""></option>
						<option value="arcadia" id="sec_arcadia" onclick="change()">ARCADIA</option>
						<option value="garankua" id="sec_garankua" onclick="change()">GA-RANKUA</option>						
						<option value="south" id="sec_south" onclick="change()">SOSHANGUVE(SOUTH)</option>
					    <option value="north" id="sec_north" onclick="change()">SOSHANGUVE(NORTH)</option>
						<option value="pretoria" id="sec_pretoria" onclick="change()">PRETORIA</option>
					 </select> 
                     <br />  
                     <button type="button" name="login_button" id="login_button" class="btn btn-warning">Select</button>  
                </div>  
           </div>  
      </div>
	  
 </div>  

 <script>  
 $(document).ready(function(){  
      $('#login_button').click(function(){  
           var firstName = $('#firstName').val();  
           var lastName = $('#lastName').val(); 
		   	   
           if(firstName != '' && lastName != '')  
           {  
      
                $('#loginModal').hide();
                createCookie('firstName',firstName,2);	
                createCookie('lastName',lastName,2);				
                location.href = 'schedule/select_schedule/index.php';
             
           }  
           else  
           {  
                alert("Both Fields are required");  
           }  
      });  
      $('#logout').click(function(){  
           var action = "logout";  
           $.ajax({  
                url:"action.php",  
                method:"POST",  
                data:{action:action},  
                success:function()  
                {  
                     location.reload();  
                }  
           });  
      });  
 });  
 
 function change(){
	 
	 var firstName=document.getElementById('first').value;
	 var secName=document.getElementById('last').value;
	 
	 if(firstName=='south'){
		 
		 document.getElementById('sec_arcadia').disabled=false;
		 document.getElementById('sec_north').disabled=false;
		 document.getElementById('sec_pretoria').disabled=false;
		 document.getElementById('sec_garankua').disabled=false;
		 return document.getElementById('sec_south').disabled=true;
	 }
	 if(firstName=='north'){
		 
		 document.getElementById('sec_arcadia').disabled=false;
		 document.getElementById('sec_south').disabled=false;
		 document.getElementById('sec_pretoria').disabled=false;
		 document.getElementById('sec_garankua').disabled=false;
		 return document.getElementById('sec_north').disabled=true;
	 }
	 if(firstName=='arcadia'){
		 
		 document.getElementById('sec_south').disabled=false;
		 document.getElementById('sec_north').disabled=false;
		 document.getElementById('sec_pretoria').disabled=false;
		 document.getElementById('sec_garankua').disabled=false;
		 return document.getElementById('sec_arcadia').disabled=true;
	 }
	 if(firstName=='garankua'){
	
		 document.getElementById('sec_arcadia').disabled=false;
		 document.getElementById('sec_north').disabled=false;
		 document.getElementById('sec_pretoria').disabled=false;
		 document.getElementById('sec_south').disabled=false;	
		 return document.getElementById('sec_garankua').disabled=true;
	 }
	 if(firstName=='pretoria'){

		 document.getElementById('sec_arcadia').disabled=false;
		 document.getElementById('sec_north').disabled=false;
		 document.getElementById('sec_south').disabled=false;
		 document.getElementById('sec_garankua').disabled=false;
		 return document.getElementById('sec_pretoria').disabled=true;
	 }
	 
 }
 </script> 
		   
      </body>  
 </html> 


