<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = isset($_POST['name']) ? $_POST['name']:null;
    $age  = isset($_POST['age']) ? $_POST['age']:null;
}
else{
    $name = isset($_GET['name']) ? $_GET['name']:null;
    $age  = isset($_GET['age']) ? $_GET['age']:null;
}

if ($name) {
    //echo "action: process_form.php<br>";
    echo "My name: $name<br>";
    echo "Age: $age<br>";

    //  echo '$_POST<br>';
    //  var_dump($_POST);
    //  echo '<br>$_GET<br>';
    //  var_dump($_GET);
}
else
    echo "<p>Enter data and click send</p>";

?>
</br>
<a href="form.php">Back</a>