<?php
include 'dbcon.php';
if(isset($_POST['submit']))
{
$username = $_POST['username']; 
$email= $_POST['email']; 
$degree =$_POST['degree']; 
$lang = $_POST['lang'];
$file = $_FILES['photo'];

//print_r($file);
$filename= $file['name'];
$filepath= $file['tmp_name'];
$fileeror= $file['error'];
if($fileerror == 0){
    $destfile = 'upload/'.$filename;
   // echo "$destfile";
    move_uploaded_file($filepath, $destfile);
    $insertquery =" insert into registration(username,email,degree,lang,pic) values('$username','$email','$degree','$lang','$destfile')";
    $query = mysqli_query($conn,$insertquery);
    if($query){
        echo "Inserted";
    }
    else{
        echo "Not Inserted";
    }
}
}else{
//EDITED 2
echo "No button has been clicked";
}
