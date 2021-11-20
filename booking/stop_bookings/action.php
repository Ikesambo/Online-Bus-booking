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
		$sql="select from_to,notAllowed from time where from_to='".$_POST["id"]."'";
		$stat=$connect->prepare($sql);
		$stat->execute();
		$result = $stat->fetchAll();
        $total_row = $stat->rowCount();
		
		foreach($result as $row)
	    {
		
		    if($row['notAllowed']==0){
		    $query = "UPDATE time
            SET notAllowed=1
			WHERE from_to = '".$_POST["id"]."'";
		    $statement = $connect->prepare($query);
		    $statement->execute();
		   }
		   else
			   
			   {
		    $query = "UPDATE time
            SET notAllowed=0
			WHERE from_to = '".$_POST["id"]."'";
		    $statement = $connect->prepare($query);
		    $statement->execute();				   
				   
			   }
		
		}
		
	}
	

}

?>