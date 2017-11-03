<?php
   session_start();
?>
<!Doctype html>
<html>
<head>
<meta charset="UTF-8" href="style.css">
<title>Dear Diary</title>
<link rel="stylesheet" type="text/css" href="style.css">
<header>
    <h1><a href="index.php">Dear Diary</a></h1>
    </head>
<body>
    
    <nav>
        <ul>
            <li><a href="index.php">HOME</a></li>
            <li><a href="feed.php">FEED</a></li>
            <li><a href="timeline.php">TIMELINE</a></li>            
                <?php
                    if(isset($_SESSION['id'])){
		                    echo "<form action ='includes/logout.inc.php'>
                                         <button>LOG OUT</button>
                                         </form>";
	                }else{
                     echo "<form action ='includes/login.inc.php' method='post' >
                             <input type='text' placeholder='PenName' name='pname' required>
                             <input type='password' placeholder='Password' name='pwd' required>
                             <button type='submit'>Login</button><br>
                           </form>";
                    }
                ?>
            <li><a href="signup.php">SIGN UP</a></li>
        </ul>
    </nav>
</header>
    
<div class="left">
    <nav>
        <ul>
            <li><a href="writediary.php"><button>Write diary</button></a></li><br><br><br><br>
            <li><a href="imagesupload.php"><button>Upload photo</button></a></li><br><br><br><br>
                
        </ul>
    </nav>
</div>
    
<div class="body">    