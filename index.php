<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lost and found</title>
</head>
<body>
    <div class="container register">
        <div class="row">
            <div class="col-md-3 register-left">
                <img src="" alt=""/>
                <h3>Welcome</h3>
                <p> Please fill all the details carefully. This form can change your life.</p>
                <a href="display.php">Check form</a> <br/>
                </div>
                    <div class="col-md-9 register-right">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id = "home" role = "tabpanel" aria-labelledby="home-tab">
                                <h3 class="register-heading"> Apply for web developer post</h3>
                                <form action="upload.php> method="POST" enctype="multipart/form-data">
                                    <div class="row register-form">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="Enter your name" name="username" value="" required/>
                                            </div>
                                            <div class="form-group">
                                                <input type="email" class="form-control" placeholder="Enter your email" name="email" value="" required/>
                                            </div>
                                            <div class="form-group">
                                                <input type="file" class="form-control" placeholder="Enter your file" name="file" value="" required/>
                                            </div>
                                            <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="Enter your qual" name="degree" value="" required/>
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="Enter your lang" name="language" value="" required/>
                                            </div>
                                            <div class="form-group">
                                                <input type="submit" class="btnRegister" placeholder="Submit" value="Register"/>
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
</body>
</html>