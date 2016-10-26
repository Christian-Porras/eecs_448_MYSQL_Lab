<link type="text/css" href="../css/Lab05StyleSheet.css" rel ="stylesheet"></link>
<?php
  $username = $_POST["Users"];

  $mysqli = new mysqli("mysql.eecs.ku.edu", "cporras", "Password123!", "cporras");

  if ($mysqli->connect_error) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
  }  

  $query = "SELECT post_id,content FROM Posts WHERE author_id ='".$username."'";

  $result = $mysqli->query($query);

  if($result->num_rows > 0 ){
    echo "<h1>Showing Posts by User: ".$username."</h1>";
    echo "<table><tr><th>Post ID</th><th>Post content</th></tr>";
    while($row = $result->fetch_assoc()){
      echo "<tr><td>".$row["post_id"]."</td><td>".$row["content"]."</td><tr>";
    }
    echo "</table>";
  }
  else{
    echo "User ".$username." has no posts.";
  }

  echo "<br>";
  echo "<button onclick = \"window.location.href='../AdminHome.html'\">Return to Admin Page</button>";
  echo "<button onclick = \"window.location.href='../ViewUserPosts.html'\">Return to View User Posts Page</button>";

  $mysqli->close();
?>