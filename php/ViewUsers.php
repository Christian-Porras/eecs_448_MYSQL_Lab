<?php
  	$mysqli = new mysqli("mysql.eecs.ku.edu", "cporras", "Password123!", "cporras");

	if ($mysqli->connect_error) {
		printf("Connect failed: %s\n", $mysqli->connect_error);
		exit();
	}

	$query = "SELECT * FROM Users WHERE 1";
	$result = $mysqli->query($query);

	if($result->num_rows > 0 ){
		$currentRow = 1;
		while($row = $result->fetch_assoc()){
			echo "user_id".$currentRow.": ".$row["user_id"]."<br>";
			$currentRow = $currentRow + 1;
		}
	}
	else{
		echo "No users found.";
	}

	$mysqli->close();
?>