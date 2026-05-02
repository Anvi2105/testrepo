<?php
session_start();

if (!isset($_SESSION['name'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
<h2>Welcome <?php echo $_SESSION['name']; ?></h2>

<p>You are successfully logged in!</p>

<?php
if (isset($_COOKIE['email'])) {
    echo "<p><b>Cookie Email:</b> " . $_COOKIE['email'] . "</p>";
}
?>

<a class="logout" href="logout.php">Logout</a>
</div>

</body>
</html>