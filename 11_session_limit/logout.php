<?php
session_start();
include "db.php";

$session_id = session_id();

$conn->query("DELETE FROM user_sessions WHERE session_id='$session_id'");

session_destroy();

header("Location: login.html");
exit();
?>