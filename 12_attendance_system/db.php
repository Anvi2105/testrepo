<?php
$conn = new mysqli("localhost", "root", "", "attendance_system",3307);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>