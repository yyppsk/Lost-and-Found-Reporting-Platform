<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script defer src="/testground/face-api.min.js"> //face Api gets loaded here</script>
    <title>Search People  : Lost and Found</title>
    <link rel="icon" href="./favicon.svg">
</head>
<body>
<section>
  <h1 style="text-align: center">FACE RECOGNITION MODEL</h1>
  <h1 style="text-align: center" id="Loading"></h1>
  <h1 style="text-align: center" id="Loaded"></h1>
  </section>
<style>
    section {
    width: 100%;
    height: 100vh;
    }
    .gradient {
    position: fixed;
    height: 100%;
    width: 100%;
    overflow: hidden;
    z-index: -1;
      }
      .gradient svg {
      position: absolute;
      top: 0;
      right: 0;
      bottom: 0;
      left: 0;
      width: 100%;
      height: 100%;
      z-index: 0;
      }
      .flex-container {
          display: grid;
          justify-content: center;
          align-items: center;
          margin: 40px;
          padding: auto;
      }
      * {
      margin: 0; padding: 0;
  }
  html, body, #container {
      height: 100%;
  }
  header {
      height: 10%;
      background: gray;
      max-height:50px;
  }
  main {
      height: 90%;
      background: green;
  }
  .half {
      height: 50%;
  }
  .half:first-child {
      background: blue;
  }
  .half:last-child {
      background: yellow;
  }
  .contain{
      margin-bottom: 30vh;
      align-items: center;
  }
    </style>
<?php
    //This code Snippet Creates local array for Models
    $server = "localhost";
    $user = "root";
    $password = "123123@Blink";
    $db = "lostandfound";
    // Create connection
    $conn = mysqli_connect($server,$user,$password,$db);

    // Check connection
    if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
    echo" <div class='alert alert-success' > ";
        echo" <strong>Connection failed</strong><br>Database connection error!";
        echo" </div>";
    }
    echo" <div class='alert alert-success'style='position: absolute;'>";
    echo'<div class="contain">
        <h1>__Connected successfully__</h1>
        <p align="center">Database fetched succesfully</p>
        </div>';
    echo"<script>",
        "var localLabels = [];",
        "</script>";
    echo" </div>";
    $sql = "SELECT Name FROM lostpeople";
    $result = mysqli_query($conn, $sql);
    echo "<br>";
    //echo "<table border='1'>";
    while ($row = mysqli_fetch_assoc($result)) { 
        echo "<tr>";
        foreach ($row as $field => $value) { // foreach($row as $value) {
            //echo "<td>" . $value . "</td>";
            echo '<script>',
                 'localLabels.push(','"',$value,'"',');',
                 '</script>';
        }
        echo "</tr>";
    }
    echo "<script>",
         'localStorage.setItem(','"','globalLabels','"',",","JSON.stringify(localLabels));",
    //localStorage.setItem("my_colors", JSON.stringify(colors)); //store colors
         "var storedLabels = localStorage.getItem('globalLabels');",
         "storedLabels = JSON.parse(storedLabels);",
         "</script>";
         //var storedColors = JSON.parse(localStorage.getItem("my_colors")); 
  ?>

<!-- .container Result Styling is for Displaying Result in Position with absolute position
      Canvas position is with absolute
    
      Call to Action Styling-->
<style>
    .containerresult{
    display: flex;
    flex-direction: row;
    align-content: stretch;
    justify-content: center;
    }
    body {
      margin: 0;
      padding: 0;
      width: 100%;
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      flex-direction: column;
    }
    canvas {
      display: flex;
      position: absolute;
    }
    html, body {
  height: 100%;
    }
    body {
    display: flex;
    flex-direction: row;
    flex-wrap: wrap;
    height: 100%;
    font-family: Avenir, sans-serif;
    color: #111;
    justify-content: center;
    }

    a {
    text-decoration: none;
    color: inherit;
    }

    .cta {
    position: absolute;
    margin-top: 30vh;
    padding: 19px 22px;
    transition: all 0.2s ease;
    }
    .cta:before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    display: block;
    border-radius: 28px;
    background: rgba(255, 171, 157, 0.5);
    width: 56px;
    height: 56px;
    transition: all 0.3s ease;
    }
    .cta span {
    position: relative;
    font-size: 16px;
    line-height: 18px;
    font-weight: 900;
    letter-spacing: 0.25em;
    text-transform: uppercase;
    vertical-align: middle;
    }
    .cta svg {
    position: relative;
    top: 0;
    margin-left: 10px;
    fill: none;
    stroke-linecap: round;
    stroke-linejoin: round;
    stroke: #111;
    stroke-width: 2;
    transform: translateX(-5px);
    transition: all 0.3s ease;
    }
    .cta:hover:before {
    width: 100%;
    background: #ffab9d;
    }
    .cta:hover svg {
    transform: translateX(0);
    }
    .cta:active {
    transform: scale(0.96);
    }
    </style>

<!-- On laoding of Below section, a function call will be made to Javscript to load the FaceApi for further execution -->
<body onload="load()">
<style>
    .file {
    opacity: 0;
    width: 0.1px;
    height: 0.1px;
    position: absolute;
    }
    .imgup label {
    display: block;
    position: relative;
    width: 200px;
    height: 50px;
    border-radius: 25px;
    background: linear-gradient(40deg, #ff6ec4, #7873f5);
    box-shadow: 0 4px 7px rgba(0, 0, 0, 0.4);
    display: flex;
    align-items: center;
    justify-content: center;
    color: #fff;
    font-weight: bold;
    cursor: pointer;
    transition: transform .2s ease-out;
    }
    
    </style>
    
  <div class="imgup" style="position: absolute;">
    <input type="file" id="imageUpload" class="file"">
    <label for="imageUpload">Select Image</label>
  </div>
  <section>
      <h2 style="text-align: center">
          Query Generation Takes below :
      </h2>
      <h1 style="text-align: center" id="notFound"> </h1>
      <div id="containerresult" class="containerresult"></div>
      <h1 style="text-align: center" id="Found"> </h1>
      <h2 style="text-align: center" id="namePerson"> </h2>
      <div class="border border-light p-3 mb-4">
      <button data-modal-target="#modal" class="btn" id="open" style="width:30%;
    margin-left:35%;
    margin-right:4%;">Report</button>
        <div class="modal" id="modal">
            <div class="modal-header">
                <div class="title">Query Matched?</div>
                <button data-modal-close class="closebtn">&times;

                </button>
            </div>
            <div class="modal-body">
                <p class="current desc">
                   Know this person?
                   <a href="https://lostandfoundsys.tawk.help/" class="butt">Report Here</a>
                    </p>
                        <style>
                        .butt {
                          box-shadow:inset 0px 1px 0px 0px #fce2c1;
                          background:linear-gradient(to bottom, #ffc477 5%, #fb9e25 100%);
                          background-color:#ffc477;
                          border-radius:11px;
                          border:2px solid #eeb44f;
                          display:inline-block;
                          cursor:pointer;
                          color:#ffffff;
                          font-family:Arial;
                          font-size:16px;
                          font-weight:bold;
                          padding:8px 18px;
                          text-decoration:none;
                          text-shadow:0px 1px 0px #cc9f52;
                        }
                        .butt:hover {
                          background:linear-gradient(to bottom, #fb9e25 5%, #ffc477 100%);
                          background-color:#fb9e25;
                        }
                        .butt:active {
                          position:relative;
                          top:1px;
                        }
                        </style>
                <p class="next desc">
                    If not, Report us at 
                    <a href="./dashboard.php" class="butt">Report Lost</a> 
                </p>
            </div>

            <div class="modal-footer">
                <button class="nextbtn">
                    <i class='bx bx-right-arrow-alt tooltip'></i>
                </button>
            </div>
            
        </div>

        <div id="overlay"></div>
        <a href="./tableresults.php"><button class="btn" id="open" style="width:30%;
      margin-left:35%;
      margin-right:4%;">Show Tabled Dataset</button></a>
        <style>
          @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600&display=swap');

*,::after,::before{
    box-sizing: border-box;
    padding: 0;
    margin: 0;
}

.btn{
    background: none;
    padding: 10px;
    background-color: rgba(0,0,0,0.5);
    color: #fff;
    border: none;
    border-radius: 10px;
    padding: 0.8rem 2rem;
    margin-top: 2rem;
}

.modal{
    position:fixed;
    top: 50%;
    left: 50%;
    transform:translate(-50%, -50%) scale(0);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255,255,255,0.5);
    border-radius: 8px;
    padding: 1rem;
    z-index: 15;
    background: rgba(255,255,255,0.4);
    width: 500px;
    max-width: 80%;
    transition: 200ms ease-in-out;
    box-shadow: 0 25px 45px rgba(0,0,0,0.1);
    min-height: 30vh;
}

.modal.active{
    transform:translate(-50%, -50%) scale(1);
}

.modal-header{
    padding: 0.5rem 10px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    border-bottom: 2px solid rgba(255,255,255,0.4);
}

.modal-footer{
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 0.5rem 10px;
}

.modal-header .title{
    font-weight: bold;
    font-size: 1.5rem;
}

.modal-header .closebtn{
    cursor: pointer;
    border: none;
    font-size: 2rem;
    outline: none;
    background: none;
    color: #fff;
}

.modal-body{
    padding: 0.5rem 10px;;
}

#overlay {
    position: fixed;
    background: rgba(0,0,0,0.5);
    width: 100%;
    height: 100%;
    top: 0;
    pointer-events: none;
    opacity: 0;
    transition: 200ms ease-in-out;
}

#overlay.active {
    pointer-events:all;
    opacity: 1;
}

.tooltip{
    font-size: 2rem;
    transition: 200ms ease-in-out;
}

.tool{
    font-size: 2rem;
}

.nextbtn{
    background: none;
    padding: 10px;
    background-color: rgba(0,0,0,0.5);
    color: #fff;
    border: none;
    border-radius: 10px;
    padding: 0.2rem 0.8rem;
    cursor: pointer;
}

.tooltip.active{
   transform: rotate(180deg)
}

.title,
.desc{
    color: #fff;
}

.current{
    display: grid;
    place-items: center;
    position: relative;
    transition: 0.4s;
}

.next{
    display: none;
    transition: 0.2s;
}

.current.inactive{
    display: none;
}

.next.active{
    display: grid;
    place-items: center;
}

        </style>
</div>
</section>
    <script>

      //Creates Loading Animation
      const node1 = document.createElement("h1");
      const textnode1 = document.createTextNode("Loading..");
      node1.appendChild(textnode1);
      document.getElementById("Loading").appendChild(node1);
      </script>
    <script>
  //This function is where the Main Machine learning task is performed
    function load()
    {
      const imageUpload = document.getElementById("imageUpload");   //Get ImageId
      Promise.all([
        faceapi.nets.faceRecognitionNet.loadFromUri("/models"),   //Load the models
        faceapi.nets.faceLandmark68Net.loadFromUri("/models"),
        faceapi.nets.ssdMobilenetv1.loadFromUri("/models"),
      ]).then(start);

    async function start() {
      const container = document.createElement("div");
      container.style.position = "relative";
      document.body.append(container);
      const labeledFaceDescriptors = await loadLabeledImages();
      const faceMatcher = new faceapi.FaceMatcher(labeledFaceDescriptors, 0.6);
      let image;
      let canvas;

      
      const node = document.createElement("h1");
      const textnode = document.createTextNode("Loaded!");
      node.appendChild(textnode);
      document.getElementById("Loaded").appendChild(node);
      const loadremoval = document.getElementById("Loading");
      loadremoval.removeChild(loadremoval.children[0]);
      
      //var elem = document.createElement('div');
      //elem.style.cssText = 'position:absolute;width:100%;height:100%;opacity:0.3;z-index:100;background:#000';
      //document.body.appendChild(elem);
      imageUpload.addEventListener("change", async () => {
      if (image) image.remove();
      if (canvas) canvas.remove();
      image = await faceapi.bufferToImage(imageUpload.files[0]);
      document.getElementById('containerresult').append(image);
      canvas = faceapi.createCanvasFromMedia(image);
      document.getElementById('containerresult').append(canvas);


      //var image2 = new Image();
      //image2 = await faceapi.bufferToImage(imageUpload.files[0]);
      //document.getElementById('containerresult').appendChild(image2);
      //document.getElementById('containerresult').appendChild(canvas);
      

      const displaySize = { width: image.width, height: image.height };
      faceapi.matchDimensions(canvas, displaySize);
      const detections = await faceapi
        .detectAllFaces(image)
        .withFaceLandmarks()
        .withFaceDescriptors();
      const resizedDetections = faceapi.resizeResults(detections, displaySize);
      const results = resizedDetections.map((d) =>
        faceMatcher.findBestMatch(d.descriptor)
      );
      
      console.log(localStorage.getItem(results));

      //Handling of Person Found or Not Found
      var stringArray = results.toString().split(/(\s+)/);
      var surname = "";
      if(stringArray[1] == " "){
        surname = stringArray[2];
      }
      var final = stringArray[0] + " " + surname;
      console.log(stringArray);
      console.log(final);
      
      //CREATING NODE 1 Name Person

      const node = document.createElement("h1");
      const textnode = document.createTextNode("____");
      node.appendChild(textnode);
      document.getElementById("namePerson").appendChild(node);
      //CREATING NODE 2 Not Found
      const node2 = document.createElement("h1");
      const textnode2 = document.createTextNode("____");
      node2.appendChild(textnode2);
      document.getElementById("notFound").appendChild(node2);


      localStorage.setItem('Result2',stringArray[0]);

      if(stringArray[0] == "unknown"){

        const element = document.getElementById("notFound").children[0];

        const newNode = document.createTextNode("Sorry Person not Found in Our database!");

        element.replaceChild(newNode, element.childNodes[0]);
        
        const element2 = document.getElementById("namePerson").children[0];

        const newNode2 = document.createTextNode("____");

        element2.replaceChild(newNode2, element2.childNodes[0]);

      }
      else{
        const element = document.getElementById("notFound").children[0];

        const newNode = document.createTextNode("____");

        element.replaceChild(newNode, element.childNodes[0]);



        const element2 = document.getElementById("namePerson").children[0];

        const newNode2 = document.createTextNode(final);

        element2.replaceChild(newNode2, element2.childNodes[0]);
      }

      const dotremoval = document.getElementById("namePerson");
      dotremoval.removeChild(dotremoval.children[1]);

      const dotremoval2 = document.getElementById("notFound");
      dotremoval2.removeChild(dotremoval2.children[1]);
      

      //Results for the best match
      localStorage.setItem('Result',results);
      //console.log(localStorage.getItem('Result'));


    
      results.forEach((result, i) => {
        const box = resizedDetections[i].detection.box;
        const drawBox = new faceapi.draw.DrawBox(box, {
          label: result.toString(),
        });
        drawBox.draw(canvas);
      });
    });
  }

    function loadLabeledImages() {
    let newArray = storedLabels.slice();
    console.log({newArray});
    //document.body.append(localStorage.getItem('test'));
    //labels.push(localStorage.getItem('test'));
    console.dir(newArray);
  return Promise.all(
    newArray.map(async (label) => {
      const descriptions = [];
      for (let i = 0; i <= 1; i++) {
        const img = await faceapi.fetchImage(
          `labeled_images/${label}/${i}.jpg`
        );
        const detections = await faceapi
          .detectSingleFace(img)
          .withFaceLandmarks()
          .withFaceDescriptor();
        descriptions.push(detections.descriptor);
      }
      console.dir(descriptions);
      return new faceapi.LabeledFaceDescriptors(label, descriptions);
    })
  );
    }
    }
    </script>
<!-- Inspiration: https://dribbble.com/shots/4397812-Click-Me -->
<!-- This displays Recent items which are added to Database -->
<?php
    function displayrecent() {
      $server = "localhost";
      $user = "root";
      $password = "123123@Blink";
      $db = "lostandfound";
      // Create connection
      $conn = mysqli_connect($server,$user,$password,$db);
      $sql = "SELECT Name, email, city, state, image,Description FROM lostpeople";
      $result = mysqli_query($conn, $sql);
      if (isset($_GET['pageno'])) {
          $pageno = $_GET['pageno'];
      } else {
          $pageno = 1;
      }
      $no_of_records_per_page = 10;
      $offset = ($pageno-1) * $no_of_records_per_page;
      $total_pages_sql = "SELECT COUNT(*) FROM lostpeople";
      $result = mysqli_query($conn,$total_pages_sql);
      $total_rows = mysqli_fetch_array($result)[0];
      $total_pages = ceil($total_rows / $no_of_records_per_page);
  
      $sql = "SELECT Name, email, city, state, image,Description,status FROM lostpeople LIMIT $offset, $no_of_records_per_page";
      $res_data = mysqli_query($conn,$sql);
      while($row = mysqli_fetch_array($res_data)){
          //here goes the data
      //mysqli_close($conn);
  ?>
          <div class="flex-container"> 
              <div class="container">
              <div class="card">
                <div class="image-box">
                <img src="<?php echo $row['image']; ?>">
                </div>
                <div class="content">
                  <div class="details">
                    <h2><?php echo $row['Name']; ?><br /><span><?php echo $row['city'].','.$row['state']; ?></span></h2>
                    <div class="data">
                      <h3><br /><span class="text"><?php echo $row['Description']; ?></span></h3>
                    </div>
                    <form action="persondetails.php" method="post" enctype="multipart/form-data">
                    <div class="action-buttons">
                      <?php
                      if($row['status']==0){  
                          
                          echo "<a href='https://lostandfoundsys.tawk.help/'><button style='background : red;'>Not Found!</button></a>";  
                          
                        }
                          else{
                            echo "<style>
                            .card .content .details .action-buttons button {
                              background : Green;
                            }
                          </style>
                          <button class='action-buttons' id='action-buttons' type = 'submit' name = 'submit' value='Details';>
                              Found!
                          </button>";
                        }  
                      ?>
                      <button style="padding: 10px 30px;
                      border: none;
                      outline: none;
                      border-radius: 5px;
                      font-size: 1rem;
                      font-weight: 500;
                      border: 1px solid #999;
                      color: #999;
                      background : white;
                      cursor: pointer; " id="submit" type = "submit" name = "submit" value="<?php echo $row['email'];?>">Details</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            </div>
                  <?php
                  }
  
                  ?>
                  <?php
    }
    if (isset($_GET['name'])) {
        displayrecent();
    }
    ?>
    <a href="searchpeople.php?name=true"  class="cta">
    <span>Load Recent</span>
    <svg width="13px" height="10px" viewBox="0 0 13 10">
        <path d="M1,5 L11,5"></path>
        <polyline points="8 1 12 5 8 9"></polyline>
    </svg>
    </a>
    <!-- End of Click Me button -->
<style>
  img {
    width: 250px;
    height: 30%;
    border: 4px solid #eee;
    border-radius: 4px;
    border-style: outset;
  }
            
    </style>


<!-- Card Css -->
<style>
    @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;500;600;700;800;900&display=swap");

    * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: "Poppins", sans-serif;
    }

    .container {
    width: 100%;
    min-height: 50%;
    display: flex;
    justify-content: center;
    align-items: center;
    }

    .card {
    position: relative;
    width: 350px;
    height: 190px;
    background: #fff;
    border-radius: 20px;
    box-shadow: 0 35px 80px rgba(0, 0, 0, 0.15);
    transition: 0.5s;
    }

    .card:hover {
    height: 450px;
    }

    .card .image-box {
    position: absolute;
    top: -50px;
    left: 50%;
    transform: translateX(-50%);
    width: 150px;
    height: 150px;
    background: #fff;
    border-radius: 20px;
    box-shadow: 0 15px 50px rgba(0, 0, 0, 0.15);
    transition: 0.5s;
    overflow: hidden;
    }

    .card:hover .image-box {
    width: 250px;
    height: 250px;
    }

    .card .image-box img {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
    }

    .card .content {
    position: absolute;
    width: 100%;
    height: 100%;
    display: flex;
    justify-content: center;
    align-items: flex-end;
    overflow: hidden;
    }

    .card .content .details {
    padding: 40px;
    text-align: center;
    width: 100%;
    transform: translateY(150px);
    transition: 0.5s;
    }

    .card:hover .content .details {
    transform: translateY(0px);
    }

    .card .content .details h2 {
    font-size: 1.25rem;
    font-weight: 600;
    color: #555;
    line-height: 1.2rem;
    }

    .card .content .details h2 span {
    font-size: 0.75rem;
    font-weight: 500;
    opacity: 0.5;
    }

    .card .content .details .data {
    display: flex;
    justify-content: space-between;
    margin: 20px 0;
    }

    .card .content .details .data h3 {
    font-size: 1rem;
    line-height: 1.2rem;
    font-weight: 500;
    color: #555;
    }

    .card .content .details .data h3 span {
    font-size: 0.85rem;
    font-weight: 400;
    opacity: 0.5;
    }

    .card .content .details .action-buttons {
    display: flex;
    justify-content: space-between;
    }

    .card .content .details .action-buttons button {
    padding: 10px 30px;
    border: none;
    outline: none;
    border-radius: 5px;
    font-size: 1rem;
    font-weight: 500;
    cursor: pointer;
    color: #fff;
    }

    .card .content .details .action-buttons button:nth-child(2) {
    border: 1px solid #999;
    color: white;
    }
    .text {
        overflow: hidden;
        text-overflow: ellipsis;
        display: -webkit-box;
        -webkit-line-clamp: 2; /* number of lines to show */
        -webkit-box-orient: vertical;
    }

    </style>
<!-- Gradient Html -->
<div class="gradient">
    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
      <rect width="150%" height="150%" x="-65%" y="-65%" fill="url(#gradient1a)"></rect>
      <rect width="200%" height="200%" x="10%" y="-80%" fill="url(#gradient1b)"></rect>
      <rect width="200%" height="150%" x="-50%" y="30%" fill="url(#gradient1c)"></rect>
      <defs>
        <radialGradient id="gradient1a">
          <stop offset="40%" stop-color="#F2C9C9">
            <animate attributeName="stop-color" values="#F2C9C9;#FFFFFF;#DCD5F5;#FFE7C1;#FFFFFF;#FFE7C1;#F2C9C9" dur="20s" repeatCount="indefinite">
            </animate>
          </stop>
          <stop offset="100%" stop-color="#FFFFFF"></stop>
        </radialGradient>
        <radialGradient id="gradient1b">
          <stop offset="40%" stop-color="#CBEBF0">
            <animate attributeName="stop-color" values="#CBEBF0;#DCD5F5;#FFFFFF;#CBEBF0;#DCD5F5;#FFFFFF;#CBEBF0" dur="20s" repeatCount="indefinite">
            </animate>
          </stop>
          <stop offset="100%" stop-color="#FFFFFF" stop-opacity="0"></stop>
        </radialGradient>
        <radialGradient id="gradient1c">
          <stop offset="0%" stop-color="#FFFFFF">
            <animate attributeName="stop-color" values="#FFFFFF;#FFE7C1;#F2C9C9;#FFFFFF;#CBEBF0;#F2C9C9;#FFFFFF" dur="20s" repeatCount="indefinite">
            </animate>
          </stop>
          <stop offset="100%" stop-color="#FFFFFF" stop-opacity="0"></stop>
        </radialGradient>
      </defs>
    </svg>
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
    <a href="./home.php" class="menu"><i class="fa fa-home" aria-hidden="true" title="Home"></i></a>
    <a href="./searchpeople.php" class="menu"><i class="fa-solid fa-cog fa-spin aria-hidden="true" title="Person Finder"></i></a>
    <a href="./aboutpranjal.php" class="menu"><i class="fa fa-info-circle aria-hidden="true" title="About Pranjal" style="font-size:25x"></i></a>
    <a href="https://github.com/yyppsk/Lost-and-Found-Reporting-Platform" class="menu"><i class="fa-brands fa-github aria-hidden="true" title="Github Repo" style="font-size:28px"></i></a>  
  </p>
</div>
<script>
const openBtn = document.querySelectorAll('[data-modal-target]')
const closeBtn = document.querySelectorAll("[data-modal-close]")
const overlay = document.getElementById("overlay")
const nextbtn = document.querySelector('.nextbtn')
const currentParagraph = document.querySelector('.current')
const nextParagraph = document.querySelector('.next')
const tooltip = document.querySelector('.tooltip')

nextbtn.addEventListener('click', (() => {
    currentParagraph.classList.toggle('inactive')
    nextParagraph.classList.toggle('active')
    tooltip.classList.toggle('active')
}))

openBtn.forEach((btn) => {
    const modal = document.querySelector(btn.dataset.modalTarget) //Checks the target of our data-modal-target. could have also used '.modal'
    btn.addEventListener('click', (() => {
    openModal(modal)
    }))
})

closeBtn.forEach((btn) => {
    const modal = btn.closest(".modal")
    btn.addEventListener('click', (() => {
    closeModal(modal)
    }))  
})

overlay.addEventListener('click', (() => {
    const modals = document.querySelectorAll('.modal.active')
    modals.forEach((modal) => {
    closeModal(modal)
    })  
}))


function openModal(modal){
    if(modal == undefined) return
    modal.classList.add('active')
    overlay.classList.add('active')
}

function closeModal(modal){
    if(modal == undefined) return
    modal.classList.remove('active')
    overlay.classList.remove('active')
}

</script>
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