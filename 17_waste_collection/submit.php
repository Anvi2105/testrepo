<?php
require "db.php";

$name = $_POST['name'];
$phone = $_POST['phone'];
$waste_type = $_POST['waste_type'];
$quantity = $_POST['quantity'];
$location = $_POST['location'];
$description = $_POST['description'];

$sql = "INSERT INTO waste_requests 
(name, phone, waste_type, quantity, location, description)
VALUES 
('$name', '$phone', '$waste_type', '$quantity', '$location', '$description')";

if (mysqli_query($conn, $sql)) {
    echo "
    <link rel='stylesheet' href='style.css'>
    <div class='message-box'>
        <h2>Request Submitted Successfully!</h2>
        <p>The concerned authority will collect and manage the waste.</p>
        <a href='index.php'>Submit Another Request</a>
    </div>";
} else {
    echo "Error: " . mysqli_error($conn);
}
?>