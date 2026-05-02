<?php
session_start();
include "db.php";

$username = $_POST['username'];
$session_id = session_id();

// Delete expired sessions (older than 5 min)
$conn->query("DELETE FROM user_sessions 
              WHERE last_activity < NOW() - INTERVAL 5 MINUTE");

// Count active sessions
$result = $conn->query("SELECT COUNT(*) as total 
                        FROM user_sessions 
                        WHERE username='$username'");
$row = $result->fetch_assoc();

if ($row['total'] >= 3) {
    echo "Maximum 3 sessions allowed!";
    exit();
}

// Insert new session
$conn->query("INSERT INTO user_sessions (username, session_id, last_activity)
              VALUES ('$username', '$session_id', NOW())");

$_SESSION['username'] = $username;
$_SESSION['LAST_ACTIVITY'] = time();

header("Location: dashboard.php");
exit();
?>