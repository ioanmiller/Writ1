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

    $query = "SELECT * FROM vehicle_details WHERE vehicle_id = '$vehicle_id'";
    $result = mysqli_query($connection, $query);

 
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
    } else {
        echo "No vehicle details found for the provided vehicle ID.";
    }
} else {
    echo "Vehicle ID not provided in the URL.";
}
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Manage Caravan</title>
        <link rel="stylesheet" href="Nav.css">
        <link rel="stylesheet" href="AccountStyle.css">
        <link rel="icon" type="image/x-icon" href="logo.png">
        <script>
            function confirmDelete() {
                if (confirm("Are you sure you want to delete this vehicle? \n The data will not be able to be retrieved after this.")) {
                    window.location.href = "delete_vehicle.php?vehicle_id=<?php echo $row['vehicle_id']; ?>";
                }
            }
        </script>
    </head>
    <body>
 
        <ul>
            <li><a href="#">Home</a></li>
            <li>
                <a href="#">Caravans ↓</a>
                <ul class="DropDownBarCara">
                    <li><a href="#">View Caravans</a></li>
                    <li><a href="#">Buy/Rent Caravans</a></li>
                </ul>
            </li>
            <li>
                <a href="#">About us ↓</a>
                <ul class="DropDownBarAbt">
                    <li><a href="#">Our history</a></li>
                    <li><a href="#">Frequented Questions</a></li>
                </ul>
            </li>
            <li><a href="Account.php">Your Account</a></li>
        </ul>

        <div class="mngContainerLeft">
            <table>

                <tr>
                    <th>Details</th>
                    <th>Caravan</th>
                </tr>

                <tr>
                    <td>Vehicle ID</td>
                    <td><?php echo $row['vehicle_id']; ?></td>
                </tr>

                <tr>
                    <td>Vehicle Make</td>
                    <td><?php echo $row['vehicle_make']; ?></td>
                </tr>

                <tr>
                    <td>Vehicle Model</td>
                    <td><?php echo $row['vehicle_model']; ?></td>
                </tr>

                <tr>
                    <td>Vehicle Bodytype</td>
                    <td><?php echo $row['vehicle_bodytype']; ?></td>
                </tr>

                <tr>
                    <td>Fuel Type</td>
                    <td><?php echo $row['fuel_type']; ?></td>
                </tr>

                <tr>
                    <td>Mileage</td>
                    <td><?php echo $row['mileage']; ?></td>
                </tr>

                <tr>
                    <td>Location</td>
                    <td><?php echo $row['location']; ?></td>
                </tr>

                <tr>
                    <td>Year</td>
                    <td><?php echo $row['year']; ?></td>
                </tr>

                <tr>
                    <td>Number of Doors</td>
                    <td><?php echo $row['num_doors']; ?></td>
                </tr>

                <tr>
                    <td>Video URL</td>
                    <td><?php echo $row['video_url']; ?></td>
                </tr>

                <tr>
                    <td>Photo URL</td>
                    <td><?php echo $row['image_url']; ?></td>
                </tr>

            </table>

        </div>

        <div class="mngContainerRight">
            <p>Enter new caravan details:</p><br><br>
            <form action="update.php">
                <label for="vehicleMake">Vehicle Make:</label>
                <input type="text" id="vehicleMake" name="vehicle_make"><br><br>

                <label for="vehicleModel">Vehicle Model:</label>
                <input type="text" id="vehicleModel" name="vehicle_model"><br><br>
                
                <label for="vehicleBodytype">Vehicle Bodytype:</label>
                <input type="text" id="vehicleBodytype" name="vehicle_bodytype"><br><br>

                <label for="fuelType">Fuel Type:</label>
                <input type="text" id="fuelType" name="fuel_type"><br><br>

                <label for="Mileage">Mileage:</label>
                <input type="text" id="Mileage" name="mileage"><br><br>

                <label for="Location">Location:</label>
                <input type="text" id="Location" name="location"><br><br>

                <label for="Year">Year of Model:</label>
                <input type="text" id="Year" name="year"><br><br>

                <label for="numOfDoors">Number of Doors:</label>
                <input type="text" id="numOfDoors" name="num_doors"><br><br>

                <label for="videoUrl">Links for Video:</label>
                <input type="text" id="videoUrl" name="video_url"><br><br>

                <label for="imageUrl">Links for Picture:</label>
                <input type="text" id="imageUrl" name="image_url"><br><br>

                <input type="submit" value="Submit">
              </form>
        </div>

        <button class="delete-btn" onclick="confirmDelete()">Delete Vehicle</button>

    </body>    
</html>