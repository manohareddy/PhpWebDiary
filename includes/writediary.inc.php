<?php
session_start();

include '../dbh.php';

if(!isset($_SESSION['id'])){
    header("Location: ../writediary.php?notloggedin");
		// echo "<b>YOU ARE NOT LOGGED IN YET, PLEASE LOG IN!</b>";
	 }else{
		 
$heading=$_POST['head'];
$notes =$_POST['notes'];

$sql = "INSERT INTO diarynotes( penid, DATE, heading, notes, publishOk ) 
VALUES ( ".$_SESSION['id'].", NOW(), '".$heading."','".$notes."', ".$_POST['publish']." )";

$results=mysqli_query($conn, $sql);
if($results == TRUE){
    header ("Location: ../writediary.php?diarystored");
    //echo "Diary Stored successfully";    
}else{
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}
mysqli_close($conn);
?>