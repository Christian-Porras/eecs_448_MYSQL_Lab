<link type="text/css" href="../css/Lab05StyleSheet.css" rel ="stylesheet"></link>

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
		echo "<table><tr><th>User Number</th><th>Username</th></tr>";
		while($row = $result->fetch_assoc()){
			echo "<tr><td>".$currentRow."</td><td>".$row["user_id"]."</td></tr>";
			$currentRow = $currentRow + 1;
		}
		echo "</table>";
	}
	else{
		echo "No users found.";
	}

	 echo "<button onclick = \"window.location.href='../AdminHome.html'\">Return to Admin Page</button>";

	$mysqli->close();
?>