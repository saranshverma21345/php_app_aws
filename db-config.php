<?php
$host = "database-1.cdiee4q4s7k8.ap-south-1.rds.amazonaws.com";
$username = "appdb";
$password = "55B8kTYIARZHNjcbhyab";
$dbname = "database-1";

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}

echo "Connected to RDS successfully!";
?>

