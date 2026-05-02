<?php
session_start();
if(!isset($_SESSION['student'])) {
    header("Location: student_login.php");
}
?>

<link rel="stylesheet" href="style.css">

<div class="container">
<h2>Welcome <?php echo $_SESSION['student']; ?></h2>

<form action="add_complaint.php" method="POST">
<textarea name="complaint" placeholder="Enter complaint" required></textarea>
<button>Submit Complaint</button>
</form>

<a href="logout.php">Logout</a>
</div>