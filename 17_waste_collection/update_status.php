<?php
require "db.php";

$id = $_POST['id'];
$status = $_POST['status'];

$sql = "UPDATE waste_requests SET status='$status' WHERE id=$id";

if (mysqli_query($conn, $sql)) {
    header("Location: admin.php");
} else {
    echo "Error updating status: " . mysqli_error($conn);
}
?>