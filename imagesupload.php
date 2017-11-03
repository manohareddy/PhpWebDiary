<?php
    include'header.php';
$url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
if (strpos($url,'imageuploaded')!==false){
    echo "<center ><p style= 'color:red;'>--**image stored successfully**--</p></center>";
}
    elseif (strpos($url,'notloggedin')!==false){
    echo "<center ><p style= 'color:red;'>--**PLEASE LOG IN TO UPLOAD IMAGES**--</p></center>";
}
    elseif (strpos($url,'filenameexists')!==false){
    echo "<center ><p style= 'color:red;'>--**filename exists, Please change the filename and try again!**--</p></center>";
}
?>
<br><center>
<?php
$d=strtotime("now");
echo date("Y-m-d h:i:sa", $d) . "<br>";
?>
<form action="includes/imagesupload.inc.php" method="post" enctype="multipart/form-data">
    <br><br>
    
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload"><br><br>
    About Image:
    <input type="text" name="about"><br><br>
    <input type="checkbox" name="publish" value="1" checked>I am OK publishing my photos<br>
    <input type="submit" value="Upload Image" name="submit">
</form>
</center>
</body>
</html>