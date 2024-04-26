<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "rentmycar";


$connection = mysqli_connect($servername, $username, $password, $database);

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

$vehicle_id = 'vehicle_id';


$vehicle_make = mysqli_real_escape_string($connection, $_GET['vehicle_make']);
$vehicle_model = mysqli_real_escape_string($connection, $_GET['vehicle_model']);
$vehicle_bodytype = mysqli_real_escape_string($connection, $_GET['vehicle_bodytype']);
$fuel_type = mysqli_real_escape_string($connection, $_GET['fuel_type']);
$mileage = mysqli_real_escape_string($connection, $_GET['mileage']);
$year = mysqli_real_escape_string($connection, $_GET['year']);
$location = mysqli_real_escape_string($connection, $_GET['location']);
$num_doors = mysqli_real_escape_string($connection, $_GET['num_doors']);
$video_url = mysqli_real_escape_string($connection, $_GET['video_url']);
$image_url = mysqli_real_escape_string($connection, $_GET['image_url']);

$sql = "UPDATE vehicle_details SET 
        vehicle_make = '$vehicle_make', 
        vehicle_model = '$vehicle_model', 
        vehicle_bodytype = '$vehicle_bodytype', 
        fuel_type = '$fuel_type', 
        mileage = '$mileage', 
        year = '$year', 
        location = '$location', 
        num_doors = '$num_doors', 
        video_url = '$video_url', 
        image_url = '$image_url' 
        WHERE vehicle_id = $vehicle_id";

if (mysqli_query($connection, $sql)) {
    header("Location: Account.php");
    exit();
} else {
    echo "Error updating record: " . mysqli_error($connection);
}

mysqli_close($connection);
?>