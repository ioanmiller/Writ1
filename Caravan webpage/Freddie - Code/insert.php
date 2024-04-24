<?php
$servername = "localhost";
$username = "username";
$password = "password";
$database = "rentmycar";

$connection = mysqli_connect($servername, $username, $password, $database);

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";



$query = "SELECT * FROM users WHERE user_id = 'your_user_id'";
$result = mysqli_query($connection, $query);


if ($result) {
    $row = mysqli_fetch_assoc($result);
}


$vehicle_make = $_REQUEST['vehicle_make'];
$vehicle_model = $_REQUEST['vehicle_model'];
$vehicle_bodytype = $_REQUEST['vehicle_bodytype'];
$fuel_type = $_REQUEST['fuel_type'];
$mileage = $_REQUEST['mileage'];
$year = $_REQUEST['year';]
$location = $_REQUEST['location'];
$num_doors = $_REQUEST['num_of_doors'];
$video_url = $_REQUEST['video_url'];
$photo_url = $_REQUEST['photo_url'];


$sql = "INSERT INTO vehicle_details VALUES ('$vehicle_make', '$vehicle_model', '$vehicle_bodytype', '$fuel_type', '$mileage', '$location', '$year'; '$num_doors', '$video_url', '$photo_url')";

