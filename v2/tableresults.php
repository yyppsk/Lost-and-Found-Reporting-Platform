<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Table Results</title>
    <link rel="icon" href="./favicon.svg">
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
    />
    <script src="https://kit.fontawesome.com/1bf6eef544.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="icon" type="image/x-icon" href="/images/favicon.svg">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<style>
  th {
    background-color: white;
    color: #000;
    text-align:center;
    font-size : 18px;
} 
  </style>
<table class="table table-hover text-center table-bordered table border='1'";>
                    <thead class="thead-light text-#000">
                         <tr>
                             <th class="" >Serial</th>
                             <th class="py-3 text-#000 ">Name</th>
                             <th id = "emid" class="py-3 text-#000 ">Email</th>
                             <th id = "dtls" class="py-3 text-#000">Details</th> 
                             <th class="py-3 text-#000" >City</th>
                             <th class="py-3 text-#000" >Picture</th>
                         </tr>
                    </thead>
                    <tbody>
    <?php
    $server = "localhost";
    $user = "root";
    $password = "123123@Blink";
    $db = "lostandfound";
    // Create connection
    $conn = mysqli_connect($server,$user,$password,$db);
    $sql = "SELECT Name, email, city, state, image,Description FROM lostpeople";
    $result = mysqli_query($conn, $sql);
        if (isset($_GET['pageno'])) {
            $pageno = $_GET['pageno'];
        } else {
            $pageno = 1;
        }
        $no_of_records_per_page = 10;
        $offset = ($pageno-1) * $no_of_records_per_page;
        $total_pages_sql = "SELECT COUNT(*) FROM lostpeople";
        $result = mysqli_query($conn,$total_pages_sql);
        $total_rows = mysqli_fetch_array($result)[0];
        $total_pages = ceil($total_rows / $no_of_records_per_page);

        $sql = "SELECT id,Name, email, city, state, image,Description,status FROM lostpeople LIMIT $offset, $no_of_records_per_page";
        $res_data = mysqli_query($conn,$sql);
        while($row = mysqli_fetch_array($res_data)){
            //here goes the data
        //mysqli_close($conn);
    ?>
    <tr>
                        <td> <font color=#000 size='4vw'> <?php echo $row['id']; ?> </td>
                        <td> <font color=#000 size='4vw'><?php echo $row['Name']; ?> </td>
                        <td> <font color=#000 size='4vw'><?php echo $row['email']; ?> </td>
                        <td> <font color=#000 size='4vw'><?php echo $row['Description']; ?> </td>
                        <td> <font color=#000 size='4vw'><?php echo $row['city'].','.$row['state'];; ?> </td>
                        <td><img src="<?php echo $row['image']; ?>" width="150px" height="150px">
                        <?php   
                        if($row['status']==0){  
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
                        <a href='https://lostandfoundsys.tawk.help/' style='color: #FA113D;'><i class='fas fa-user-check fa-sm' title='Person is Not found! Report them here.'></i></a>
                      </span>
                        "; 
                        }  
                        ?>   
                      </td>
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