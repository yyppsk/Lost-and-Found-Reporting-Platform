<?php
$servername = "localhost";
$username = "root";
$password = "123123@Blink";
$dbname = "lostandfound";
$conn = mysqli_connect($servername, $username, $password, $dbname) or 
die("Connection failed: " . mysqli_connect_error());
?>