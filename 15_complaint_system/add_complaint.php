<?php
session_start();
include "db.php";

$student = $_SESSION['student'];
$complaint = $_POST['complaint'];

mysqli_query($conn, "INSERT INTO complaints(student_name, complaint)
VALUES('$student', '$complaint')");

header("Location: student_dashboard.php");
?>