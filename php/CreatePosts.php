<?php
	$username = $_POST["Username"];
	$content = $_POST["Content"];

  	$mysqli = new mysqli("mysql.eecs.ku.edu", "cporras", "Password123!", "cporras");

	if ($mysqli->connect_error) {
		printf("Connect failed: %s\n", $mysqli->connect_error);
		exit();
	}

	if($username != "" && $content != ""){
  		$query = "SELECT user_id FROM Users WHERE user_id = '".$username."'";

		if($mysqli->query($query) == FALSE){
			echo "Error: ".$mysqli->error;
			echo "Username not created. Redirecting to create username page.";
			header("Refresh:5; ../CreateUser.html");
		}
		else{
			$query = "INSERT INTO Posts (content, author_id) VALUES ('".$content."','".$username."')";
			if($mysqli->query($query) == TRUE ){
	  			echo "Post saved.";
	  			header("Refresh:5; ../CreatePosts.html");
  			}
	  		else{
	  			echo "Error: ". $mysqli->error;
	  		}
		}
	}
	elseif($username == ""){
		echo "Username cannot be blank. Redirecting back to post in 10 seconds.";
		header("Refresh:10; ../CreatePosts.html");
	}
	elseif($content == ""){
		echo "Post cannot be blank. Redirecting back to post in 10 seconds.";
		header("Refresh:10; ../CreatePosts.html");
	} 

	$mysqli->close();
?>