<?php
include 'db.php';

$date = date("Y-m-d");
$present = isset($_POST['present']) ? $_POST['present'] : [];

$result = $conn->query("SELECT * FROM students");

while($row = $result->fetch_assoc()) {
    $id = $row['id'];

    if (in_array($id, $present)) {
        $status = "Present";
    } else {
        $status = "Absent";
    }

    $conn->query("INSERT INTO attendance (student_id, date, status)
                  VALUES ('$id', '$date', '$status')");
}

echo "Attendance Saved Successfully!";
?>