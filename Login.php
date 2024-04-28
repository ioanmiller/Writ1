<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SiteLogin</title>
    <link rel="stylesheet" href="Log.css">
</head>
<body>
    <img src="C:\wamp64\www\Writ1Code\Logo.jpg" alt="MyCaravanLogo">
    <h1>Welcome to MyCaravan</h1>
    <div class="Login">
        <?php
        if (isset($_POST["login"])) {
            $Email = $_POST["email"];
            $Password = $_POST["password"];
            require_once "Database.php";
            $sql = "SELECT * FROM users WHERE email = '$Email'";
            $result = mysqli_query($conn, $sql);
            $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
            if ($user) {
                if (password_verify($Password, $user["password"])) {
                    header("Location: HomePage.php");
                    die();
                }else{
                    echo "Password does not match";
                }
            }else{
                echo "Email does not match";
            }
        }
        ?>
        <form action="login.php" method="post">
            <div class="LogForm">
                <input type="email" placeholder="Email: " name="email" class="form-control">
            </div>
            <div class="LogForm">
                <input type="password" placeholder="Password: " name="password" class="form-control">
            </div>
            <div class="LogForm">
                <input type="submit" placeholder="Login" name="login" class="btn btn-primary">
            </div>
        </form>
    <div><p>Don't have an account? <a href="Registration.php">Sign up here </a></p></div>
</body>
</html>