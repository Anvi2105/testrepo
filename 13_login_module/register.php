<?php
require __DIR__ . "/db.php";

$message = "";

if (isset($_POST['register'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $check = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $check);

    if (mysqli_num_rows($result) > 0) {
        $message = "Email already exists!";
    } else {
        $query = "INSERT INTO users(name,email,password) VALUES('$name','$email','$password')";
        
        if (mysqli_query($conn, $query)) {
            $message = "Registration Successful!";
        } else {
            $message = "Error: " . mysqli_error($conn);
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
<h2>Register</h2>

<form method="POST">
<input type="text" name="name" placeholder="Enter Name" required>
<input type="email" name="email" placeholder="Enter Email" required>
<input type="password" name="password" placeholder="Enter Password" required>

<button name="register">Register</button>
</form>

<p><?php echo $message; ?></p>

<a href="login.php">Go to Login</a>
</div>

</body>
</html>