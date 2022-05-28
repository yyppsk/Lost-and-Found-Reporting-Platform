<?php
// Database configuration
$dbHost     = "localhost";
$dbUsername = "root";
$dbPassword = "123123@Blink";
$dbName     = "lostandfound";

// Create database connection
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
$conn = mysqli_connect($server,$user,$password,$db);
$sql = "SELECT Name, email, city, state, image,Description FROM lostpeople WHERE email = '$email'";
$res_data = mysqli_query($conn,$sql);
// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}
?>