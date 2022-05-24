<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Success!</title>
</head>
<body>
<?php
session_start();
echo $_SESSION['val'];
// Check if the form was submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Check if file was uploaded without errors
    if(isset($_FILES["photo"]) && $_FILES["photo"]["error"] == 0){
        $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
        $filename = $_FILES["photo"]["name"];
        $filetype = $_FILES["photo"]["type"];
        $filesize = $_FILES["photo"]["size"];
        $extension = pathinfo($_FILES["photo"]["name"], PATHINFO_EXTENSION);
        // Verify file extension
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if(!array_key_exists($ext, $allowed)) die("Error: Please select a valid file format.");
    
        // Verify file size - 5MB maximum
        $maxsize = 5 * 1024 * 1024;
        if($filesize > $maxsize) die("Error: File size is larger than the allowed limit.");
    
        // Verify MYME type of the file
        if(in_array($filetype, $allowed)){
            // Check whether file exists before uploading it
            if(file_exists("upload/" . $filename)){
                echo $filename . " is already exists.";
            } else{

                move_uploaded_file($_FILES["photo"]["tmp_name"], "{$_SESSION['val']}/" . "1.".$extension);
                echo "Your file was uploaded successfully.";
                //session_unset();
                //session_destroy();
            } 
        } else{
            echo "Error: There was a problem uploading your file. Please try again."; 
        }
    } else{
        echo "Error: " . $_FILES["photo"]["error"];
    }
}
?>
<!--  Topics to Remember and Reference codes
https://meeraacademy.com/php-rename-image-while-image-uploading/

    $extension = pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION);
    $name = $_POST["filename"];

    move_uploaded_file($_FILES["file"]["tmp_name"], $name.".".$extension);
    echo "Old Image Name = ". $_FILES["file"]["name"]."<br/>";
    echo "New Image Name = " . $name.".".$extension;

} -->
</body>
</html>