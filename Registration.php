<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SiteRegistration</title>
    <link rel="stylesheet" href="Reg.css">
</head>
<body>
    <img src="C:\wamp64\www\Writ1Code\Logo.jpg" alt="MyCaravanLogo">
    <h1>Registration for MyCaravan</h1>
    <div class="Registration">
        <?php
        if (isset($_POST["Submit"])) {
            $FullName = $_POST["name"];
            $Email = $_POST["email"];
            $Password = $_POST["password"];
            $PasswordRepeat = $_POST["repeat-password"];
            $PasswordHash = password_hash($Password, PASSWORD_DEFAULT);
            $errors = array();
            if (empty($FullName) || empty($Email) || empty($Password) || empty($PasswordRepeat)) {
                array_push($errors, "All fields are required");
            }
            if (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
                array_push($errors, "Email is not valid");
            }
            require_once "Database.php";
            $sql = "SELECT * FROM user WHERE email = '$Email'";
            $result = mysqli_query($conn, $sql);
            $RowCount = mysqli_num_rows($result);
            if ($RowCount > 0) {
                array_push($errors, "Email already exists");
            }
            if (strlen($Password) < 8) {
                array_push($errors, "Password must be at least 8 characters long");
            }
            if ($Password !== $PasswordRepeat) {
                array_push($errors, "Password does not match");
            }
            if (count($errors) > 0) {
                foreach ($errors as $error) {
                    echo "<div class='failure occurred'>$error</div>";
                }
            } else {
                $sql = "INSERT INTO user (FullName, Email, Password) VALUES (?, ?, ?)";
                $stmt = mysqli_stmt_init($conn);
                $prepareStmt = mysqli_stmt_prepare($stmt, $sql);
                if ($prepareStmt) {
                    mysqli_stmt_bind_param($stmt, "sss", $FullName, $Email, $PasswordHash);
                    mysqli_stmt_execute($stmt);
                    echo "Successfully added";
                } else {
                    die("An error occurred");
                }
            }
        }
        ?>
        <form action="Registration.php" method="post">
            <div class="RegForm">
                <input type="text" class="form-control" name="name" placeholder="Full Name">
            </div>
            <div class="RegForm">
                <input type="email" class="form-control" name="email" placeholder="Email">
            </div>
            <div class="RegForm">
                <input type="password" class="form-control" name="password" placeholder="Password">
            </div>
            <div class="RegForm">
                <input type="password" class="form-control" name="repeat-password" placeholder="Repeat Password">
            </div>
            <div class="RegForm">
                <input type="submit" class="btn btn-primary" value="Register" name="Submit">
            </div>
        </form>
        <div><p>Already have an account? <a href="Login.php">Sign in here </a></p></div>
    </div>
</body>
</html>
