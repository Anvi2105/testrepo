<?php
$conn = new mysqli("localhost", "root", "", "session_demo",3307);

if ($conn->connect_error) {
    die("Failed: " . $conn->connect_error);
}

echo "Connected successfully!";
?>