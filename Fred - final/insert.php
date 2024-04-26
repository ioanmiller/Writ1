<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "rentmycar";

$connection = mysqli_connect($servername, $username, $password, $database);

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";


$vehicle_make = mysqli_real_escape_string($connection, $_REQUEST['vehicle_make']);
$vehicle_model = mysqli_real_escape_string($connection, $_REQUEST['vehicle_model']);
$vehicle_bodytype = mysqli_real_escape_string($connection, $_REQUEST['vehicle_bodytype']);
$fuel_type = mysqli_real_escape_string($connection, $_REQUEST['fuel_type']);
$mileage = mysqli_real_escape_string($connection, $_REQUEST['mileage']);
$year = mysqli_real_escape_string($connection, $_REQUEST['year']);
$location = mysqli_real_escape_string($connection, $_REQUEST['location']);
$num_doors = mysqli_real_escape_string($connection, $_REQUEST['num_doors']);
$video_url = mysqli_real_escape_string($connection, $_REQUEST['video_url']);
$image_url = mysqli_real_escape_string($connection, $_REQUEST['image_url']);

$sql = "INSERT INTO vehicle_details (vehicle_make, vehicle_model, vehicle_bodytype, fuel_type, mileage, location, year, num_doors, video_url, image_url) VALUES ('$vehicle_make', '$vehicle_model', '$vehicle_bodytype', '$fuel_type', '$mileage', '$location', '$year', '$num_doors', '$video_url', '$image_url')";

if (mysqli_query($connection, $sql)) {
    echo "New record inserted successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($connection);
}

mysqli_close($connection);
?>