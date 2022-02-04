<!DOCTYPE html>
<html>
  <head>
    <title>Lost and Found : People</title>
    <!-- Bootstrap CDN -->
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
    />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="icon" type="image/x-icon" href="/images/favicon.svg">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        
        body{
            background-color: whitesmoke;
            margin-right: 10px;
            margin-left: 10px;
        }
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
  <style>
  th {
    background-color: white;
    color: #000;
    text-align:center;
    font-size : 18px;
} 
  </style>
  <table class="table table-hover text-center table-bordered">
                    <thead class="thead-light text-#000">
                         <tr>
                             <th class="" >Serial</th>
                             <th class="py-3 text-#000 ">Name</th>
                             <th id = "emid" class="py-3 text-#000 ">Email</th>
                             <th id = "dtls" class="py-3 text-#000">Details</th> 
                             <th class="py-3 text-#000" >City</th>
                             <th class="py-3 text-#000" >Picture</th>
                             <th class="py-3 text-#000" >Time Added</th>
                         </tr>
                    </thead>
                    <tbody>
    <?php
        include 'dbcon.php';
        if (isset($_GET['pageno'])) {
            $pageno = $_GET['pageno'];
        } else {
            $pageno = 1;
        }
        $no_of_records_per_page = 10;
        $offset = ($pageno-1) * $no_of_records_per_page;
        $total_pages_sql = "SELECT COUNT(*) FROM people_list";
        $result = mysqli_query($conn,$total_pages_sql);
        $total_rows = mysqli_fetch_array($result)[0];
        $total_pages = ceil($total_rows / $no_of_records_per_page);

        $sql = "SELECT * FROM people_list LIMIT $offset, $no_of_records_per_page";
        $res_data = mysqli_query($conn,$sql);
        while($row = mysqli_fetch_array($res_data)){
            //here goes the data
        //mysqli_close($conn);
    ?>
    <tr>
                        <td> <font color=#000 size='4vw'> <?php echo $row['id']; ?> </td>
                        <td> <font color=#000 size='4vw'><?php echo $row['username']; ?> </td>
                        <td> <font color=#000 size='4vw'><?php echo $row['email']; ?> </td>
                        <td> <font color=#000 size='4vw'><?php echo $row['degree']; ?> </td>
                        <td> <font color=#000 size='4vw'><?php echo $row['lang']; ?> </td>
                        <td><?php   
                        if($row['State']==0){  
                        echo "
                        <span style='font-size: 3rem;'>
                        <span style='color: #4BB543; align-items:center;'>
                        <i class='fas fa-user-check fa-sm' title='Person is found!'></i>
                      </span>
                      ";  
                        }else{  
                        echo "
                        <span style='font-size: 3rem;'>
                        <span style='color: #FA113D; align-items:center;'>
                        <i class='fas fa-user-check fa-sm' title='Person is Not found!'></i>
                      </span>
                        "; 
                        }  
                        ?>
                        <img src="<?php echo $row['pic']; ?>" width="150px" height="150px"> </td>
                        <td> <font color=#000 size='5pt'><?php echo $row['Time']; ?> </td>
                    </tr>
                    
                    <?php
                    }

                    ?>
                   </tbody>
                </table>
    
    <ul class="pagination pagination-lg">
      <li><a href="?pageno=1">First</a></li>
      <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">
        <a
          href="<?php if($pageno <= 1){ echo '#'; } else { echo "
          ?pageno=".($pageno - 1); } ?>"
          >Previous</a
        >
      </li>
      <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
        <a
          href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "
          ?pageno=".($pageno + 1); } ?>"
          >Next</a
        >
      </li>
      <li><a href="?pageno=<?php echo $total_pages; ?>">Last</a></li>
    </ul>
    
  </body>
</html>