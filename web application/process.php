<?php
// Database connection parameters
$servername = "localhost";  // Change if using a remote server
$username = "root";         // Your MySQL username
$password = "root123";             // Your MySQL password
$dbname = "students";       // Your database name

// Establish a database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $message = $_POST['message'];

    // Prepare an SQL statement to insert data into the table
    $sql = "INSERT INTO students (name, email, phone, dob, gender, message) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    // Bind parameters
    $stmt->bind_param("ssssss", $name, $email, $phone, $dob, $gender, $message);

    // Execute the statement and check for success
    if ($stmt->execute()) {
        echo "Data inserted successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>
