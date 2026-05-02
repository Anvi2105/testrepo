<?php
session_start();
include "db.php";

if(!isset($_SESSION['admin'])) {
    header("Location: admin_login.php");
}

$result = mysqli_query($conn, "SELECT * FROM complaints");
?>

<link rel="stylesheet" href="style.css">

<h2 style="text-align:center;">All Complaints</h2>

<table>
<tr>
<th>ID</th>
<th>Student</th>
<th>Complaint</th>
<th>Date</th>
</tr>

<?php
while($row = mysqli_fetch_assoc($result)) {
?>
<tr>
<td><?php echo $row['id']; ?></td>
<td><?php echo $row['student_name']; ?></td>
<td><?php echo $row['complaint']; ?></td>
<td><?php echo $row['date']; ?></td>
</tr>
<?php } ?>
</table>

<a href="logout.php">Logout</a>