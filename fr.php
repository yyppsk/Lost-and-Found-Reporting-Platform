<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <script defer src="face-api.min.js"> //face Api gets loaded here</script>
</head>
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
    document.body.append(localStorage.getItem('test'));
    labels.push(localStorage.getItem('test'));
    console.dir(labels);
  return Promise.all(
    labels.map(async (label) => {
      const descriptions = [];
      for (let i = 1; i <= 2; i++) {
        const img = await faceapi.fetchImage(
          `/labeled_images/${label}/${i}.jpg`
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