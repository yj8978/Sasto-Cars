<?php
include 'server.php';
// Select the database
$conn->select_db($dbname);

$sql = "INSERT INTO cars (name, price, mileage, year, image, stock, category) VALUES
('Toyota Corolla 2019', 15000.00, 35000, 2019, 'assets/carSell1.jpg', 5 , 'sedan'),
('Honda Civic 2020', 17000.00, 22000, 2020, 'assets/tesla.jpg', 3 , 'electric'),
('Ford Mustang 2018', 25000.00, 45000, 2018, 'assets/carSell1.jpg', 2 , 'suv'),
('Hyundai Elantra 2021', 16000.00, 15000, 2021, 'assets/carSell1.jpg', 4 , 'suv'),
('BMW 3 Series 2017', 28000.00, 60000, 2017, 'assets/carSell1.jpg', 1 , 'suv'),
('Tesla Model 3 2022', 35000.00, 10000, 2022, 'assets/tesla.jpg', 2 , 'electric');";

if ($conn->query($sql) === TRUE) {
    echo "Insertion Successful.<br>";
} else {
    die("Error" . $conn->error);
}

$conn->close();

?>