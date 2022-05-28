<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>person details</title>
  <link href='https://fonts.googleapis.com/css?family=Josefin+Sans:600|Source+Sans+Pro' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css"><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel='stylesheet' href='//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css'><link rel="stylesheet" href="./style.css">
<link rel="stylesheet" href="./persondetails.css">
</head>
<body>
<!-- partial:index.partial.html -->
<?php
if(isset($_POST['submit'])){
    session_start();
    // File upload configuration 
    $_POST['submit'];
    $email = $_POST['submit'];
    $server = "localhost";
    $user = "root";
    $password = "123123@Blink";
    $db = "lostandfound";
    // Create connection
    $conn = mysqli_connect($server,$user,$password,$db);
    $sql = "SELECT Name, email, city, state, image,Description,status FROM lostpeople WHERE email = '$email'";
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
      <div id="social"><a href="#"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x"></i><i class="fa fa-twitter fa-stack-1x"></i></span></a><a href="#"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x"></i><i class="fa fa-facebook-f fa-stack-1x"></i></span></a><a href="#"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x"></i><i class="fa fa-dribbble fa-stack-1x"></i></span></a><a href="#"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x"></i><i class="fa fa-behance fa-stack-1x"></i></span></a></div>
    </div>
    <div id="content">
      <div id="navigation">
        <ul role="tablist" class="nav nav-tabs nav-justified">
          <li role="presentation"><a href="#about" role="tab" data-toggle="tab"><i class="fa fa-user fa-3x"></i></a></li>
          <li role="presentation"><a href="#skills" role="tab" data-toggle="tab"><i class="fa fa-trophy fa-3x"></i></a></li>
          <li role="presentation"><a href="#contact" role="tab" data-toggle="tab"><i class="fa fa-envelope-o fa-3x"></i></a></li>
        </ul>
        <div class="tab-content">
          <div id="about" role="tabpanel" class="tab-pane fade">
            <h3>Details Provided:</h3>
            <p><?php echo $_SESSION['desc'];?></p>
            <p>Reported On : </p>
          </div>
          <div id="skills" role="tabpanel" class="tab-pane fade">
            <h3>ID Verification</h3>
            <h4>ID Verification Process</h4>
            <div class="progress">
              <?php if($_SESSION['status']==0)
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

</body>
</html>