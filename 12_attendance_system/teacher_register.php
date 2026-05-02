<?php
include 'db.php';

$user = $_POST['user'];
$pass = $_POST['pass'];

$sql = "INSERT INTO teachers (username, password)
        VALUES ('$user', '$pass')";

if ($conn->query($sql)) {
    echo "Teacher Registered!";
} else {
    echo "Error: " . $conn->error;
}
?>