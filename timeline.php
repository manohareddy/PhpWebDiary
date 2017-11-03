<?php
include 'header.php';

if(!isset($_SESSION['id'])){
    header("Location: index.php?notloggedin");
		// echo "<b>YOU ARE NOT LOGGED IN YET, PLEASE LOG IN!</b>";
}else{
include 'dbh.php';
    
    $sql = "SELECT date , heading, notes
            FROM 
            (SELECT date, heading, notes FROM diarynotes WHERE penid=".$_SESSION['id']." 

            UNION ALL

            SELECT date, about as heading, filename as notes FROM multimedia WHERE penid=".$_SESSION['id'].")T

            ORDER BY Date DESC";
    
$result = mysqli_query($conn, $sql);
$check = mysqli_num_rows($result);
if ($check > 0) {
 // output data of each row
 while($row = mysqli_fetch_assoc($result)) {
     $r= implode("",$row);
      if (strpos($r,'image-')==false){
            echo "<center><h5>".$row['date']."</h5><br><p><b>".$row['heading']."</b><br>".$row['notes']."<br><br><br></center>";
      }else{
            echo "<center><h5>".$row['date']."</h5><br><p><b>".$row['heading']."</b><br><img src='includes/uploads/".$row['notes']."' style='width:100%;height:100%;'><br><br><br></center>";
        }
}
}

mysqli_close($conn);
}
?>
</div>
</body>
</html>

