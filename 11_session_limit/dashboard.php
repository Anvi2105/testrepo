<?php
session_start();
include "db.php";

$timeout = 300; // 5 minutes

if (!isset($_SESSION['username'])) {
    header("Location: login.html");
    exit();
}

// Check timeout
if (isset($_SESSION['LAST_ACTIVITY'])) {
    if (time() - $_SESSION['LAST_ACTIVITY'] > $timeout) {

        $session_id = session_id();
        $conn->query("DELETE FROM user_sessions WHERE session_id='$session_id'");

        session_unset();
        session_destroy();

        echo "Session expired!";
        exit();
    }
}

// Update activity
$_SESSION['LAST_ACTIVITY'] = time();

$session_id = session_id();
$conn->query("UPDATE user_sessions 
              SET last_activity = NOW() 
              WHERE session_id='$session_id'");
?>

<link rel="stylesheet" href="style.css">

<div class="dashboard">
    <h2>Welcome <?php echo $_SESSION['username']; ?></h2>
    <p>Your session is active</p>

    <a href="logout.php">Logout</a>
</div>