
<?php

//fetch.php

include("database_connection.php");
$username=$_SESSION['username'];

$query = "SELECT time.from_to As 'from',time.time As'time',student_booking.reference AS 'bookid',
          student_booking.date_booked AS 'date'
          FROM  student_booking ,time
          WHERE student_booking.bookid=time.time_id And student_booking.username='$username'";
$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$total_row = $statement->rowCount();


if($total_row > 0)
{
	    foreach($result as $row){
	    $time=$row["time"];
		$date=$row['date'];
		$to=substr($row['from'],strpos($row['from'],"_")+1).' campus';
		$from=substr($row['from'],0,strpos($row['from'],"_")).' campus';
		//$to=$row['from'];
		$reference=$row['bookid'];
		$output = '
		     
		     <div style="width:20%;margin:0 auto">
             <img src="../../../twitter_header_photo_2.png" style="height:50px;width:100%;margin-top:20px">
			 </div>
			 
			 <h4 style="margin-left:5%;margin-top:5%">STUDENT INFORMATION</h4><br>
			 <h5 style="margin-left:5%">Surname <a ><b>'.$surname.'</b></a></h5><br>
			 <h5 style="margin-left:5%">Names <a ><b>'.$names.'</b></a></h5><br>
			 <h5 style="margin-left:5%">Student No <a ><b>'.$studNo.'</b></a></h5><br>
			 <h4 style="margin-left:5%">BOOKING INFORMATION</h4>
			 <br><br>
			 <h5 style="margin-left:5%">Reference Number <a ><b>'.$reference.'</b></a></h5><br>
			 <h5 style="margin-left:5%">Date Booked <a ><b>'.$date.'</b></a></h5><br>
			 <h5 style="margin-left:5%">Time <a><b>'.$time.'</b></a></h5><br>
			 <h5 style="margin-left:5%">From <a><b>'.$from.'</b></a></h5><br>
			 <h5 style="margin-left:5%">To <a><b>'.$to.'</b></a></h5><br>
			 <br><br><br><br>
			 <h4 style="margin-left:5%">NOTE:</h4>
			 <br>
			 <h5 style="text-align:center"><b>Take the following with you:</b></h5><br>
			 <h5 style="margin-left:5%">(i)Please bring you student card together with this document</h5><br><hr>
			 <h6 style="text-align:center"><b>Phone . 0727672852, 4849 Tswelopelo ext 8 Tembisa 1632 , www.tutbus.co.za</b><h6>
	
		';
		}
	
}
else
{
	$output = '
	  <h6 style="color:red;text-align:center">YOU DID NOT MAKE ANY BOOKING TODAY</h6>
	  <script>document.getElementById("cancel").style.visibility="hidden";
	          document.getElementById("download").style.visibility="hidden";
	  </script>
	';
}
$output .= '</table>';
echo $output;


?>
