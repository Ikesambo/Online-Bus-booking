<?php

	   
  class Person{
	  public $uniqueNo;
	  public $userName;
	  public $firstNames;
	  public $surname;
	  public $password;
	  public $regType;
	  public $conn;
	  
	  function setDetails($uniqueNo,$userName,$firstNames,$surname,$password,$regType,$conn){
		  
		  $this->uniqueNo=$uniqueNo;
		  $this->username=$userName;
		  $this->firstNames=$firstNames;
		  $this->surname=$surname;  
		  $this->password=$password;
		  $this->regType=$regType;
		  $this->conn=$conn;
		  
	   }
	  
	  //inserting Data for Registeration
	  function insertDetails(){
		  
		  $sql="insert into user values('$this->uniqueNo','$this->username','$this->firstNames','$this->surname','$this->password','$this->regType')";
		  $results=mysqli_query($this->conn,$sql);
		  if($results)
		  {
			  return "<script>alert('Successfully Registerd')</script>";
		  }
		  else{
			  return "\error :".$sql."<br>".mysqli_error($this->conn);
		  }
	  }
	  
	  //Fecth Data

	   function updateDetail(){
		   
	   }
		  
	  }
 
  
  
  ?>