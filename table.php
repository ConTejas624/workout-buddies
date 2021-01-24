<html>
    <head>
        <link rel="stylesheet" type="text/css" href="style.css">
        <title>Workout Buddies</title>
        <meta charset="UTF-8">
        <meta name="author" content="Tejas George">
    </head>

    <body>
        <h1 class="title">Workout Buddies</h1>
        <a href="form.html">Workout entry</a><br><br>
        <table id="data_table">
            <tr>
                <th>Name</th>
                <th>Workouts this week</th>
                <th>Total workouts of all time</th>
            </tr>
<?php

exec('cd '.__DIR__);
exec('python analyze.py');

$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "workout_buddies_data";

$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);

if (mysqli_connect_error()) {
    die('Connect Error ('.mysqli_connect_errno() .') '. mysqli_connect_error());
}

$sql = "SELECT * FROM leaderboard";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    ?>
    <tr>
        <td>
            <?php echo $row['name'];?>
        </td>
        <td>
            <?php echo $row['this_week'];?>
        </td>
        <td>
            <?php echo $row['total'];?>
        </td>
    </tr>
    <?php
  }
} else {
  echo "0 results";
}
$conn->close();

?>         
        </table>
    </body>
</html>