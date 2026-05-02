<?php
include 'db.php';

$name = $_POST['name'];
$roll = $_POST['roll'];
$email = $_POST['email'];
$password = $_POST['password'];

$sql = "INSERT INTO students (name, roll_no, email, password)
        VALUES ('$name', '$roll', '$email', '$password')";

if ($conn->query($sql)) {
    echo "Registered Successfully!";
} else {
    echo "Error: " . $conn->error;
}
?>