<?php
include 'db.php';

$user = $_POST['user'];
$pass = $_POST['pass'];

$sql = "SELECT * FROM teachers WHERE username='$user' AND password='$pass'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    header("Location: attendance.php");
} else {
    echo "Invalid Login";
}
?>