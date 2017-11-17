<html>
<?php
$host = "127.0.0.1:3306";
$user = "root";
$pass = "";

$con = mysqli_connect($host,$user,$pass,"Dating");

if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$profile_id = $_GET['id'];
$_profile_id = $con->real_escape_string($profile_id);

if(empty($profile_id)) {
    echo "problem";
}

else {


$sql = "SELECT name, sex, nickname, superpower FROM user_table WHERE id = $_profile_id";

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


    if ($_SERVER['REQUEST_METHOD'] === 'POST')  {
        $ins="INSERT INTO like_table (id,sender,reciever) VALUES ('','2','$profile_id')";
        $put = $con->query($ins);
        }
?>
   <h1>Like profile</h1>
    <form action="" method="post">
        <input type="submit" value="like" id="like" name="like">
    </form>
Like: <?php



    $query="SELECT COUNT(id) as total FROM like_table WHERE reciever = $_profile_id";
    $ran = $con->query($query);
    $number = $ran->fetch_assoc();
    echo $number['total'];





    ?>
<h2>Edit Profile</h2>


<form action="edit.php" method="get">
    <input type="hidden" name="id" id="id" value="<?php echo $_profile_id; ?>" />

        <label><b>Name</b></label>
        <input type="text" placeholder="Enter Name" id="ename" name="ename" value="<?php echo $uname ?>">

        <label><b>sex</b></label>
        <input type="text" placeholder="Enter sex" name="esex" value="<?php echo $usex?>" >

        <label><b>nickname</b></label>
        <input type="text" placeholder="Enter nickname" name="enickname" value="<?php echo $unickname ?>">

        <label><b>Superpower</b></label>
        <input type="text" placeholder="Enter Superpower" name="epower" value="<?php echo $upower ?>">

        <input type="submit" value="submit" id="submit" name="submit">
</form>

<h2>Comments</h2>
    <?php



    $sql = "SELECT user_table.name, comment_table.comment FROM user_table INNER JOIN comment_table ON user_table.id=comment_table.sender WHERE comment_table.reciever = $_profile_id";

    $result = $con->query($sql);

    if ($result->num_rows > 0) {

        while($row = $result->fetch_assoc()) {
            echo "name: " . $row["name"]. "<br> - comment: " . $row["comment"]. "<br>";
        }
    } else {
        echo "0 results";
    }
    ?>


    <form action="comment.php" method="get">
        <input type="hidden" name="id" id="id" value="<?php echo $_profile_id; ?>" />


        <label><b>Text</b></label>
        <input type="text" placeholder="Enter text" name="com" ">

        <input type="submit" value="submitcom" id="submitcom" name="submitcom">
    </form>

<?php }



?>

</html>
