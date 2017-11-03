<?php
session_start();
include'../dbh.php';

if(!isset($_SESSION['id'])){
    header("Location: ../imagesupload.php?notloggedin");
		// echo "<b>YOU ARE NOT LOGGED IN YET, PLEASE LOG IN!</b>";
	 }else{
$target_dir = "uploads/";
$target_file = $target_dir ."image-". basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        header ("Location: ../imagesupload.php?error=filenotimage");
        //echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    header ("Location: ../imagesupload.php?error=fileexists");
    //echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    header ("Location: ../imagesupload.php?error=filetoolarge");
    //echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" && $imageFileType != "JPG" ) {
    header ("Location: ../imagesupload.php?error=fileformatnotsupported");
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    header ("Location: ../imagesupload.php?error=filenotuploaded1");
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        header ("Location: ../imagesupload.php?error=fileuploaderror");
        echo "Sorry, there was an error uploading your file.";
    }
}
    
$about =$_POST['about'];
$name= "image-".basename( $_FILES["fileToUpload"]["name"]);
$a= "uploads/".$name;
    if(file_exists($a)==false){
        header ("Location: ../imagesupload.php?error=filenotuploaded");
    }
else{
$sql= "SELECT filename FROM multimedia WHERE filename='$name'";
    $result= mysqli_query($conn, $sql);
    $filenamecheck = mysqli_num_rows($result);
    
    if($filenamecheck > 0){
        header("Location: ../imagesupload.php?error=filenameexists");
    exit();
    }else{
$sql= "INSERT INTO multimedia(penid, date, about, filename, publishOk) values(".$_SESSION['id'].",NOW(),'".$about."', '".$name."', ".$_POST['publish'].")";
$result= mysqli_query($conn, $sql);

if($result == TRUE){
    header ("Location: ../imagesupload.php?imageuploaded");
    //echo "image uploaded successfully";    
}else{
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}
}
}
mysqli_close($conn);

?>