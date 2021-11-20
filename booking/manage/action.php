<?php

//action.php

include('database_connection.php');
session_start();

if(isset($_POST["action"]))
{
	if($_POST["action"] == "insert")
	{
		$query = "
		INSERT INTO tbl_sample (first_name, last_name) VALUES ('".$_POST["first_name"]."', '".$_POST["last_name"]."')
		";
		$statement = $connect->prepare($query);
		$statement->execute();
		echo '<p>Data Inserted...</p>';
	}
	if($_POST["action"] == "fetch_single")
	{
		$query = "
		SELECT * FROM tbl_sample WHERE id = '".$_POST["id"]."'
		";
		$statement = $connect->prepare($query);
		$statement->execute();
		$result = $statement->fetchAll();
		foreach($result as $row)
		{
			$output['first_name'] = $row['first_name'];
			$output['last_name'] = $row['last_name'];
		}
		echo json_encode($output);
	}
	if($_POST["action"] == "update")
	{
		$query = "
		UPDATE tbl_sample 
		SET first_name = '".$_POST["first_name"]."', 
		last_name = '".$_POST["last_name"]."' 
		WHERE id = '".$_POST["hidden_id"]."'
		";
		$statement = $connect->prepare($query);
		$statement->execute();
		echo '<p>Data Updated</p>';
	}
	if($_POST["action"] == "delete")
	{
		$query = "UPDATE time
                  SET numBooked=numBooked+1
				  WHERE time_id = '".$_POST["id"]."'";
		$statement = $connect->prepare($query);
		$statement->execute();
		
		$sql="insert into student_booking(username,bookid) values('".$_SESSION["username"]."','
		      ".$_POST["id"]."')";
	    $state=$connect->prepare($sql);
		$state->execute();
		echo '<p>Booked successfully</p>';
	}
}

?>