<!DOCTYPE HTML>
<?php 
$servername = "localhost";
$username = "student_11902966";
$password = "3elw5t9f1d7h";
$dbname = "student_11902966";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql="SELECT * FROM data_iot WHERE id = 1";
$result = mysqli_query($conn,$sql);

$dataPoints=array();
while($row = mysqli_fetch_array($result)) {
	$Time=strtotime($row['tijd'])*1000;
	$dataPoints[]=array("x"=>$Time,"y"=>$row['waarde']);  	
}
$sql="SELECT * FROM data_iot WHERE id = 2";
$result = mysqli_query($conn,$sql);

$dataPoints2=array();
while($row = mysqli_fetch_array($result)) {
	$Time=strtotime($row['tijd'])*1000;
	$dataPoints2[]=array("x"=>$Time,"y"=>$row['waarde']);
   	
}
mysqli_close($conn);
?>

<html>
<head>
<script>
window.onload = function() {

var dataPoints = [];

var options =  {
	animationEnabled: true,
	zoomEnabled: true,
	theme: "light1",
	title: {
		text: "Grafiek sensoren"
	},
	axisX: {
		title: "Tijd",
	},
	axisY: {
		title: "Waarde",
	},
	legend: {
		cursor: "pointer",
		itemclick: toggleDataSeries
	},
	data: [{
		type: "line",
		name: "Temperatuur",
		markerSize: 5,
		xValueFormatString: "DD/MM/YYYY hh;mm;ss",
		xValueType: "dateTime",
		yValueFormatString: "#,##0.##°C",
		showInLegend: true,
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	},{
		type: "line",
		name: "humititie",
		markerSize: 5,
		xValueFormatString: "DD/MM/YYYY hh;mm;ss",
		xValueType: "dateTime",
		yValueFormatString: "#,##0.##l%",
		showInLegend: true,
		dataPoints: <?php echo json_encode($dataPoints2, JSON_NUMERIC_CHECK); ?>
	}]
};

$("#chartContainer").CanvasJSChart(options);

function toggleDataSeries(e) {
	if (typeof (e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
		e.dataSeries.visible = false;
	} else {
		e.dataSeries.visible = true;
	}
	e.chart.render();
}
 
}
</script>
</head>
<body>
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
<script src="https://canvasjs.com/assets/script/jquery.canvasjs.min.js"></script>
</body>
</html>