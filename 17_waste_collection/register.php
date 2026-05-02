<?php
require_once "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $hashed = md5($password);

    $sql = "INSERT INTO users (name,email,password) VALUES ('$name','$email','$hashed')";

    if (mysqli_query($conn, $sql)) {
        echo "Registered Successfully <a href='login.php'>Login</a>";
    }
}
?>

<link rel="stylesheet" href="style.css">

<div class="container">
<div class="card">
<h1>Register</h1>

<form method="POST">
<input type="text" name="name" placeholder="Name" required>
<input type="email" name="email" placeholder="Email" required>
<input type="password" name="password" placeholder="Password" required>

<button type="submit">Register</button>
</form>

<a href="login.php">Already have account?</a>
</div>
</div>