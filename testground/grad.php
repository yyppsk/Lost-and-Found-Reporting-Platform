<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script defer src="/testground/face-api.min.js"> //face Api gets loaded here</script>
    <title>Document</title>
</head>
<body>
<section>
  <h1>SECTION 1</h1>
</section>
<style>
  .section {
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
    $result = mysqli_query($conn, $sql); // First parameter is just return of "mysqli_connect()" function
    echo "<br>";
    //echo "<table border='1'>";
    while ($row = mysqli_fetch_assoc($result)) { // Important line !!! Check summary get row on array ..
        echo "<tr>";
        foreach ($row as $field => $value) { // I you want you can right this line like this: foreach($row as $value) {
            //echo "<td>" . $value . "</td>";
            echo '<script>',
                 'localLabels.push(','"',$value,'"',');',
                 '</script>';
            // I just did not use "htmlspecialchars()" function. 
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
<!-- Styling For Click Me Button -->
<style>
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
      position: absolute;
      top: 0;
      left: 0;
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
</head>

<!-- On laoding of Below section, a function call will be made to Javscript to load the FaceApi for further execution -->
<body onload="load()">
<?php header('Access-Control-Allow-Origin: *'); ?>
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
      //document.body.append("Loaded");
      //var elem = document.createElement('div');
      //elem.style.cssText = 'position:absolute;width:100%;height:100%;opacity:0.3;z-index:100;background:#000';
      //document.body.appendChild(elem);
      imageUpload.addEventListener("change", async () => {
      if (image) image.remove();
      if (canvas) canvas.remove();
      image = await faceapi.bufferToImage(imageUpload.files[0]);
      container.append(image);
      canvas = faceapi.createCanvasFromMedia(image);
      container.append(canvas);
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

      //Results for the best match
      localStorage.setItem('Result',results);
      console.log(localStorage.getItem('Result'));

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
<!-- Click Me button -->
<?php

    function displayrecent() {
    $server = "localhost";
    $user = "root";
    $password = "123123@Blink";
    $db = "lostandfound";
    // Create connection
    $conn = mysqli_connect($server,$user,$password,$db);
    $sql = "SELECT Name,city FROM lostpeople";
    $result = mysqli_query($conn, $sql);
        echo "<br>";
    echo "<table border='1'>";
    while ($rows = mysqli_fetch_assoc($result)) { // Important line !!! Check summary get row on array ..
        //echo "<tr>";
        foreach ($rows as $row) { // I you want you can right this line like this: foreach($row as $value) {
            //echo "<td>" . $value . "</td>";
            echo '<script>',
                 //'localLabels.push(','"',$value,'"',');',
                 '</script>';
            echo '<div class="flex-container"> 
            <div class="container">
            <div class="card">
              <div class="image-box">';
                echo'<img src="labeled_images/',$rows['Name'],'/','0.jpg','",alt="">
              </div>
              <div class="content">
                <div class="details">
                  <h2>',$rows['city'],'<br /><span>Senior UI/UX Designer</span></h2>
                  <div class="data">
                    <h3>342<br /><span>Posts</span></h3>
                    <h3>120k<br /><span>Followers</span></h3>
                    <h3>285<br /><span>Following</span></h3>
                  </div>
                  <div class="action-buttons">
                    <button>Follow</button>
                    <button>Message</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
          </div>'; 
        }
        //echo "</tr>";
    }
    }
    if (isset($_GET['name'])) {
        displayrecent();
    }
    ?>
    <a href="grad.php?name=true"  class="cta">
    <span>Load Recent</span>
    <svg width="13px" height="10px" viewBox="0 0 13 10">
        <path d="M1,5 L11,5"></path>
        <polyline points="8 1 12 5 8 9"></polyline>
    </svg>
    </a>
    <!-- End of Click Me button -->
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
    background: #ff5acd;
    color: #fff;
    cursor: pointer;
    }

    .card .content .details .action-buttons button:nth-child(2) {
    border: 1px solid #999;
    color: #999;
    background: #fff;
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
          <stop offset="0%" stop-color="#F2C9C9">
            <animate attributeName="stop-color" values="#F2C9C9;#FFFFFF;#DCD5F5;#FFE7C1;#FFFFFF;#FFE7C1;#F2C9C9" dur="20s" repeatCount="indefinite">
            </animate>
          </stop>
          <stop offset="100%" stop-color="#FFFFFF"></stop>
        </radialGradient>
        <radialGradient id="gradient1b">
          <stop offset="0%" stop-color="#CBEBF0">
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
</body>
</html>