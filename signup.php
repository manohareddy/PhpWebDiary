<?php
    include 'header.php';



if(isset($_SESSION['id'])){
		 echo "YOU ARE ALREADY LOGGED IN!";
	 }else{
		 header("Location: signupnext.php");
	 }	
?>

</body>
</html>