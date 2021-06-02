<?php

$servername = "hebtanedeviscpa.mysql.db";
$username = "hebtanedeviscpa";
$password = "C59YQxiy5";
$dbname = "hebtanedeviscpa";

$UserName = $_POST["username"];
$DateLogin = $_POST["datelogin"];
$timespent = $_POST["timespent"];
$SalonPrincipal = $_POST["Salonprincipal"];
$SalleCinema = $_POST["Sallecinema"];
$SalleZoom = $_POST["SalleZoom"];
$SalleBrochures = $_POST["Salledesbrochures"];
$Toilettes = $_POST["Toilettes"];
$links = $_POST["links"];

$conn = new mysqli($servername,$username,$password,$dbname);

if ($conn->connect_error){
    die("Connection Failled : ". $conn->connect_error);
}

$sql = "SELECT id FROM user WHERE login = '" . $UserName . "'";
$result = $conn->query($sql);

if (!empty($result) && $result->num_rows > 0) {
  
  while($row = $result->fetch_assoc()) {
    $userid = $row["id"];
    $sql2 = "INSERT into visite (iduser, datelogin, timespent, Salonprincipal, Sallecinema, SalleZoom, Salledesbrochures, Toilettes, links ) 
    VALUES ('" .$userid."','".$DateLogin."','".$timespent."','".$SalonPrincipal."','".$SalleCinema."','".$SalleZoom."','".$SalleBrochures."','".$Toilettes."','".$links."')";

    if ($conn->query($sql2) === TRUE) {
        echo "Succes";
    } else {
        echo "Error: " . $sql2 . "<br>" . $conn->error;
    }
  }
  
} else {
  //Error
  echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();


?>