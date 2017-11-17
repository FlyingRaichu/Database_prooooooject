<?php
$host = "127.0.0.1:3306";
$user = "root";
$pass = "";

$con = mysqli_connect($host,$user,$pass,"Dating");

if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$_profile_id = 2;



$sql = "SELECT sender, message FROM msg_table  WHERE id = $profile_id";

$result = $con->query($sql);

if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
        echo " - Name: " . $row["name"]. " - sex: " . $row["sex"]." - nickname: " .$row["nickname"]. " - Superpower: " .$row["superpower"]. "<br>";
        $uname = $row["name"];
        $usex = $row["sex"];
        $unickname = $row["nickname"];
        $upower = $row["superpower"];
    }
} else {
    echo "0 results";
}


?>
