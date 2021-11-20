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
	SELECT * FROM time  ORDER BY time";
}
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
	$output .= '<div class="table-responsive">
					<table class="table table bordered">
						<tr>
							<th>FROM</th>
							<th>TIME</th>
			
						</tr>';
	while($row = mysqli_fetch_array($result))
	{

		$output .= '
			<tr>
				<td>'.$row["from_to"].'</td>
				<td>'.$row["time"].'</td>
			
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