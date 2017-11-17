<?php

/*connecting to the database*/
$host = "127.0.0.1:3306";

$user = "root";

$pass = "";

$con = mysqli_connect($host,$user,$pass,"Dating");


if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}




$sql = "SELECT id, name, sex, nickname, superpower FROM user_table";

$result = $con->query($sql);

if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
        echo " " . $row["id"]. " - Name: " . $row["name"]. " - sex: " . $row["sex"]." - nickname: " .$row["nickname"]. " - Superpower: " .$row["superpower"]. "<a href='profile.php?id="  .$row["id"]. "'>SELECT PROFILE</a><br>";
    }
} else {
    echo "0 results";
}



?>

<a href="msg.php">SHOW MY MESSAGES</a>
