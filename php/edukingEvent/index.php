<!DOCTYPE html>
<html lang="en">
<head>
  <title>Event in eduKing</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $keyword = isset($_POST['keyword']) ? $_POST['keyword']:null;
    }
    else{
        $keyword = isset($_GET['keyword']) ? $_GET['keyword']:null;
    }

    // if ($keyword) 
    //     echo "My keyword: $keyword<br>";
    // else
    //     echo "<p>No Search</p>";

    
    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $dbName = "sukien";
    $conn = new mysqli($host, $user, $pass, $dbName);
    mysqli_set_charset($conn, 'utf8');
    if(!$conn) die ('Khong the ket noi: ' .mysqli_connect_error());


    if ($keyword) 
        $sql = "SELECT * FROM sukien WHERE ten LIKE '%$keyword%' order by id DESC";
    else
        $sql = "SELECT * FROM sukien order by id DESC";

    $query = mysqli_query($conn, $sql);
    $total = mysqli_num_rows($query);

?>

<div class="jumbotron text-center">
<form class="form-inline justify-content-center mb-3" method = "POST" action = "index.php" >
        <input class="form-control mr-sm-2" name="keyword"  type="text" placeholder="Search by name">
		<input type="date" id="keydate" name="keydate"><br><br>
        <button class="btn btn-outline-success  my-2 my-sm-0" type="submit">Find Events</button>
    </form>
</div>

  
<div class="container">

<center><legend class="text-uppercase"><?php echo ($total > 0) ? 'Sự kiện':'Not found item';?></legend></center>
  <div class="row">

   <?php
        if ($total > 0)
        {
            while ($row = mysqli_fetch_array($query))
            {
               echo '<div class="col-sm-4">
                <h3 class="lead">'.$row[1].'</h3>
                <p><img src="'.$row[3].'" width="100%" /></p>
                <p class="small">'.$row['ngay'].'</p>
                </div>';
            }
        }

   ?>

<!--
    <div class="col-sm-4">
      <h3>Name</h3>
      <p><img src="images/test.jpg" width="100%" /></p>
      <p>date</p>
    </div>

    <div class="col-sm-4">
      <h3>Name</h3>
      <p><img src="images/test.jpg" width="100%" /></p>
      <p>date</p>
    </div>

    <div class="col-sm-4">
      <h3>Name</h3>
      <p><img src="images/test.jpg" width="100%" /></p>
      <p>date</p>
    </div>
-->
  </div>
</div>

</body>
</html>
