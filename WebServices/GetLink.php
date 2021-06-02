<?php

$servername = "hebtanedeviscpa.mysql.db";
$username = "hebtanedeviscpa";
$password = "C59YQxiy5";
$dbname = "hebtanedeviscpa";

$LinkName = $_POST["Name"];

$conn = new mysqli($servername,$username,$password,$dbname);

if ($conn->connect_error){
    die("Connection Failled : ". $conn->connect_error);
}

$sql = "SELECT url FROM link WHERE name = '" . $LinkName . "'";
$result = $conn->query($sql);

if (!empty($result) && $result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo $row["url"];
  }
} else {
  echo "";
}
$conn->close();


?>