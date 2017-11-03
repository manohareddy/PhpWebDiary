<?php
    include'header.php';

$url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
if (strpos($url,'error=wrongcredentials')!==false){
    echo "<center ><p style= 'color:red;'>--**incorrect password or pen name!**--</p></center>";
}
elseif (strpos($url,'notloggedin')!==false){
    echo "<center ><p style= 'color:red;'>--**Please login First!**--</p></center>";
}
else{
    if(isset($_SESSION['id'])){
    
        include 'dbh.php';
        $sql="SELECT * FROM personaldetails WHERE penid=".$_SESSION['id'];
        $result=mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        echo "<center><br><br>WELCOME  ".strtoupper($row['firstname'])."<br></center>";
        mysqli_close($conn);
         }else{

             echo "you are not logged in!<br></center>";
    }
}	
?>  
</div>
</body>
</html>