<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$host = "sql100.infinityfree.com";
$username = "if0_41679356";
$password = "GuUhM62Qt3xz";
$database = "if0_41679356_eventsystem";

$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>