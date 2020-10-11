<?php
$servername = "localhost";
$username = "student_11902966";
$password = "3elw5t9f1d7h";
$dbname = "student_11902966";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// sql to delete a record
$sql ="DELETE FROM MyGuests WHERE id>=1";


if (mysqli_query($conn, $sql)) {
  echo "Records deleted successfully";
} else {
  echo "Error deleting record: " . mysqli_error($conn);
}

mysqli_close($conn);
?>