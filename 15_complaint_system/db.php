<?php
$conn = mysqli_connect("localhost", "root", "", "complaint_system", 3307);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>