<html>
    <head>
        <link rel="stylesheet" type="text/css" href="style.css">
        <title>Workout Buddies</title>
        <meta charset="UTF-8">
        <meta name="author" content="Tejas George">
    </head>

    <body>
        <h1 class="title">Workout Buddies</h1>
        <a href="table.php">Leaderboard</a>
<?php

$name = filter_input(INPUT_POST, 'name');
$duration = filter_input(INPUT_POST, 'duration');
$date = filter_input(INPUT_POST, 'date');
$description = filter_input(INPUT_POST, 'description');

if (!empty($name) and !empty($duration) and !empty($date) and !empty($description)) {
    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "workout_buddies_data";

    $conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);

    if (mysqli_connect_error()) {
        die('Connect Error ('.mysqli_connect_errno() .') '. mysqli_connect_error());
    }
    else {
        $sql = "INSERT INTO input_data (Name, Duration, Date, Description) values ('$name', '$duration', '$date', '$description')";
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

$conn->close();

?>
    </body>
</html>