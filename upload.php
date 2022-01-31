<?php
include 'dbcon.php';
if(isset($_POST['submit']))
{
$username = $_POST['username']; 
$email= $_POST['email']; 
$degree =$_POST['degree']; 
$lang = $_POST['lang'];
$file = $_POST['photo'];

//print_r($file);
$filename= $file['name'];
$filepath= $file['tmp_name'];
$fileeror= $file['error'];
if($fileerror == 0){
    $destfile = 'upload/'.$filename;
    echo "$destfile";
}
}else{

echo "No buttn has been clicked";
}
