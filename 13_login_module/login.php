<?php
session_start();
require __DIR__ . "/db.php";

$message = "";

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);

        if (password_verify($password, $user['password'])) {
            $_SESSION['name'] = $user['name'];

            setcookie("email", $email, time() + (86400 * 7), "/");

            header("Location: dashboard.php");
            exit();
        } else {
            $message = "Wrong password!";
        }
    } else {
        $message = "User not found!";
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
<h2>Login</h2>

<form method="POST">
<input type="email" name="email" placeholder="Enter Email"
value="<?php echo isset($_COOKIE['email']) ? $_COOKIE['email'] : ''; ?>" required>

<input type="password" name="password" placeholder="Enter Password" required>

<button name="login">Login</button>
</form>

<p><?php echo $message; ?></p>

<a href="register.php">Register</a>
</div>

</body>
</html>