<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Dashboard : Register A lost Person</title>
  <link href="https://fonts.googleapis.com/css?family=Poppins:400,600,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <script src="https://kit.fontawesome.com/f0601b0fb2.js" crossorigin="anonymous"></script>
  <script type='module' src='https://unpkg.com/ionicons@5.0.0/dist/ionicons/ionicons.esm.js'></script>
  <script nomodule='' src='https://unpkg.com/ionicons@5.0.0/dist/ionicons/ionicons.js'></script>
  <meta name="viewport" content="width=device-width, initial-scale=1"><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel="stylesheet" href="./dashboard.css">
  <link rel="icon" href="./favicon.svg">
</head>
<body>
<h1 style="text-align: center;font-size: 45px;">Lost Person Registery Panel</h1>
<h6 style="text-align: center;font-size: 16px; margin:15px;">Platform Designed by Pranjal Pratap Singh</h6>
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
        $_SESSION['faceid'] = "".$add;
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
            <input class="btn btn__primary" type = "submit" id="model" name = "submit" value = "Load Model" />
            <label for = "model"> <em><strong>Please Load Name of Lost Person for ML Model First</strong></em></label>
            <br><br>
            </form>
        <?php 
        }
        else {
            createDirectory();  //Calls the function Create Directory for creating a directory for user dynamically
        }
    ?>      <form action="upload.php" method="post" enctype="multipart/form-data">
            <label for = "fullname"> Full Name of the lost person</label><br><br>
            <input type="text" class="form-control" name="name" id = "fullname" placeholder="Full Name Lost Person" data-bs-toggle="tooltip" data-bs-placement="top" title="Full Name of the person Lost Person">
            <input type="email" class="form-control" name="Email" id = "Email" placeholder="Your Email..">
            <input type="text" class="form-control" name="City" id = "City" placeholder="City Where person lost">
            <label for = "City"> City Where person was lost.</label><br><br>
            <input type="text" class="form-control" name="State" id = "State" placeholder="State">
            <label for = "City"> State Where person was lost.</label><br><br>
            <br><br>
            <label for = "Description"> Give Brief Description (Physical Features, clothing, etc.)</label><br><br>
            <textarea type="text" class="form-control" name="Description" id="Description" placeholder="Description of Person" spellcheck="false" style="width: 770px; height: 145px;"></textarea>
            <br><br>
            <label for = "file">Provide Your Valid ID for Verification Purposes.(Aadhar, PAN, Passport) </label><br><br>
            <input type="file" class="form-control" accept=".pdf,.jpg,.jpeg,.png,.doc,.docx,.docx" name="files[]" id = "id" placeholder="ID Verification">
            <br>
            <input type="file" class="form-control" accept=".jpg" name="files[]" multiple />
            <label for="fname">Select Images to upload: (Exactly 2, JPG format)</label>
            <br>
            <br>

            <div class="checkbox">
            <label for = "checkbox-1"> Loaded FaceID First</label>
            <div class="checkbox__1">
                <input id="checkbox-1" type="checkbox" required>
                <label for="checkbox-1">
                <i class="material-icons">done</i></label>
            </div>
            </div>


            <div class="checkbox">
            <label for = "checkbox-2"> Checked All details?</label>
            <div class="checkbox__1">
                <input id="checkbox-2" type="checkbox" required>
                <label for="checkbox-2">
                <i class="material-icons">done</i></label>
            </div>
            </div>


            <div class="checkbox">
            <label for = "checkbox-3"> You agree to Share your Images with Our Platform?</label>
            <div class="checkbox__1">
                <input id="checkbox-3" type="checkbox" required>
                <label for="checkbox-3">
                <i class="material-icons">done</i></label>
            </div>
            </div>

            
            <input class="btn btn__secondary" type = "submit" name = "submit" value = "Register" />
            <input class="btn btn__secondary" type="reset">
            </div>
            </form>
<!-- partial -->
<a href="https://lostandfound.gq/" class="dribbble" target="_blank"><ion-icon name="logo-dribbble"></ion-icon></a>
<script  src="./dashboard.js"></script>
<h1>Instructions :</h1>
<ul>
    <li><em>Make sure to Register FaceID name First, only then proceed with futher entries.</em></li>
    <li><em>Type Descriptions Carefully. Include details like Last Seen, Last clothes worn, or any relevant Details.</em></li>
    <li><em>Select your ID(Registering Person) as Verification Entity from Our end to avoid Spam Registrations.</em></li>
    <li><em>Choose Valid IDs like Adhar, PAN, Passpord or Driving Licence in PDF or Image formats.</em></li>
    <li><em>Choose 2 Clear, JPG (Strictly) images only for lost person.</em></li>
    <li><em>For more details Click here..</em></li>
</ul>
    </div>
</div>
<style>
    /* Footer */

    .footer {
    position:fixed;
    bottom:0;
    left:0;
    width:100%;
    height: 60px;
    background-color: rgba(218, 213, 240, 0.30);
    }
    .footer-text-left {
    padding: 15px;
    font-size: 25px;
    padding-left: 40px;
    float: left;
    word-spacing: 20px;
    }
    .footer:hover {
    background-color:rgba(218, 213, 240, 0.73);
    }
    a.menu:hover {
        font-size: 22px;
    }
    .fa-cog:hover {
    color: #ac7ed6;
    }
    .fa-home:hover {
    color: #ac7ed6;
    }
    </style>
    <div class="footer">
    <p class="footer-text-left">
    <a href="index.html" class="menu"><i class="fa fa-home" aria-hidden="true" title="Home"></i></a>
    <a href="index.html" class="menu"><i class="fa-solid fa-cog fa-spin aria-hidden="true" title="Person Finder"></i></a>
    <a href="./aboutpranjal.php" class="menu"><i class="fa fa-info-circle aria-hidden="true" title="About Pranjal" style="font-size:25x"></i></a>
    <a href="https://github.com/yyppsk/Lost-and-Found-Reporting-Platform" class="menu"><i class="fa-brands fa-github aria-hidden="true" title="Github Repo" style="font-size:28px"></i></a>    
</p>
</div>
<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/61f9619fb9e4e21181bcf7a7/1fqr2an0a';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
</body>
</html>
