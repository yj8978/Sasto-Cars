<?php
include 'server.php';
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create the database if it doesn't exist
$sql = "CREATE DATABASE IF NOT EXISTS $dbname";
if ($conn->query($sql) === TRUE) {
    echo "Database '$dbname' created or already exists.<br>";
} else {
    die("Error creating database: " . $conn->error);
}

// Select the database
$conn->select_db($dbname);

// Create cars table
$table_sql = "CREATE TABLE IF NOT EXISTS cars (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100) NOT NULL,
  price DECIMAL(10,2) NOT NULL,
  mileage INT,
  year INT,
  image VARCHAR(255),
  stock INT(3),
  category VARCHAR(20),
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";
if ($conn->query($table_sql) === TRUE) {
    echo "Table 'cars' created or already exists.";
} else {
    die("Error creating table: " . $conn->error);
}

$conn->close();
?>
