<?php
$connect = mysqli_connect("localhost", "root", "", "tut_booking");
$output = '';
if(isset($_POST["query"]))
{
	$search = mysqli_real_escape_string($connect, $_POST["query"]);
	$query = "
	SELECT * FROM time 
	WHERE from_to LIKE '%".$search."%'
	OR time LIKE '%".$search."%' 
    And numBooked>0
	";
}
else
{
	$query = "
	SELECT * FROM time where numBooked>0 ORDER BY time";
}
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
	$output .= '<div class="table-responsive">
					<table class="table table bordered">
						<tr>
							<th>FROM</th>
							<th>TIME</th>
							<th>NUMBER OF STUDENT BOOKED</th>
                            <th>NUMBER OF BUS NEEDED</th>
						</tr>';
	while($row = mysqli_fetch_array($result))
	{
        $numBuses=0;
        if($row["numBooked"]>0&&$row["numBooked"]<=60){
           $numBuses=1;
        }
        else if($row["numBooked"]>60&&$row["numBooked"]<=120){
           $numBuses=2;   
        }
        else if($row["numBooked"]>120&&$row["numBooked"]<=180){
           $numBuses=3;   
        }
        else if($row["numBooked"]>180&&$row["numBooked"]<=240){
           $numBuses=4;   
        }
        else if($row["numBooked"]>240&&$row["numBooked"]<=300){
           $numBuses=5;   
        }
		$output .= '
			<tr>
				<td>'.$row["from_to"].'</td>
				<td>'.$row["time"].'</td>
				<td>'.$row["numBooked"].'</td>
                <td>'.$numBuses.'</td>
			</tr>
		';
	}
	echo $output;
}
else
{
	echo 'Data Not Found';
}
?>