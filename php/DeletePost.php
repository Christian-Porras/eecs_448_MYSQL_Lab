<?php
  
  $delete = $_POST["Delete"];

  $mysqli = new mysqli("mysql.eecs.ku.edu", "cporras", "Password123!", "cporras");

  if ($mysqli->connect_error) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
  }  

  $query = "DELETE FROM Posts WHERE post_id ='".$delete."'";

  if($mysqli->query($query)){
    echo "Post deleted.";
  }
  else{
    echo "Error: ".$mysqli->error;
  }

  $mysqli->close();
?>