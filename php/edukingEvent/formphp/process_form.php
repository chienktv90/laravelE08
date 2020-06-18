<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = isset($_POST['name']) ? $_POST['name1'] : null;
    $age  = isset($_POST['age']) ? $_POST['age'] : null;
} else {
    $name = isset($_GET['name']) ? $_GET['name'] : null;
    $age  = isset($_GET['age']) ? $_GET['age'] : null;
}

if ($name) {
    //echo "action: process_form.php<br>";
    echo "My name: $name<br>";
    echo "Age: $age<br>";

    //  echo '$_POST<br>';
    //  var_dump($_POST);
    //  echo '<br>$_GET<br>';
    //  var_dump($_GET);
    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $dbName = "sukien";
    $conn = new mysqli($host, $user, $pass, $dbName);
    mysqli_set_charset($conn, 'utf8');
    if (!$conn) die('Khong the ket noi: ' . mysqli_connect_error());


    $sql = "INSERT INTO form_crud (id, name, age) VALUES (NULL, '$name', $age)";

    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    $sql = "SELECT * FROM form_crud";
    $result = mysqli_query($conn, $sql);


    if (mysqli_num_rows($result) > 0) {
        echo '<table border="1" ><tr><th>ID</th><th>Name</th></tr>';
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr><td>".$row["id"]."</td><td>".$row["name"]."</td></tr>";
        }
        echo "</table>";
    } else {
        echo "0 results";
    }

    mysqli_close($conn);
} else
    echo "<p>Enter data and click send</p>";

?>
</br>
<a href="form.php">Back</a>