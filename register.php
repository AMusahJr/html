<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Connect to MySQL database
    $conn = new mysqli("localhost", "root", "", "registration");

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get user inputs from the form
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];

    // Insert data into the app_user table
    $sql = "INSERT INTO app_user (fname, lname) VALUES ('$fname', '$lname')";

    if ($conn->query($sql) === TRUE) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>
