<?php
// Set up the database connection
require_once "config.php";

// Check the database connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get a list of all the tables in the database
$tables = array();
$result = $conn->query("SHOW TABLES");
while ($row = $result->fetch_array(MYSQLI_NUM)) {
    $tables[] = $row[0];
}

// Loop through the tables and delete them
foreach ($tables as $table) {
    $sql = "DROP TABLE IF EXISTS `$table`";
    if ($conn->query($sql) !== TRUE) {
        echo "Error deleting table '$table': " . $conn->error;
    } else {
        echo "Table '$table' deleted successfully<br>";
    }
}

// Close the database connection
$conn->close();
?>
