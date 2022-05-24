<?php
$server = "sql309.byetcluster.com";
$user = "epiz_30958934";
$password = "GhzNByRsSPOezbK";
$db = "epiz_30958934_lostandfound";
// Create connection
$conn = mysqli_connect($server,$user,$password,$db);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
echo" <div class='alert alert-danger'>";
    echo" <strong>Connection failed</strong> Database connection error!";
    echo" </div>";
}
echo" <div class='alert alert-success'>";
echo" <strong>Connected successfully</strong> Database fetched succesfully.";
echo" </div>";
?>