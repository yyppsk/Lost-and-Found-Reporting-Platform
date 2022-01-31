<!DOCTYPE html>
<html>
<head>
     <title>Lost and Found : People</title>
     <?php include 'links.php' ?>
     <?php include 'style.php' ?>
</head>
<body>

<div class="container">
     <div class="row d-flex justify-content-center">
          <div class="col-lg-11 col-12">
               <div class="table-responsive">
               <table class="table text-center table-bordered text-black">
                    <thead class="bg-dark text-white">
                         <tr>
                             <th class="py-3 text-white " >id</th>
                             <th class="py-3 text-white ">Name</th>
                             <th class="py-3 text-white ">Email</th>
                             <th class="py-3 text-white ">Degree</th> 
                             <th class="py-3 text-white" >Lang</th>
                             <th class="py-3 text-white" >Pic</th>
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
                        <td> <font color=black size='5pt'> <?php echo $result['id']; ?> </td>
                        <td> <font color=black size='5pt'><?php echo $result['username']; ?> </td>
                        <td> <font color=black size='5pt'><?php echo $result['email']; ?> </td>
                        <td> <font color=black size='5pt'><?php echo $result['degree']; ?> </td>
                        <td> <font color=black size='5pt'><?php echo $result['lang']; ?> </td>
                        <td> <img src="<?php echo $result['pic']; ?>" width="300" height="300"> </td>
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