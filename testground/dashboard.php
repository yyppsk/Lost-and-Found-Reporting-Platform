<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>CodePen - Neumorphic Elements</title>
  <link href="https://fonts.googleapis.com/css?family=Poppins:400,600,700&display=swap" rel="stylesheet">

<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<script src="https://kit.fontawesome.com/f0601b0fb2.js" crossorigin="anonymous"></script>
<script type='module' src='https://unpkg.com/ionicons@5.0.0/dist/ionicons/ionicons.esm.js'></script>
<script nomodule='' src='https://unpkg.com/ionicons@5.0.0/dist/ionicons/ionicons.js'></script>
<meta name="viewport" content="width=device-width, initial-scale=1"><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel="stylesheet" href="./dashboard.css">

</head>
<body>
<h1 style="text-align: center;font-size: 45px;">Lost Person Registery Panel</h1>
<!-- partial:index.partial.html -->
<div class="container">
  <div class="components">
  <div class="form">
  <?php
    function createDirectory() { //function definition to Create a dynamic Directory for every user
        $server = "localhost";
        $user = "root";
        $password = "123123@Blink";
        $db = "lostandfound";
        $add = $_POST["add"];
        mkdir("labeled_images/".$add);
        echo "Done!";
        session_start(); //session to store varibles
        $_SESSION['val'] = "labeled_images/".$add;
        $_SESSION['arrayEntry']=$add;
        $_SESSION['test']=$add;
        $conn = mysqli_connect($server,$user,$password,$db);
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
          echo" <div class='alert alert-danger'>";
              echo" <strong>Connection failed</strong> Database connection error!";
              echo" </div>";
          }
          echo" <div class='alert alert-success'>";
          echo" <strong>Connected successfully</strong> Database fetched succesfully.";
          echo" </div>";
        //$sql = "INSERT INTO facerc (labels)
                //VALUES ('$add')";
        //$conn->query($sql);
        echo '<script>',
                'localStorage.setItem(','"','arrayvalue','"',',','"',$add,'"','',')',';',
                '</script>';
        //echo $_SESSION['val'];
        //'speak(',$_SESSION['arrayEntry'] ,');',
    }
?>
<!-- END OF DIRECTORY CREATION FUNCTION -->
<?php
        if (!isset($_POST['submit'])) {
?>
        <form action = "" method = "post">
            <label for = "mlname"> First Name for ML Model <br></label>
            <input type="text" class ="form-control" name = "add" id = "mlname" placeholder="FaceID Name" data-bs-toggle="tooltip" data-bs-placement="top" title="Enter only the first name of the Person">
            <input type="text" class="form-control" id = "fullname" placeholder="Full Name Lost Person" data-bs-toggle="tooltip" data-bs-placement="top" title="Full Name of the person Lost Person">
            <input type="email" class="form-control" id = "email" placeholder="Email..">
            <input type="text" class="form-control" id = "city" placeholder="City">
            <input type="text" class="form-control" id = "state" placeholder="State">
            <input type="text" class="form-control" id = "desc" placeholder="Description">
            <input type="file" class="form-control" id = "id" placeholder="ID Verification">
            <input class="btn btn__primary" type = "submit" name = "submit" value = "Create directory" />
            <input class="btn btn__secondary" type = "submit" name = "submit" value = "Register" />
            </div>
            <div class="checkbox">
            <div class="checkbox__1">
                <input id="checkbox-1" type="checkbox">
                <label for="checkbox-1">
                <i class="material-icons">done</i></label>
            </div>
            </div>
        </form>
        <?php 
        }
        else {
            createDirectory();  //Calls the function Create Directory for creating a directory for user dynamically
        }
    ?>
        
<!-- partial -->
<a href="https://dribbble.com/myacode" class="dribbble" target="_blank"><ion-icon name="logo-dribbble"></ion-icon></a>
<script  src="./dashboard.js"></script>

</body>
</html>
