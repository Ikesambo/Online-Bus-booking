<?php

//action.php

include('database_connection.php');

if(isset($_POST["action"]))
{
	if($_POST["action"] == "insert")
	{
		$query = "
		SELECT * FROM time where from_to='".$_POST["first_name"]."_".$_POST["last_name"]."'
		AND time='".$_POST["time"]."'";
		$statement = $connect->prepare($query);
		$statement->execute();
		$result = $statement->fetchAll();
		$numrows=$statement->rowCount();
		
		if($numrows==0){
		
		   $from_to=$_POST["first_name"]."_".$_POST["last_name"];
		   $query = "
		   INSERT INTO time (from_to, time) VALUES ('$from_to', '".$_POST["time"]."')
		   ";
		   $statement = $connect->prepare($query);
		   $statement->execute();
		   echo '<p>Data Inserted...</p>';
		
		}
		else{
		   echo '<p>ERROR:Data Aleady Inserted...</p>';
		}
	}
	if($_POST["action"] == "fetch_single")
	{
		$query = "
		SELECT * FROM time WHERE time_id = '".$_POST["id"]."'
		";
		$statement = $connect->prepare($query);
		$statement->execute();
		$result = $statement->fetchAll();
		foreach($result as $row)
		{
			$firsCamp=substr($row['from_to'],0,strpos($row['from_to'],"_"));
			$secCamp=substr($row['from_to'],strpos($row['from_to'],"_")+1);
			$output['first_name'] = $firsCamp;
			$output['last_name'] = $secCamp;
			$output['time']=$row['time'];
		}
		echo json_encode($output);
	}
	if($_POST["action"] == "update")
	{
		$query = "
		UPDATE time 
		SET time = '".$_POST["time"]."' 
		WHERE time_id = '".$_POST["hidden_id"]."'
		";
		$statement = $connect->prepare($query);
		$statement->execute();
		echo '<p>Data Updated</p>';
	}
	if($_POST["action"] == "delete")
	{
		$query = "DELETE FROM time WHERE time_id = '".$_POST["id"]."'";
		$statement = $connect->prepare($query);
		$statement->execute();
		echo '<p>Data Deleted</p>';
	}
}

?>