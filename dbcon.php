<?php
$server = "sql102.byetcluster.com";
$user = "epiz_30959294";
$password = "0rS7OftqN48iNRn";
$db = "epiz_30959294_lostandfound";
// Create connection
$conn = mysqli_connect($server,$user,$password,$db);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";
?>