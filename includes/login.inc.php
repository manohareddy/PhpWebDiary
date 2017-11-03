<?php
session_start();
include '../dbh.php';

$username = $_POST["pname"];
$password = $_POST["pwd"];

$sql="SELECT * FROM personaldetails WHERE penname='$username' AND pword ='$password'";
$result=mysqli_query($conn, $sql);

if(!$row = mysqli_fetch_assoc($result)){
    header("Location: ../index.php?error=wrongcredentials");
    exit();
    }
    else {
        //echo $row['penid'];
       $_SESSION['id'] = $row['penid'];
       //echo "you are logged in";
    }
header("Location: ../index.php");
mysqli_close($conn);
?>