<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script defer src="/testground/face-api.min.js"> //face Api gets loaded here</script>
    <title>Document</title>
</head>
<body>
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
    echo" <div class='alert alert-danger'>";
        echo" <strong>Connection failed</strong> Database connection error!";
        echo" </div>";
    }
    echo" <div class='alert alert-success'>";
    echo" <strong>Connected successfully</strong> Database fetched succesfully.";
    echo"<script>",
                "var localLabels = [];",
        "</script>";
    echo" </div>";
    $sql = "SELECT Name FROM lostpeople";
    $result = mysqli_query($conn, $sql); // First parameter is just return of "mysqli_connect()" function
    echo "<br>";
    echo "<table border='1'>";
    while ($row = mysqli_fetch_assoc($result)) { // Important line !!! Check summary get row on array ..
        echo "<tr>";
        foreach ($row as $field => $value) { // I you want you can right this line like this: foreach($row as $value) {
            echo "<td>" . $value . "</td>";
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
<!-- On laoding of Below section, a function call will be made to Javscript to load the FaceApi for further execution -->
<body onload="load()">
<?php header('Access-Control-Allow-Origin: *'); ?>
  <input type="file" id="imageUpload">
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
      document.body.append("Loaded");
      
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
  const labels = [
    "Black Widow",
    "Captain America",
    "Captain Marvel",
    "Hawkeye",
    "Jim Rhodes",
    "Thor",
    "Tony Stark",
  ];
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
</body>
</html>