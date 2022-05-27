<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Uploading..</title>
</head>
<body>
    <?php 
    header("url=thepage.php;refresh:5");
// Include the database configuration file 
$uploads_dir = "./faceid";
include_once 'config/dbConfig.php'; 
session_start();
if(isset($_POST['submit'])){ 
    // File upload configuration 
    $name=$_POST['name'];
    $email=$_POST['Email'];
    $city=$_POST['City'];
    $state=$_POST['State'];
    $desc=$_POST['Description'];
    $targetDir = ""; 
    $allowTypes = array('jpg','png','jpeg','gif'); 
    $statusMsg = $errorMsg = $insertValuesSQL = $errorUpload = $errorUploadType = ''; 
    $fileNames = array_filter($_FILES['files']['name']);
    $counter = 0;
    if(!empty($fileNames)){ 
        foreach($_FILES['files']['name'] as $key=>$val){ 
            // File upload path 
            $fileName = basename($_FILES['files']['name'][$key]); 
            $targetFilePath = $targetDir . $fileName; 
             
            // Check whether file type is valid 
            $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION); 
            if(in_array($fileType, $allowTypes)){ 
                // Upload file to server
                if(move_uploaded_file($_FILES["files"]["tmp_name"][$key], "{$_SESSION['val']}/" . $counter.".jpg")){ 
                    // Image db insert sql
                    $counter++;
                    $insertValuesSQL .= "('".$fileName."', NOW()),"; 
                }else{ 
                    $errorUpload .= $_FILES['files']['name'][$key].' | '; 
                } 
            }else{ 
                $errorUploadType .= $_FILES['files']['name'][$key].' | '; 
            } 
        } 
         
        // Error message 
        $errorUpload = !empty($errorUpload)?'Upload Error: '.trim($errorUpload, ' | '):''; 
        $errorUploadType = !empty($errorUploadType)?'File Type Error: '.trim($errorUploadType, ' | '):''; 
        $errorMsg = !empty($errorUpload)?'<br/>'.$errorUpload.'<br/>'.$errorUploadType:'<br/>'.$errorUploadType; 
         
        if(!empty($insertValuesSQL)){ 
            $insertValuesSQL = trim($insertValuesSQL, ','); 
            // Insert image file name into database 
            $insert = $db->query("INSERT INTO lostpeople (Name, email, city, state, Description) VALUES ('$name','$email','$city','$state','$desc')"); 
            if($insert){ 
                $statusMsg = "Files are uploaded successfully.".$errorMsg; 
            }else{ 
                $statusMsg = "Sorry, there was an error uploading your file."; 
            } 
        }else{ 
            $statusMsg = "Upload failed! ".$errorMsg; 
        } 
    }else{ 
        $statusMsg = 'Please select a file to upload.'; 
    } 
}       
        //For renaming all the IDs according to their Lost Person's name [Resgitrar Name]
         $tmp_name = $_FILES["files"]["tmp_name"][0];
         $faceid=$_SESSION['arrayEntry'];
         $name = basename($_FILES["files"]["name"][0]);
         $ext = pathinfo($name, PATHINFO_EXTENSION);
         move_uploaded_file($tmp_name, "$uploads_dir/$faceid.$ext");
?>
<style>
    @keyframes button-press {
  0%, 20% {
    fill: inherit;
    transform: translateX(0);
  }
  10% {
    fill: #979a9f;
    transform: translateY(1px);
  }
}
@keyframes page {
  0% {
    transform: translateY(25px);
  }
  20%, 30% {
    transform: translateY(20px);
  }
  40%, 50% {
    transform: tanslateY(10px);
  }
  65% {
    transform: translateY(5px);
  }
  80% {
    transform: translateY(0px);
  }
}
svg {
  width: 200px;
}

.button * {
  animation: button-press 3s infinite;
}
.button *:nth-child(1) {
  animation-delay: 0.3785726262s;
}
.button *:nth-child(2) {
  animation-delay: 0.7604699758s;
}
.button *:nth-child(3) {
  animation-delay: 1.2805370101s;
}
.button *:nth-child(4) {
  animation-delay: 0.3997576156s;
}
.button *:nth-child(5) {
  animation-delay: 1.8532538157s;
}
.button *:nth-child(6) {
  animation-delay: 0.9524509906s;
}
.button *:nth-child(7) {
  animation-delay: 0.7067298136s;
}
.button *:nth-child(8) {
  animation-delay: 1.2102636017s;
}
.button *:nth-child(9) {
  animation-delay: 1.6198720808s;
}
.button *:nth-child(10) {
  animation-delay: 0.8983304695s;
}
.button *:nth-child(11) {
  animation-delay: 1.4261029613s;
}
.button *:nth-child(12) {
  animation-delay: 1.2765988484s;
}
.button *:nth-child(13) {
  animation-delay: 1.2993319425s;
}
.button *:nth-child(14) {
  animation-delay: 1.7760172486s;
}
.button *:nth-child(15) {
  animation-delay: 1.0962580094s;
}
.button *:nth-child(16) {
  animation-delay: 1.6950933699s;
}
.button *:nth-child(17) {
  animation-delay: 1.2605892507s;
}
.button *:nth-child(18) {
  animation-delay: 1.7839161173s;
}

.page {
  animation: page 6s infinite;
}

body {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  font-family: Avenir, sans-serif;
}
</style>
<main>
	<svg id="icons" enable-background="new 0 0 64 64" height="512" viewBox="0 0 64 64" width="512" xmlns="http://www.w3.org/2000/svg">
		<g class="page" fill="#ccd1d9">
			<path d="m52.005 28.995v6h-40v-6-27h32.99l.01.01v7h7z" fill="#e6e9ed"></path>
			<path d="m52.005 9.005h-7v-7z" fill="#f5f7fa"/>
			<path d="m44 18.998h-24c-.553 0-1-.447-1-1s.447-1 1-1h24c.553 0 1 .447 1 1s-.447 1-1 1z"/>
			<path d="m44 23.998h-24c-.553 0-1-.447-1-1s.447-1 1-1h24c.553 0 1 .447 1 1s-.447 1-1 1z"/>
			<path d="m44 28.998h-24c-.553 0-1-.447-1-1s.447-1 1-1h24c.553 0 1 .447 1 1s-.447 1-1 1z"/>
		</g>
		<path d="m58.995 34.995h-6.99-40-7l-4 23.01h61.99z" fill="#4c4ca8"/>
		<path d="m59.005 28.995c1.66 0 3 1.34 3 3s-1.34 3-3 3h-.01-6.99v-6z" fill="#656d78"/>
		<path d="m12.005 28.995v6h-7c-1.65 0-3-1.34-3-3s1.35-3 3-3z" fill="#656d78"/>
		<path d="m1.005 58.005h61.99v4h-61.99z" fill="#38388e"/>
		<g class="button" fill="#e6e9ed">
			<path d="m54.005 40.006c.55 0 1 .45 1 1v1c0 .55-.45 1-1 1h-1c-.55 0-1-.45-1-1v-1c0-.55.45-1 1-1z"/>
			<path d="m56.505 46.006c.55 0 1 .45 1 1v1c0 .55-.45 1-1 1h-1c-.55 0-1-.45-1-1v-1c0-.55.45-1 1-1z"/>
			<path d="m26.495 46.006c.55 0 1 .45 1 1v1c0 .55-.45 1-1 1h-1c-.55 0-1-.45-1-1v-1c0-.55.45-1 1-1z"/>
			<path d="m48.005 51.996c.55 0 1 .45 1 1v1c0 .55-.45 1-1 1h-31.01c-.55 0-1-.45-1-1v-1c0-.55.45-1 1-1z"/>
			<path d="m8.505 46.006c.55 0 1 .45 1 1v1c0 .55-.45 1-1 1h-1c-.55 0-1-.45-1-1v-1c0-.55.45-1 1-1z"/>
			<path d="m20.505 46.006c.55 0 1 .45 1 1v1c0 .55-.45 1-1 1h-1c-.55 0-1-.45-1-1v-1c0-.55.45-1 1-1z"/>
			<path d="m24.005 40.006c.55 0 1 .45 1 1v1c0 .55-.45 1-1 1h-1c-.55 0-1-.45-1-1v-1c0-.55.45-1 1-1z"/>
			<path d="m14.505 46.006c.55 0 1 .45 1 1v1c0 .55-.45 1-1 1h-1c-.55 0-1-.45-1-1v-1c0-.55.45-1 1-1z"/>
			<path d="m38.495 46.006c.55 0 1 .45 1 1v1c0 .55-.45 1-1 1h-1c-.55 0-1-.45-1-1v-1c0-.55.45-1 1-1z"/>
			<path d="m30.005 40.006c.55 0 1 .45 1 1v1c0 .55-.45 1-1 1h-1c-.55 0-1-.45-1-1v-1c0-.55.45-1 1-1z"/>
			<path d="m47.995 40.006c.55 0 1 .45 1 1v1c0 .55-.45 1-1 1h-1c-.55 0-1-.45-1-1v-1c0-.55.45-1 1-1z"/>
			<path d="m32.495 46.006c.55 0 1 .45 1 1v1c0 .55-.45 1-1 1h-1c-.55 0-1-.45-1-1v-1c0-.55.45-1 1-1z"/>
			<path d="m44.495 46.006c.55 0 1 .45 1 1v1c0 .55-.45 1-1 1h-1c-.55 0-1-.45-1-1v-1c0-.55.45-1 1-1z"/>
			<path d="m50.505 46.006c.55 0 1 .45 1 1v1c0 .55-.45 1-1 1h-1c-.55 0-1-.45-1-1v-1c0-.55.45-1 1-1z"/>
			<path d="m41.995 40.006c.55 0 1 .45 1 1v1c0 .55-.45 1-1 1h-1c-.55 0-1-.45-1-1v-1c0-.55.45-1 1-1z"/>
			<path d="m18.005 40.006c.55 0 1 .45 1 1v1c0 .55-.45 1-1 1h-1c-.55 0-1-.45-1-1v-1c0-.55.45-1 1-1z"/>
			<path d="m36.005 40.006c.55 0 1 .45 1 1v1c0 .55-.45 1-1 1h-1c-.55 0-1-.45-1-1v-1c0-.55.45-1 1-1z"/>
			<path d="m12.005 40.006c.55 0 1 .45 1 1v1c0 .55-.45 1-1 1h-1c-.55 0-1-.45-1-1v-1c0-.55.45-1 1-1z"/>
		</g>
	</svg>
</main>
<div>Wait while We submit your files and Writing a report for you</div>
<!--Credits https://www.flaticon.com/authors/nikita-golubev Nikita Golubev https://www.flaticon.com/ -->
</body>
</html>


