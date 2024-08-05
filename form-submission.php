<?php
// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "store";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    error_log("Connection failed: " . $conn->connect_error);
    http_response_code(500);
    echo "An error occurred while processing your request. Please try again later.";
    exit;
}

// Retrieve and sanitize form data
$name = mysqli_real_escape_string($conn, $_POST['name']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$phone = mysqli_real_escape_string($conn, $_POST['phone']);
$gender = mysqli_real_escape_string($conn, $_POST['gender']);
$country = mysqli_real_escape_string($conn, $_POST['country']);

// Validate inputs
if (empty($name) || empty($email) || empty($phone) || empty($gender) || empty($country)) {
    http_response_code(400);
    echo "All fields are required.";
    exit;
}
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    http_response_code(400);
    echo "Invalid email format.";
    exit;
}
if (!preg_match('/^\d{10}$/', $phone)) {
    http_response_code(400);
    echo "Phone number must contain 10 digits.";
    exit;
}

// Insert data into the database
$sql = "INSERT INTO information (name, email, phone, gender, country) VALUES (?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssss", $name, $email, $phone, $gender, $country);

if ($stmt->execute()) {
    http_response_code(201);
    echo "New record created successfully";
} else {
    error_log("Error: " . $sql . "<br>" . $conn->error);
    http_response_code(500);
    echo "An error occurred while processing your request. Please try again later.";
}

// Close statement and connection
$stmt->close();
$conn->close();
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Submission</title>
</head>
<body>
    <form action="submit.php" method="post">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>

        <label for="phone">Phone:</label>
        <input type="text" id="phone" name="phone" pattern="\d{10}" required><br>

        <label for="gender">Gender:</label>
        <select id="gender" name="gender" required>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
            <option value="Other">Other</option>
        </select><br>

        <label for="country">Country:</label>
        <input type="text" id="country" name="country" required><br>

        <button type="submit">Submit</button>
    </form>
</body>
</html>