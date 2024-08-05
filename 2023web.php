
<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "store";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $gender = $_POST["gender"];
    $country = $_POST["country"];

    // Validate all fields are filled
    if (empty($name) || empty($email) || empty($phone) || empty($gender) || empty($country)) {
        echo "All fields are required.";
        exit;
    }

    // Validate phone number (10 digits)
    if (!preg_match("/^[0-9]{10}$/", $phone)) {
        echo "Phone number must contain 10 digits.";
        exit;
    }

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format.";
        exit;
    }

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO information (name, email, phone, gender, country) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $name, $email, $phone, $gender, $country);

    // Execute the statement
    if ($stmt->execute()) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Form Validation</title>
</head>
<body>
    <form action="process_form.php" method="post">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>

        <label for="phone">Phone:</label>
        <input type="text" id="phone" name="phone" required><br>

        <label for="gender">Gender:</label>
        <select id="gender" name="gender" required>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
            <option value="Other">Other</option>
        </select><br>

        <label for="country">Country:</label>
        <input type="text" id="country" name="country" required><br>

        <input type="submit" value="Submit">
    </form>
</body>
</html>
