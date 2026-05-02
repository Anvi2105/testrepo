<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "waste_system";
$port = 3307; // change to 3306 if your MySQL uses 3306

$conn = mysqli_connect($host, $user, $password, $database, $port);

if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}
?>