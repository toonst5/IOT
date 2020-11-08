<?php
$servername = "localhost";
$username = "student_11902966";
$password = "3elw5t9f1d7h";
$dbname = "student_11902966";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$query = "SELECT * FROM  `invoices` ORDER BY OrderDate LIMIT 0 , 100";
	$result = mysql_query($query);
	// get data and store in a json array
	while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
		$orders[] = array(
			'OrderDate' => $row['OrderDate'],
			'ProductName' => $row['ProductName'],
			'Quantity' => $row['Quantity']
		  );
	}
  
	echo json_encode($orders);
?>