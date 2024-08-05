<?php
session_start();
require_once 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Validate input data
    if ($password != $confirm_password) {
        echo "Passwords do not match.";
        exit;
    }

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert user into database
    $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$hashed_password')";
    if (mysqli_query($conn, $sql)) {
        header("location: login.php");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
<?php
session_start();
require_once 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username_or_email = $_POST['username_or_email'];
    $password = $_POST['password'];

    // Fetch user from database
    $sql = "SELECT * FROM users WHERE username = '$username_or_email' OR email = '$username_or_email'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    if ($row) {
        if (password_verify($password, $row['password'])) {
            $_SESSION['username'] = $row['username'];
            header("location: dashboard.php");
        } else {
            echo "Incorrect password.";
        }
    } else {
        echo "User not found.";
    }
}

mysqli_close($conn);
?>
<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
</head>
<body>
    <h1>Welcome, <?php echo $_SESSION['username']; ?></h1>
    <a href="logout.php">Logout</a>
</body>
</html>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "user_login";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
<?php
session_start();
session_destroy();
header("location: login.php");
exit;
?>
