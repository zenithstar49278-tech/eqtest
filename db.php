<?php
// db.php - Database Connection
$host = 'localhost'; // Adjust if your host is different (e.g., mysql.hostinger.com)
$dbname = 'dbwbwqplai3ovb'; // Replace with actual database name from control panel
$user = 'upbek8wm1lktc'; // Replace with actual username
$pass = 'wkctga6nhgu8'; // Replace with actual password

try {
    $conn = new mysqli($host, $user, $pass, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
} catch (Exception $e) {
    die("Database connection failed: " . $e->getMessage());
}
?>
