<?php

$servername = "hebtanedeviscpa.mysql.db";
$username = "hebtanedeviscpa";
$password = "C59YQxiy5";
$dbname = "hebtanedeviscpa";

$loginUser = $_POST["loginUser"];
$loginPassword = $_POST["loginPassword"];

$conn = new mysqli($servername,$username,$password,$dbname);

if ($conn->connect_error){
    die("Connection Failled : ". $conn->connect_error);
}


$sql = "SELECT password,id FROM user WHERE login = '" . $loginUser . "'";
$result = $conn->query($sql);

if (!empty($result) && $result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    if ($row["password"] == $loginPassword)
    {
        echo $row["id"];
    }
    else 
    {
        echo "-1";
    }
  }
} else {
  echo "-1";
}
$conn->close();


?>