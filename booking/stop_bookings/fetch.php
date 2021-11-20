<?php

//fetch.php

include("database_connection.php");
session_start();

$query = "SELECT from_to,from_to,notAllowed,time_id FROM  time 
          GROUP BY from_to";
$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$total_row = $statement->rowCount();
$output = '
<table class="table table-striped table-bordered">
	<tr>
		<th>From-To</th>
		<th>Status</th>
		<th>Stop Bookings</th>
	</tr>
';
if($total_row > 0)
{
	foreach($result as $row)
	{
		$username=$_SESSION['username'];
		$sql="select * from  student_booking where username='$username'";
		$state = $connect->prepare($sql);
		$state->execute();
		$res = $state->fetchAll();
        $num_row = $state->rowCount();
		
		if($num_row==0){
		
		$allow=$row['notAllowed'];
		$status="Book Now";
		
		if($allow==1){
			
			$dis='ALLOW BOOKING';
			$status="NOT ACTIVE FOR BOOKING";
			
			
		}
		else{
            $dis='STOP BOOKING';
			$status="ACTIVE FOR BOOKING";
		}
		
		$output .= '
		<tr>
			<td width="20%">'.$row['from_to'].'</td>
			<td width="20%">'.$status.'</td>
			<td width="10%">
				<button type="button" name="delete" class="btn btn-danger btn-xs delete" id="'.$row["from_to"].'">'.$dis.'</button>
			</td>
		</tr>
		';
	}
	
	
	else{
	$output = '
	<tr>
		<td colspan="4" align="center">Already booked for today (Please Make sure You cancel first booking before
		  booking for another bus)</td>
	</tr>
	';
	}
	}
}
else
{
	$output .= '
	<tr>
		<td colspan="4" align="center">Data not found</td>
	</tr>
	';
}
$output .= '</table>';
echo $output;
?>