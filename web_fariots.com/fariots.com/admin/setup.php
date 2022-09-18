<html>

<body>

	<?php
	date_default_timezone_set("Asia/Bangkok");
	$dbname = 'bisa';
	$dbuser = 'root';
	$dbpass = '';
	$dbhost = 'localhost';

	$connect = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

	// if (mysqli_connect_errno()) {
	// 	echo "Failed to connect to MySQL: " . mysqli_connect_error();
    //     exit();
	// } else {
	// 	echo "Connection Success!<br><br>";
	// }

	$temperature = "";
	$temperature2 = "";
	$temperature3 = "";
	$humidity = "";
	$humidity2 = "";
	$humidity3 = "";
	$co2sensor = "";
	$co2sensor2 = "";
	$co2sensor3 = "";
	$amonia = "";
	$amonia2 = "";
	$amonia3 = "";
	
	if (
		isset($_GET['temperature']) && $_GET['temperature'] != 0 &&
		isset($_GET['temperature2']) && $_GET['temperature2'] != 0 &&
		isset($_GET['temperature3']) && $_GET['temperature3'] != 0 &&
		isset($_GET['humidity']) && $_GET['humidity'] != 0 &&
		isset($_GET['humidity2']) && $_GET['humidity2'] != 0 &&
		isset($_GET['humidity3']) && $_GET['humidity3'] != 0 &&
		isset($_GET['co2sensor']) && $_GET['co2sensor'] != 0 &&
		isset($_GET['co2sensor2']) && $_GET['co2sensor2'] != 0 &&
		isset($_GET['co2sensor3']) && $_GET['co2sensor3'] != 0 &&
		isset($_GET['amonia']) && $_GET['amonia'] != 0 &&
		isset($_GET['amonia2']) && $_GET['amonia2'] != 0 &&
		isset($_GET['amonia3']) && $_GET['amonia3'] != 0
	) {

		$temperature = $_GET["temperature"];
		$temperature2 = $_GET["temperature2"];
		$temperature3 = $_GET["temperature3"];
		$humidity = $_GET["humidity"];
		$humidity2 = $_GET["humidity2"];
		$humidity3 = $_GET["humidity3"];
		$co2sensor = $_GET["co2sensor"];
		$co2sensor2 = $_GET["co2sensor2"];
		$co2sensor3 = $_GET["co2sensor3"];
		$amonia = $_GET["amonia"];
		$amonia2 = $_GET["amonia2"];
		$amonia3 = $_GET["amonia3"];
		$query = "INSERT INTO 'tbl_temp' ('temp_value', 'temp_value2', 'temp_value3', 'temp_humd', 'temp_humd2', 'temp_humd3', 'temp_co2sensor', 'temp_co2sensor2', 'temp_co2sensor3', 'temp_amonia', 'temp_amonia2', 'temp_amonia3')
								VALUES ($temperature, $temperature2, $temperature3, $humidity, $humidity2,  $humidity3, $co2sensor, $co2sensor2, $co2sensor3, $amonia, $amonia2, $amonia3)";
		$result = mysqli_query($connect, $query);
		
	// 	echo "Insertion Success!<br>"; 
	// }
	//  else {
	// 	echo "Insertion Failed!<br>";
	// 	echo "Error: " . mysqli_error($connect);
	 }


	?>
</body>

</html>