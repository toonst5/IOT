<?php 
$servername = "localhost";
$username = "student_11902966";
$password = "3elw5t9f1d7h";
$dbname = "student_11902966";

$id = $_POST["id"];
$waarde = $_POST["waarde"];
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "INSERT INTO data_iot (id, waarde, tijd) VALUES ($id, $waarde, now())";
if ($conn->query($sql) === TRUE) {
  echo "New record created successfully!";
}
else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>