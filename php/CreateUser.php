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
  			header("Refresh:5; ../CreatePosts.html");
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

$mysqli->close();  


 ?>
