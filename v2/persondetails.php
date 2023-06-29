<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Person details : Lost and Found</title>
  <link href='https://fonts.googleapis.com/css?family=Josefin+Sans:600|Source+Sans+Pro' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css"><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel='stylesheet' href='//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css'><link rel="stylesheet" href="./style.css">
<link rel="stylesheet" href="./persondetails.css">
<link rel="icon" href="./favicon.svg">
</head>
<body>
<style>
    /* Cool infinite background scrolling animation.
 * Twitter: @kootoopas
 */
/* Exo thin font from Google. */
@import url(https://fonts.googleapis.com/css?family=Exo:100);
/* Background data (Original source: https://subtlepatterns.com/grid-me/) */
/* Animations */
@-webkit-keyframes bg-scrolling-reverse {
  100% {
    background-position: 50px 50px;
  }
}
@-moz-keyframes bg-scrolling-reverse {
  100% {
    background-position: 50px 50px;
  }
}
@-o-keyframes bg-scrolling-reverse {
  100% {
    background-position: 50px 50px;
  }
}
@keyframes bg-scrolling-reverse {
  100% {
    background-position: 50px 50px;
  }
}
@-webkit-keyframes bg-scrolling {
  0% {
    background-position: 50px 50px;
  }
}
@-moz-keyframes bg-scrolling {
  0% {
    background-position: 50px 50px;
  }
}
@-o-keyframes bg-scrolling {
  0% {
    background-position: 50px 50px;
  }
}
@keyframes bg-scrolling {
  0% {
    background-position: 50px 50px;
  }
}
/* Main styles */
body {
  margin-top: 13.5rem;
  color: #999;
  font: 400 16px/1.5 exo, ubuntu, "segoe ui", helvetica, arial, sans-serif;
  text-align: center;
  /* img size is 50x50 */
  background: url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAIAAACRXR/mAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAIGNIUk0AAHolAACAgwAA+f8AAIDpAAB1MAAA6mAAADqYAAAXb5JfxUYAAABnSURBVHja7M5RDYAwDEXRDgmvEocnlrQS2SwUFST9uEfBGWs9c97nbGtDcquqiKhOImLs/UpuzVzWEi1atGjRokWLFi1atGjRokWLFi1atGjRokWLFi1af7Ukz8xWp8z8AAAA//8DAJ4LoEAAlL1nAAAAAElFTkSuQmCC") repeat 0 0;
  -webkit-animation: bg-scrolling-reverse 0.92s infinite;
  /* Safari 4+ */
  -moz-animation: bg-scrolling-reverse 0.92s infinite;
  /* Fx 5+ */
  -o-animation: bg-scrolling-reverse 0.92s infinite;
  /* Opera 12+ */
  animation: bg-scrolling-reverse 0.92s infinite;
  /* IE 10+ */
  -webkit-animation-timing-function: linear;
  -moz-animation-timing-function: linear;
  -o-animation-timing-function: linear;
  animation-timing-function: linear;
}
body::before {
  content: "Person Details";
  font-size: 8rem;
  font-weight: 100;
  font-style: normal;
}
  </style>
<!-- partial:index.partial.html -->
<?php
if(isset($_POST['submit'])){
    session_start();
    // File upload configuration 
    $_POST['submit'];
    $email = $_POST['submit'];
    $server = "localhost";
    $user = "root";
    $password = "MyPassword";
    $db = "lostandfound";
    // Create connection
    $conn = mysqli_connect($server,$user,$password,$db);
    $sql = "SELECT Name, email, city, state, image,Description,status,time,idverification FROM lostpeople WHERE email = '$email'";
    $res_data = mysqli_query($conn,$sql);
      while($row = mysqli_fetch_array($res_data)){
          //here goes the data   //mysqli_close($conn);
          $_SESSION['name'] = $row['Name'];
          $_SESSION['email'] = $row['email'];
          $_SESSION['city'] = $row['city'];
          $_SESSION['state'] = $row['state'];
          $_SESSION['image'] = $row['image'];
          $_SESSION['desc'] = $row['Description'];
          $_SESSION['status'] = $row['status'];
          $_SESSION['time'] = $row['time'];
          $_SESSION['id'] = $row['idverification'];
      }  
    }
    ?>
<div class="container">
  <section id="Profile">
    <div id="user" class="text-center">
      <div id="img"><img id="img" src="<?php echo $_SESSION['image'];?>"></div>
      <div id="name">
        <h1><?php echo $_SESSION['name'];?></h1>
        <h4><?php echo $_SESSION['city'],',',$_SESSION['state'];?></h4>
      </div>
      <?php if($_SESSION['status'] == 1){
        echo '<div id="social"><a href="#"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x"></i><i class="fa fa-check fa-stack-1x" title="Person is Reported Found!"></i></span></a></div><style>
        i[class*="2x"] {
            color: green;
        }</style>';
      } else{
        echo '<div id="social"><a href="#"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x"></i><i class="fa fa-times fa-stack-1x" title="Person is Reported Not Found!"></i></span></a></div>
        <style>
        i[class*="2x"] {
            color: red;
        }</style>';
      }
      ?>
    </div>
    <div id="content">
      <div id="navigation">
        <ul role="tablist" class="nav nav-tabs nav-justified">
          <li role="presentation"><a href="#about" role="tab" data-toggle="tab"><i class="fa fa-user fa-3x"></i></a></li>
          <li role="presentation"><a href="#skills" role="tab" data-toggle="tab"><i class="fa fa-eye fa-3x"></i></a></li>
          <li role="presentation"><a href="#contact" role="tab" data-toggle="tab"><i class="fa fa-envelope-o fa-3x"></i></a></li>
        </ul>
        <div class="tab-content">
          <div id="about" role="tabpanel" class="tab-pane fade">
            <h3>Details Provided:</h3>
            <p style=""><strong><?php echo $_SESSION['desc'];?></strong></p>
            <p style="font-size: 26px;
    color: cornflowerblue;"><strong>Reported On : <?php echo $_SESSION['time'];?></strong></p>
          </div>
          <div id="skills" role="tabpanel" class="tab-pane fade">
            <h3>ID Verification</h3>
            <h4>ID Verification Process</h4>
            <div class="progress">
              <?php if($_SESSION['id']==0)
                echo '<div role="progressbar" style="background: orangered;width: 50%;" class="progress-bar" background-color:="" red;="">50%</div>';
                else{
                  echo '<div role="progressbar" style="width: 100%;" class="progress-bar">100%</div>';
                }
                ?>
            </div>
            </div>
          </div>
          <div id="contact" role="tabpanel" class="tab-pane fade">
            <h3>Contact Details Provided :</h3>
            <form action="https://formsubmit.co/b1a729e69eb62b3755794a531c5fcbaf" method="POST" />
              <div class="form-group">
                <input type="hidden" name="_cc" value="<?php echo $_SESSION['email'];?>">
                <input type="hidden" name="_template" value="table">
                <input type="hidden" name="_autoresponse" value="Thank you for contacting!">
                <label for="name">Name <small>Required</small></label>
                <input id="name" required="required" type="text" placeholder="Your Name" class="form-control input-lg"/>
                <label for="email">Email <small>Required</small></label>
                <input id="email" required="required" type="email" placeholder="Email Address" class="form-control input-lg"/>
                <label for="text">Message <small>Required | 280 Character Limit</small></label>
                <textarea id="text" name="message" required="required" placeholder="Type Your Message Here" rows="3" maxlength="280" class="form-control input-lg"></textarea>
                <button type="submit" class="btn btn-default btn-lg">Send a Message</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<!-- partial -->
  <script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js'></script>
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
    <a href="./home.php" class="menu"><i class="fa fa-home" aria-hidden="true" title="Home" style="font-size:28px"></i></a>
    <a href="./searchpeople.php" class="menu"><i class="glyphicon glyphicon-search aria-hidden="true" title="Person Finder" style="font-size:25px"></i></a>
    <a href="./aboutpranjal.php" class="menu"><i class="glyphicon glyphicon-info-sign aria-hidden="true" title="About Pranjal" style="font-size:25x"></i></a>
    <a href="https://github.com/yyppsk/Lost-and-Found-Reporting-Platform" class="menu"><i class="fa fa-github aria-hidden="true" title="Github Repo" style="font-size:28px"></i></a>
    
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
