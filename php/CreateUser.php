<?php
  $username = $_POST["Username"];
  $password = $_POST["Password"];

  $mysqli = new mysqli("mysql.eecs.ku.edu", "cporras", "Password123!", "cporras");

  if ($mysqli->connect_error) {
  	printf("Connect failed: %s\n", $mysqli->connect_error);
  	exit();
  }

  if ($username != "") {
  	$query = "SELECT user_id FROM Users WHERE user_id = '".$username."'";
  	$result = mysql_query($query);

  	if ($result == FALSE){
  		$query = "INSERT INTO Users VALUES ('".$username."')";
  		if($mysqli->query($query) == TRUE ){
  			echo "Username ". $username. " saved.";
  		}
  		else{
  			echo "Error: ". $mysqli->error;
  		}
  	}
  	else{
  		echo "User not saved because username already exists.";
  		exit();
  	}
  }
  else{
  	echo "Username cannot be blank.";
  	exit();
  }

echo "<br>";
echo "<button onclick = \"window.location.href='../Lab5Index.html'\">Return to Home Page</button>";
echo "<button onclick = \"window.location.href='../CreatePosts.html'\">Create Posts</button>";

$mysqli->close();  


 ?>
