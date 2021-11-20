<?php

//fetch.php

include("database_connection.php");
session_start();
$first=$_COOKIE['firstName'];
$last=$_COOKIE['lastName'];
$fullCamp=$first.'_'.$last;
$secCamp=$last.'_'.$first;
$currentTime=date("h");
$query = "SELECT * FROM  time where from_to IN('$fullCamp','$secCamp')  AND time<CURRENT_TIME";
$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$total_row = $statement->rowCount();
$output = '
<table class="table table-striped table-bordered">
	<tr>
		<th>From</th>
		<th>To</th>
		<th>Time</th>
		<th>BOOK</th>
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
			
			$dis='disabled';
			$status="Not Available For Booking";
			
		}
		else{
			$dis='';
		}
		
		$output .= '
		<tr>
			<td width="20%">'.$_COOKIE['firstName'].'</td>
			<td width="20%">'.$_COOKIE['lastName'].'</td>
			<td width="10%">'.$row["time"].'</td>
			<td width="10%">
				<button type="button" name="delete" class="btn btn-danger btn-xs delete" id="'.$row["time_id"].'"'.$dis.'>'.$status.'</button>
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