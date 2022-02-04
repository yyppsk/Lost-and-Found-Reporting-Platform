<!DOCTYPE html>
<html lang="en-GB">
<head>
    <title>Search</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="/images/favicon.svg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <style>
      body {
    background: #d1d5db
}

.height {
    height: 100vh
}

.form {
    position: relative
}

.form .fa-search {
    position: absolute;
    top: 44px;
    left: 15px;
    color: #9ca3af
}

.form span {
    position: absolute;
    right: 17px;
    top: 13px;
    padding: 2px;
    border-left: 1px solid #d1d5db
}

.left-pan {
    padding-left: 7px
}

.left-pan i {
    padding-left: 10px
}

.form-input {
    height: 55px;
    text-indent: 33px;
    border-radius: 10px
}

.form-input:focus {
    box-shadow: none;
    border: none
}
.sub {
border: none;
outline: none;
background: none;
}
.my_button {
    width: 250px;
    height: 50px;
    border: 2px solid #333;
    font-size: 18px;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    position: relative;
    z-index: 0;
    transition: 2s
}

.my_button::before,
.my_button::after {
    position: absolute;
    background: #d1e7dd;
    z-index: -1;
    transition: 1s;
    content: ''
}

.my_button::before {
    height: 50px;
    width: 130px
}

.my_button::after {
    width: 150px;
    height: 30px
}

.my_button:hover::before {
    width: 0px;
    background: #bcffe1
}

.my_button:hover::after {
    height: 0px;
    background: #ffab42a3
}

.my_button:hover {
    background: #ffcf42a3
}
a {
    color: black;
    text-decoration: underline;
}
hr.rounded {
  border-top: 4px solid black;
  border-radius: 5px;
}
hr.dashed {
  border-top: 3px dashed green;
}
      </style>
</head>
<body>
<div class="container">
    <div class="row height d-flex justify-content-center align-items-center">
        <div class="col-md-6">
        <h1 class="d-flex justify-content-center align-items-center">Seach for Missing People</h1>
        <h4 class="d-flex justify-content-center align-items-center">A Platform by HashInclude</h4>
        <form action="search.php" method="get" class="form" action="search.php" method="get"> <button class="sub" type="submit"><i class="fa fa-search fa-xs"></i></button> <input type="text" name="search" maxlength="60" class="form-control form-input" placeholder="Search Datbase by Name... "required> <span class="left-pan"></span> </div>
            </form>
        </div>
    </div>
</div>
    <?php
include 'dbcon.php';
if (isset($_GET['search'])) {
    $param = "%{$_GET['search']}%";
    $query = mysqli_prepare($conn, "SELECT * FROM people_list WHERE username LIKE ?");
    mysqli_stmt_bind_param($query, "s", $param);
    mysqli_stmt_execute($query);
    $results = mysqli_stmt_get_result($query);
    $rows = mysqli_num_rows($results);
    mysqli_stmt_close($query);

    if ($rows > 0) {
        echo" <div class='alert alert-success'>";
        echo" <h2>Search results for: {$_GET['search']}</h2>";
        //echo" </div>";
             
        while ($result = mysqli_fetch_array($results)) {
            $result_title=$result['username'];
            $result_desc=$result['degree'];
            $result_preview=$result['pic'];
            echo "<img src='" . $result_preview . "' height='150' width='150' style='margin:5px; border: solid 1px; color: black;'>";
            echo" <hr class='dashed'>";
            echo "<div class='search_result' style='padding:10px'> 						
                <h3>$result_title</a></h3>
                <p>Found this person? Report Here.</p>
                <div class='my_button'> <span><a href='https://lostandfoundsys.tawk.help/'>I know $result_title</a></span></div>
                <br>
                <h4>Description about $result_title</h4>
                <article style='border: solid 1px; border-radius:4px; color: black;'> $result_desc </article>
                <hr class='dashed'>	
            </div>";
        }   
    } else {
        //echo "<h2>No results found for your search: {$_GET['search']}</h2>";
        echo" <div class='alert alert-warning'>";
        echo" <h2>No results found for your search: {$_GET['search']}</h2>";
        echo" <hr>Try searching for more descriptive query.</p>";
        echo" </div>";
    }
} else {
    echo" <div class='alert alert-danger'>";
        echo" <h2>No search query provided. Please try your search again.</h2>";
        echo" </div>";
}
?>
</body>
</html>