<?php
// Set up the database connection
$servername = "localhost";
$username = "fairwin";
$password = "Raju@921901000";
$dbname = "fairwin";

// Create the database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the database connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Execute the SQL query
$sql = "DELETE t1 FROM `crashgamerecord` t1
        LEFT JOIN (
            SELECT id FROM `crashgamerecord` ORDER BY id DESC LIMIT 30
        ) t2 ON t1.id = t2.id
        WHERE t2.id IS NULL";

if ($conn->query($sql) === TRUE) {
    echo "Records deleted successfully";
} else {
    echo "Error deleting records: " . $conn->error;
}

// Close the database connection
$conn->close();
?>
