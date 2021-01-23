<?php

$name = filter_input(INPUT_POST, 'name');
$duration = filter_input(INPUT_POST, 'duration');
$date = filter_input(INPUT_POST, 'date');
$description = filter_input(INPUT_POST, 'description');

if (!empty($name) and !empty($duration) and !empty($date) and !empty($description)) {
    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "test";

    $conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);

    if (mysqli_connect_error()) {
        die('Connect Error ('.mysqli_connect_errno() .') '. mysqli_connect_error());
    }
    else {
        $sql = "INSERT INTO data (Name, Duration, Date, Description) values ('$name', '$duration', '$date', '$description')";
        if ($conn->query($sql)) {
            echo "New record is sucessfully inserted";
        }
        else {
            echo "Error: ". $sql ."
            ". $conn->error;
        }
    }
}
else {
    echo "One or more fields are empty";
    die();
}

?>