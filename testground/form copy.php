<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
  </head>
  <style>
    body {
      margin: 0;
      padding: 0;
      width: 100vw;
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      flex-direction: column
    }

    canvas {
      position: absolute;
      top: 0;
      left: 0;
    }
  </style>
  <body>
  <?php
    //include 'connection/dbcon.php';
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


<!-- START OF FORM FOR SUBMISSION OF NAME-BASED DYNAMIC DIRECTORY FOR EACH USER -->

    <?php
        if (!isset($_POST['submit'])) {
    ?>
        <form action = "" method = "post">
              
            <table> 
            <tr>
                <td style = " border-style: none;"></td>
                <td bgcolor = "lightgreen" style = "font-weight: bold">
                    Create User Directory: 
                </td>
                  
                <td bgcolor = "lightred">
                    <input type = "text" style = "width: 220px;" 
                    class = "form-control" name = "add" id = "add" required/>
                </td>
                  
                <td bgcolor = "lightgreen" colspan = "2">
                    <input type = "submit" name = "submit" 
                        value = "Create directory" /> 
                </td>
            </tr>
            </table>
        </form>
    <?php 
        }
        else {
            createDirectory();  //Calls the function Create Directory for creating a directory for user dynamically
        }
    ?>
    <br>
    <form action="upload.php" method="post" enctype="multipart/form-data">
      <label for="fname">First name:</label>
      <input type="text" id="fname" name="name"><br><br>
      <label for="fname">Your Email:</label>
      <input type="email" id="fmail" name="Email"><br><br>
      <label for="fname">City:</label>
      <input type="text" id="fcity" name="City"><br><br>
      <label for="fname">State</label>
      <input type="text" id="fstate" name="State"><br><br>
      <label for="fname">Description:</label>
      <input type="text" id="fdesc" name="Description"><br><br>
      <label for="fname">ID Verification:</label>
      <input type="file" id="fverification" name="Verification"><br><br>
      <label for="fname">Select Images to upload:</label>
      <input type="file" name="files[]" multiple />
      <input type="submit" name="submit" value="UPLOAD" />
    </form>
  </body>
</html>
