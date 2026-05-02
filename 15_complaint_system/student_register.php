<?php
include "db.php";

if(isset($_POST['register'])) {
    $user = $_POST['username'];
    $pass = $_POST['password'];

    mysqli_query($conn, "INSERT INTO students(username, password)
    VALUES('$user','$pass')");

    echo "Registration Successful!";
}
?>

<link rel="stylesheet" href="style.css">

<div class="container">
<h2>Student Register</h2>

<form method="POST">
<input type="text" name="username" placeholder="Username" required>
<input type="password" name="password" placeholder="Password" required>
<button name="register">Register</button>
</form>

<a href="student_login.php">Back to Login</a>
</div>