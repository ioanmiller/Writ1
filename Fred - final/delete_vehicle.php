<?php
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$database = "rentmycar";

$connection = mysqli_connect($servername, $username, $password, $database);

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_GET['vehicle_id'])) {
    $vehicle_id = $_GET['vehicle_id'];


    $query = "DELETE FROM vehicle_details WHERE vehicle_id = '$vehicle_id'";
    $result = mysqli_query($connection, $query);

    if ($result) {
        header("Location: Account.php");
        exit(); 
    } else {
        echo "Error deleting vehicle: " . mysqli_error($connection);
    }
} else {
    echo "Vehicle ID not provided in the URL.";
}
?>