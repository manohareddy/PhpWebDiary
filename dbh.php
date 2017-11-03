<?php 
$server = "localhost"; 
$username = "peddires"; 
$password = "peddires";
$database = "peddires_db";
// Create connection 
$conn = new mysqli($server, $username, $password, $database);
// Check connection 
if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error); 
} 
?>
