<?php
include 'db.php';
$result = $conn->query("SELECT * FROM students");
?>

<!DOCTYPE html>
<html>
<head>
<title>Attendance</title>
<link rel="stylesheet" href="style.css">
</head>

<body>

<div class="table-container">
<h2>Take Attendance</h2>

<form method="post" action="save_attendance.php">

<table>
<tr>
<th>Roll No</th>
<th>Name</th>
<th>Present</th>
</tr>

<?php while($row = $result->fetch_assoc()) { ?>
<tr>
<td><?php echo $row['roll_no']; ?></td>
<td><?php echo $row['name']; ?></td>
<td>
<input type="checkbox" name="present[]" value="<?php echo $row['id']; ?>">
</td>
</tr>
<?php } ?>

</table>

<button type="submit">Save Attendance</button>

</form>

<p><a href="index.html">⬅ Back to Home</a></p>

</div>

</body>
</html>