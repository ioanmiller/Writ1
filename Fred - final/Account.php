<?php
$servername = "localhost";
$username = "root";
$password = ""; 
$database = "rentmycar"; 

$connection = mysqli_connect($servername, $username, $password, $database);

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

$user_id = 'user_id'; 
$query_user = "SELECT * FROM users WHERE user_id = '$user_id'";
$result_user = mysqli_query($connection, $query_user);


$user_row = mysqli_fetch_assoc($result_user);

$query_vehicles = "SELECT * FROM vehicle_details WHERE user_id = '$user_id'";
$result_vehicles = mysqli_query($connection, $query_vehicles);
?>





<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Account</title>
        <link rel="stylesheet" href="Nav.css">
        <link rel="stylesheet" href="AccountStyle.css">
        <link rel="icon" type="image/x-icon" href="logo.png">
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


        <div class="containerLeft">
            <table>
                <tr>
                    <th>Details</th>
                    <th>User</th>
                </tr>
                <tr>
                    <td>User ID</td>
                    <td><?php echo $user_row['user_id']; ?></td>
                </tr>
                <tr>
                    <td>Username</td>
                    <td><?php echo $user_row['username']; ?></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><?php echo $user_row['PASSWORD']; ?></td>
                </tr>
                <tr>
                    <td>Title</td>
                    <td><?php echo $user_row['title']; ?></td>
                </tr>
                <tr>
                    <td>Firstname</td>
                    <td><?php echo $user_row['first_name']; ?></td>
                </tr>
                <tr>
                    <td>Lastname</td>
                    <td><?php echo $user_row['last_name']; ?></td>
                </tr>
                <tr>
                    <td>Gender</td>
                    <td><?php echo $user_row['gender']; ?></td>
                </tr>
                <tr>
                    <td>Postcode</td>
                    <td><?php echo $user_row['postcode']; ?></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><?php echo $user_row['email']; ?></td>
                </tr>
                <tr>
                    <td>Telephone</td>
                    <td><?php echo $user_row['telephone']; ?></td>
                </tr>
              </table>
        </div>

        <div class="containerRight">
            <table>
                <tr>
                    <th>Vehicle ID</th>
                    <th>Vehicle Make</th>
                    <th>Vehicle Model</th>
                    <th>Photo</th>
                </tr>
                <?php
                while ($vehicle_row = mysqli_fetch_assoc($result_vehicles)) {
                    echo "<tr>";
                    echo "<td>" . "<a href='ManageCaravan.php?vehicle_id=" . $vehicle_row['vehicle_id'] . "'>" . $vehicle_row['vehicle_id'] . "</a>" . "</td>";
                    echo "<td>" . $vehicle_row['vehicle_make'] . "</td>";
                    echo "<td>" . $vehicle_row['vehicle_model'] . "</td>";
                    echo "<td>" . $vehicle_row['image_url'] . "</td>";
                    echo "</tr>";
                }
                ?>
            </table>
        </div>

        <div class="btn-container">
            <button onclick="window. open('AddCaravan.php')">Add Caravan</button>
        </div>  
        <button class="add-btn">Log out</button>
       
    </body>
</html>