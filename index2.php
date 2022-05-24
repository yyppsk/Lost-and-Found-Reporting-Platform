<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Face Recognition</title>
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
</head>
 <!-- START DIRECTORY CREATE FUNCTION -->
<!-- On loading of Below section, a function call will be made to Javscript to load the FaceApi for further execution -->
<body>
  <input type="file" id="imageUpload">
  <?php
    function createDirectory() { //function definition to Create a dynamic Directory for every user
        $add = $_POST["add"];
        mkdir("labeled_images/".$add);
        echo "Done!";
        session_start(); //session to store varibles
        $_SESSION['val'] = "labeled_images/".$add;
        $_SESSION['arrayEntry']=$add;
        $_SESSION['test']=$add;
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
                    class = "form-control" name = "add" id = "add" />
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
    <!-- Upload Manager for Uplaoding Image into the newly created directory by User Input -->

    <form action="upload-manager.php" method="post" enctype="multipart/form-data">
        <h2>Upload File</h2>
        <label for="fileSelect">Filename:</label>
        <input type="file" name="photo" id="fileSelect">
        <input type="submit" name="submit" value="Upload">
        <p><strong>Note:</strong> Only .jpg, .jpeg, .gif, .png formats allowed to a max size of 5 MB.</p>
    </form>
    <form action="form.php" method="post" enctype="multipart/form-data" name="formUploadFile">      
    <label>Select file to upload:</label>
    <input type="file" name="files[]" multiple="multiple" />
    <input type="submit" value="Upload File" name="btnSubmit"/>
</form>
    <!-- End of Upload Manager Form -->

    <div class="result-container">
      <div id="Person in Image = ">
        <script>document.write('<h2>local storage</h2>');
            const value = localStorage.getItem('Result');
            document.write(`<li> <b></b>: ${value}</li>`);
            //clears the entire storage
            localStorage.clear()
        </script>
        <?php
        echo '<script>',
        'localStorage.setItem(','"','test','"',',','"',$_SESSION['test'],'"','',')',';',
                '</script>';
        //echo $_SESSION['val'];
        //'speak(',$_SESSION['arrayEntry'] ,');',
        ?>
    </div>
    </div>
    <!-- Written By Pranjal Pratap Singh -->
    <!-- 2022 -->
    <!-- Topics to Remember
      
    JavaScript Code to Practice For localStorage:

        localStorage.setItem('fname','Bob');
        localStorage.setItem('lname','Thomas');

        console.log(localStorage.getItem('fname'));
        console.log(localStorage.getItem('lname'));

        //returns null
        console.log(localStorage.getItem('firstname'));

        //removes the item with key and value
        localStorage.removeItem('fname');
        //clears the entire storage
        localStorage.clear()
  
      -->
</body>
</html>