<?php

$name = filter_input(INPUT_POST, 'name');
$duration = filter_input(INPUT_POST, 'duration');
$date = filter_input(INPUT_POST, 'date');
$description = filter_input(INPUT_POST, 'description');

if (!empty($name) and !empty($duration) and !empty($date) and !empty($description)) {
    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "test"

    $conn = new mysqli ($host, $dbusername, $dbpassword, $dbname)
}
else {
    echo "One or more fields are empty";
    die();
}