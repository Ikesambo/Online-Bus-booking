 <?php  
 
    include("Database/connection.php.");
	include("cookies.php");

	$subject=$_POST['subject'];
	$announcement=$_POST['announcement'];
	
	$sql="insert into notice_board(subject, details,date) VALUES('$subject','$announcement',now())";
    mysqli_query($conn,$sql);
	

 ?>  