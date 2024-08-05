
<?php
// Initialize database connection
$con = mysqli_connect("host", "username", "password", "database");

// Login form processing
if(isset($_POST['submit'])){
    $username = mysqli_real_escape_string($con, $_POST["username"]); // Sanitize input
    $password = $_POST["password"]; // Do not hash the password yet

    // Query to check whether user exists or not
    $sql = "SELECT * FROM users WHERE username='$username' OR email='$username'";
    $result = mysqli_query($con, $sql);

    if($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        if(password_verify($password, $row['password'])) {
            $_SESSION['username'] = $row['username'];
            echo "<script>alert('Login Successful!');window.location='dashboard.php';</script>";
            exit();
        } else {
            echo "Invalid username/email or password!";
        }
    } else {
        echo "User does not exist!";
    }
}

// Close database connection
mysqli_close($con);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h2>Registration form</h2>
    <form method="post" action="">
        <input type="text" name="username" placeholder="Enter username"/><br/><br/>
        <input type="email" name="email" placeholder="Enter email"/><br/><br/>
        <input type="password" name="password" placeholder="Enter Password"/><br/><br/>
        <input type="password" name="cpassword" placeholder="Enter Confirm Password"/><br/><br/>
        <input type="submit" value="Register" name="register">
    </form>
    
    <h2>Login form</h2>
    <form method="post" action="">
        <label for="username">Username or Email:</label><br>
        <input type="text" id="username" name="username"><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password"><br>
        <button type="submit" name="submit">Login</button>
    </form>
</body>
</html>
