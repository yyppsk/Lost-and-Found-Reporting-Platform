<!DOCTYPE html>
<html>
<head>
     <title>Lost and Found : People</title>
     <?php include 'links.php' ?>
     <?php include 'style.php' ?>
    <style>
    </style>
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
<div class="alert alert-info alert-dismissible fade show">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Info!</strong> All MISSSING PEOPLE IF FOUND MUST BE REPORTED BACK "FOUND" TO UPDATE THE LIST!
  </div>
<div class="container">
     <div class="row d-flex justify-content-center">
          <div class="col-lg-0 col-0">
               <div class="table-responsive">
               <table class="table text-center table-bordered text-white">
                    <thead class="bg-dark text-white">
                         <tr>
                             <th class="py-3 text-white " >Serial</th>
                             <th class="py-3 text-white ">Name</th>
                             <th class="py-3 text-white ">Email</th>
                             <th class="py-3 text-white ">Details</th> 
                             <th class="py-3 text-white" >City</th>
                             <th class="py-3 text-white" >Picture</th>
                             <th class="py-3 text-white" >Time Added</th>
                         </tr>
                    </thead>
                    <tbody>
                    <?php

                    include 'dbcon.php';

                    $selectquery = "select * from people_list";
                    $query = mysqli_query($conn, $selectquery);
                    //$result = mysqli_fetch_array($query);
                    while($result = mysqli_fetch_array($query)){
                    ?>
                    
                    <tr>
                        <td> <font color=white size='5pt'> <?php echo $result['id']; ?> </td>
                        <td> <font color=white size='5pt'><?php echo $result['username']; ?> </td>
                        <td> <font color=white size='5pt'><?php echo $result['email']; ?> </td>
                        <td> <font color=white size='5pt'><?php echo $result['degree']; ?> </td>
                        <td> <font color=white size='5pt'><?php echo $result['lang']; ?> </td>
                        <td> <img src="<?php echo $result['pic']; ?>" width="150px" height="150px"> </td>
                        <td> <font color=white size='5pt'><?php echo $result['Time']; ?> </td>
                    </tr>
                    
                    <?php
                    }

                    ?>
                   </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>