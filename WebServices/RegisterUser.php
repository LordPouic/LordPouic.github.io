<?php

$servername = "hebtanedeviscpa.mysql.db";
$username = "hebtanedeviscpa";
$password = "C59YQxiy5";
$dbname = "hebtanedeviscpa";

$loginUser = $_POST["loginUser"];
$loginMail = $_POST["loginMail"];
$loginPassword = $_POST["loginPassword"];
$isAdmin = $_POST["isAdmin"];

$conn = new mysqli($servername,$username,$password,$dbname);

if ($conn->connect_error){
    die("Connection Failled : ". $conn->connect_error);
}

$sql = "SELECT password FROM user WHERE usermail = '" . $loginMail . "'";
$result = $conn->query($sql);

if (!empty($result) && $result->num_rows > 0) {
  // output data of each row
  echo "Username already created";

  
} else {
  $date = date("Y-m-d H:i:s");
  $sql2 = "INSERT INTO user (login, usermail, password, accountcreation, isadmin)
    VALUES ('" . $loginUser . "','" . $loginMail . "', '" . $loginPassword . "', '" . $date . "','" .$isAdmin. "' )";
  
  if ($conn->query($sql2) === TRUE) {
    echo "Succes";
  } else {
    echo "Error: " . $sql2 . "<br>" . $conn->error;
  }
  
}
$conn->close();


?>