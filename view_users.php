<?php
// Connect to MySQL database
$conn = new mysqli("localhost", "root", "", "registration");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch all users from the app_user table
$sql = "SELECT * FROM app_user";
$result = $conn->query($sql);

// Display users in a table
echo "<h2>All Users</h2>";
echo "<table border='1'>";
echo "<tr><th>User ID</th><th>First Name</th><th>Last Name</th></tr>";

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["user_id"] . "</td>";
        echo "<td>" . $row["fname"] . "</td>";
        echo "<td>" . $row["lname"] . "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='3'>No users found</td></tr>";
}

echo "</table>";

// Close the database connection
$conn->close();
?>
