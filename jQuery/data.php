<?php
$servername = "localhost";
$username = "student_11902966";
$password = "3elw5t9f1d7h";
$dbname = "student_11902966";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$from = 0;
$to = 3;
$query = "SELECT tijd, waarde FROM data_iot WHERE id = 1 LIMIT ?, ?";
$result = $conn->prepare($query);
$result->bind_param("ii", $from, $to);
$result->execute();
/* bind result variables */
$result->bind_result($tijd, $waarde);
/* fetch values */
while ($result->fetch())
	{
	$orders[] = array(
		'tijd' => $tijd,
		'waarde' => $waarde
	);
	}
echo json_encode($orders);
/* close statement */
$result->close();
/* close connection */
$conn->close();
	
	
?>