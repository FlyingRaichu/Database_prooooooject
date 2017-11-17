<?php
$host = "127.0.0.1:3306";
$user = "root";
$pass = "";

$con = mysqli_connect($host,$user,$pass,"Dating");

if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}



if (isset($_GET))  {
    $uid = $con->real_escape_string($_GET['id']);
    $comment = $con->real_escape_string($_GET['com']);


    $ins="INSERT INTO comment_table (id,sender,reciever,comment) VALUES ('','2','$uid','$comment')";


    if ($con->query($ins) === TRUE) {
        echo "Record updated successfully";


    } else {
        echo "Error updating record: " . $con->error;
    }

}

else {
    echo "problem";
}
?>