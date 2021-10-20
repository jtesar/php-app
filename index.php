<?php
 #$servername = "mariadb.jtesar-s2i.svc.cluster.local";
 $servername = $_ENV["MARIADB_SERVICE_HOST"]
 $serviceport = "3306";
 $username = "jtesar";
 $password = "redhat";
 $dbname = "db";

 $conn = new mysqli($servername, $username, $password, $dbname);
 if ($conn->connect_error) {
	   die("Connection failed: " . $conn->connect_error);
 }
	  
  $sql = "select name from names";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
	  while($row = $result->fetch_assoc()) {
		  echo "Name: " . $row["name"]."\n";
          }
  } 
  else {
	    echo "0 results";
  }
  $conn->close();

  echo "New version\n";
?>
