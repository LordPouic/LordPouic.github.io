<?php

$servername = "hebtanedeviscpa.mysql.db";
$username = "hebtanedeviscpa";
$password = "C59YQxiy5";
$dbname = "hebtanedeviscpa";

$Name = $_POST["Name"];
$Url = $_POST["Url"];

$conn = new mysqli($servername,$username,$password,$dbname);

if ($conn->connect_error){
    die("Connection Failled : ". $conn->connect_error);
}

$sql = "SELECT url FROM link WHERE name = '" . $Name . "'";
$result = $conn->query($sql);

if (!empty($result) && $result->num_rows > 0) {
  
  $sql3 = "UPDATE link SET url = '" .$Url. "' WHERE name = '" .$Name."'";
  
  if ($conn->query($sql3) === TRUE) {
    echo "Succes2";
  } else {
    echo "Error2: " . $sql3 . "<br>" . $conn->error;
  }

  
} else {
  //Create Link
  
  $sql2 = "INSERT into link (name, url) VALUES ('" .$Name."','".$Url."')";;
  
  if ($conn->query($sql2) === TRUE) {
    echo "Succes";
  } else {
    echo "Error: " . $sql2 . "<br>" . $conn->error;
  }
  
}
$conn->close();


?>