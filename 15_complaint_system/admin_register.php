<?php
include "db.php";

if(isset($_POST['register'])) {
    $user = $_POST['username'];
    $pass = $_POST['password'];

    mysqli_query($conn, "INSERT INTO admin(username, password)
    VALUES('$user','$pass')");

    echo "Admin Registered!";
}
?>

<link rel="stylesheet" href="style.css">

<div class="container">
<h2>Admin Register</h2>

<form method="POST">
<input type="text" name="username" required>
<input type="password" name="password" required>
<button name="register">Register</button>
</form>

<a href="admin_login.php">Back to Login</a>
</div>