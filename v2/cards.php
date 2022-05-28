<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- Card Css -->
<style>
    .containerresult{
    display: flex;
    flex-direction: row;
    align-content: stretch;
    justify-content: center;
    }
    body {
      margin: 0;
      padding: 0;
      width: 100%;
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      flex-direction: column;
    }
    canvas {
      display: flex;
      position: absolute;
    }
    html, body {
  height: 100%;
    }
    body {
    display: flex;
    flex-direction: row;
    flex-wrap: wrap;
    height: 100%;
    font-family: Avenir, sans-serif;
    color: #111;
    justify-content: center;
    }
    @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;500;600;700;800;900&display=swap");

    * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: "Poppins", sans-serif;
    }

    .container {
    width: 100%;
    min-height: 50%;
    display: flex;
    justify-content: center;
    align-items: center;
    }

    .card {
    position: relative;
    width: 350px;
    height: 190px;
    background: #fff;
    border-radius: 20px;
    box-shadow: 0 35px 80px rgba(0, 0, 0, 0.15);
    transition: 0.5s;
    }

    .card:hover {
    height: 450px;
    }

    .card .image-box {
    position: absolute;
    top: -50px;
    left: 50%;
    transform: translateX(-50%);
    width: 150px;
    height: 150px;
    background: #fff;
    border-radius: 20px;
    box-shadow: 0 15px 50px rgba(0, 0, 0, 0.15);
    transition: 0.5s;
    overflow: hidden;
    }

    .card:hover .image-box {
    width: 250px;
    height: 250px;
    }

    .card .image-box img {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
    }

    .card .content {
    position: absolute;
    width: 100%;
    height: 100%;
    display: flex;
    justify-content: center;
    align-items: flex-end;
    overflow: hidden;
    }

    .card .content .details {
    padding: 40px;
    text-align: center;
    width: 100%;
    transform: translateY(150px);
    transition: 0.5s;
    }

    .card:hover .content .details {
    transform: translateY(0px);
    }

    .card .content .details h2 {
    font-size: 1.25rem;
    font-weight: 600;
    color: #555;
    line-height: 1.2rem;
    }

    .card .content .details h2 span {
    font-size: 0.75rem;
    font-weight: 500;
    opacity: 0.5;
    }

    .card .content .details .data {
    display: flex;
    justify-content: space-between;
    margin: 20px 0;
    }

    .card .content .details .data h3 {
    font-size: 1rem;
    line-height: 1.2rem;
    font-weight: 500;
    color: #555;
    }

    .card .content .details .data h3 span {
    font-size: 0.85rem;
    font-weight: 400;
    opacity: 0.5;
    }

    .card .content .details .action-buttons {
    display: flex;
    justify-content: space-between;
    }

    .card .content .details .action-buttons button {
    padding: 10px 30px;
    border: none;
    outline: none;
    border-radius: 5px;
    font-size: 1rem;
    font-weight: 500;
    color: #fff;
    cursor: pointer;
    }

    .card .content .details .action-buttons button:nth-child(2) {
    border: 1px solid #999;
    color: #999;
    background: #fff;
    }
    .text {
        overflow: hidden;
        text-overflow: ellipsis;
        display: -webkit-box;
        -webkit-line-clamp: 2; /* number of lines to show */
        -webkit-box-orient: vertical;
    }

    </style>
    
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

    $sql = "SELECT Name, email, city, state, image,Description,status FROM lostpeople LIMIT $offset, $no_of_records_per_page";
    $res_data = mysqli_query($conn,$sql);
    while($row = mysqli_fetch_array($res_data)){
        //here goes the data
    //mysqli_close($conn);
?>
        <div class="flex-container"> 
            <div class="container">
            <div class="card">
              <div class="image-box">
              <img src="<?php echo $row['image']; ?>">
              </div>
              <div class="content">
                <div class="details">
                  <h2><?php echo $row['Name']; ?><br /><span><?php echo $row['city'].','.$row['state']; ?></span></h2>
                  
                  <div class="data">
                    <h3><br /><span class="text"><?php echo $row['Description']; ?></span></h3>
                  </div>
                  <div class="action-buttons">
                    <?php
                    if($row['status']==0){  
                        echo "<a href='https://lostandfoundsys.tawk.help/'><button style='background : red;'>Not Found!</button></a>";  
                        }else{
                        echo "<button>
                            <style>
                                .card .content .details .action-buttons button {
                                    background : Green;
                                    }
                            </style>
                            Found!
                        </button>";
                        }  
                        ?></button>
                    <button>Details</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
          </div>
                <?php
                }

                ?>
</body>
</html>