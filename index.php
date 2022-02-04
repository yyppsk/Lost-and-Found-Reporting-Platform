<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" type="image/x-icon" href="/images/favicon.svg">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="We have built a platform where anyone with access to the internet can register for a Missing person's report.Our platform releases the fetching rate of a person. With data being on public system it's easier and faster for recognition of missing person by general public.">
    <meta name="keywords" content="Missing, lost and found, lost, missing, lostandfound,platform">
    <meta name="author" content="Pranjal Pratap Singh, Riya, Sonam, Utkarsh, HashInclude">
    <meta property="og:title" content="Lost and Found : by HashInclude">
    <meta property="og:image" content="https://lostandfound.gq//images/favicon.jpg">
    <meta property="og:url" content="https://lostandfound.gq/index.php">
    <meta name="twitter:card" content="summary_large_image">
    <style>
        body{
            background-image: url(https://www.pngitem.com/pimgs/b/534-5347105_mountain-png.png);
            background-repeat: repeat;
            background-size: cover;
        }
    </style>
    <title>Lost and found</title>
    <?php include 'style.php'; ?>
    <?php include 'links.php'; ?>
</head>
<body>
<div class="jumbotron jumbotron-fluid">
  <div class="container">
  <h1 style="color:green; text-align:center">
  <img src="/logo.svg" width="150px" height="150px" alt=""/>
        LOST AND FOUND PLATFORM
  </h1>
    <p style="text-align:center">A Public open sourced platform to register the Missing people.</p>
  </div>
</div>

    <div class="container register">
        <div class="row">
            <div class="col-md-3 register-left">
                <img src="https://cdn2.iconfinder.com/data/icons/font-awesome/1792/github-square-512.png" width="50px" height="50px" alt=""/>
                <img src="/logo.svg" width="75px" height="75px" alt=""/>
                <h3>Welcome</h3>
                <p> Please fill all the details carefully.</p>
                <a href="display.php" class="btn btn-primary" role="button">Display List</a>
                <br>
                <br>
                <!-- Trigger the modal with a button -->
<button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">Want help?</button>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Lost and Found Help</h4>
      </div>
      <div class="modal-body">
        <p>Enter the most relevant details of the mission person including their Physical appearance, last seen and also mention your details.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<br>
<br>
<div class="btn-group-vertical">
  <button type="button" class="btn btn-primary">About Us</button>
  <button type="button" class="btn btn-primary">Source</button>
  <button type="button" class="btn btn-primary">HashInclude</button>
</div>


                </div>
                    <div class="col-md-9 register-right">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id = "home" role = "tabpanel" aria-labelledby="home-tab">
                                <h3 class="register-heading"> Register the Details : </h3>
                                <form action="upload.php" method="POST" enctype="multipart/form-data">
                                    <div class="row register-form">
                                        <div class="col-md-12">
                                        <label for="username">Name:</label>
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="Enter your name" name="username" value="" required/>
                                            </div>
                                            <div class="form-group">
                                            <label for="email">Email:</label>
                                                <input type="email" class="form-control" placeholder="Enter your email" name="email" value="" required/>
                                            </div>
                                            <div class="form-group">
                                            <label for="photo">Upload A picture of Missing person:</label>
                                                <input type="file" class="form-control" placeholder="Enter your qualification" name="photo" value="" required/>
                                            </div>
                                            <div class="col-md-12">
                                            <div class="form-group">
                                            <label for="degree">Details of Missing person</label>
                                                <input type="text" class="form-control input-lg" placeholder="Contact Number and Other details" name="degree" value="" required/>
                                                <span class="help-block">Physical features and other relevant information and Contact Number. Also mention the details of the Ward.</span>
                                            </div>
                                            <div class="form-group">
                                            <label for="lang">City</label>
                                                <input type="text" class="form-control" placeholder="Enter City" name="lang" value="" required/>
                                            </div>
                                            <div class="form-group">
                                                <input type="submit" class="btnRegister" name="submit" value="Register"/>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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