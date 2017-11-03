<?php
session_start();
include '../dbh.php';

$pname = $_POST["pname"];
$password = $_POST["password"];
$fname = $_POST["fname"];
$lname = $_POST["lname"];
$email = $_POST["email"];
$gender = $_POST["gender"];
$age = $_POST["age"];
$city = $_POST["city"];
$state = $_POST["state"];
$country = $_POST["country"];

if (empty($pname)){
    header("Location: ../signupnext.php?error=emptypenname");
    exit();
}
if (empty($password)){
    header("Location: ../signupnext.php?error=emptypassword");
    exit();    
}
if (empty($fname)){
    header("Location: ../signupnext.php?error=emptyfirstname");
    exit();    
}
if (empty($lname)){
    header("Location: ../signupnext.php?error=emptylname");
    exit();  
}
if (empty($email)){
    header("Location: ../signupnext.php?error=emptyemail");
    exit();  
}
if (empty($gender)){
    header("Location: ../signupnext.php?error=emptygender");
    exit();  
}
if (empty($age)){
    header("Location: ../signupnext.php?error=emptyage");
    exit();  
}
if (empty($city)){
    header("Location: ../signupnext.php?error=emptycity");
    exit();  
}
if (empty($country)){
    header("Location: ../signupnext.php?error=emptycounry");
    exit();  
}
else{
    $sql= "SELECT penname FROM personaldetails WHERE penname='$pname'";
    $result= mysqli_query($conn, $sql);
    $pennamecheck = mysqli_num_rows($result);
    
    if($pennamecheck > 0){
        header("Location: ../signupnext.php?error=usernametaken");
    exit();
    
    }else{
$sql = "INSERT INTO personaldetails(penname, pword, firstname, lastname, email, age, gender, city, state, country) VALUES ('".$pname."','".$password."','".$fname."','".$lname."','".$email."',".$age.",'".$gender."','".$city."','".$state."','".$country."')";

if ($conn->query($sql) === TRUE) {
	header("location: ../index.php");
    echo "Your Profile is created successfully";
} else {
	//header("location: ../index.php");
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}
}
$conn->close();

?>