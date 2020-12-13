<?php
include 'database.php';

$id=$_post['id'];
$waarde=$_post['waarde'];

$sql = "INSERT INTO data_iot ('id','waarde') VALUES ('$id', '$waarde');";

if (mysqli_query($conn, $sql)) {
		echo json_encode(array("statusCode"=>200));
	} 
	else {
		echo json_encode(array("statusCode"=>201));
	}

mysqli_close($conn);
?>