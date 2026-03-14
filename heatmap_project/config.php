<?php
// Show errors during development (remove in final submission)
ini_set('display_errors', 1);
error_reporting(E_ALL);

$server = "localhost";
$user   = "root";
$pass   = "";
$db     = "productivity_db";

$conn = new mysqli($server, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

session_start();
?>
