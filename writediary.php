<?php
    include'header.php';

$url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
if (strpos($url,'diarystored')!==false){
    echo "<center ><p style= 'color:red;'>--**diary stored successfully**--</p></center>";
}
    elseif (strpos($url,'notloggedin')!==false){
    echo "<center ><p style= 'color:red;'>--**PLEASE LOG IN TO WRITE DIARY**--</p></center>";
}

?>
<head>
<style>
    form input[textarea]:focus{
        background-color: #d5f2e9;
    }
    form input[textarea]{
        float: none;
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        box-sizing: border-box;
        border: 1px solid #555;
        outline: none;
    }
    form button {
        float: right;
        margin-bottom: auto;
        margin-right: 420px;
        border: none;
        padding: 10px 21px;
        border-radius: 8px;
        background-color: #f2e398;
        color: #0f1438;
        display: inline-block;
        font-size: 14px;
        cursor: pointer;
    }
    form button:focus{
        background-color:#d5f2e9; 
    }
</style>
</head>
<br>
<center>
<?php
$d=strtotime("now");
echo date("Y-m-d h:i:sa", $d) . "<br>";
?>
<form action="includes/writediary.inc.php" method ="post">

    <br><br>
    <h5 style="font-family: courier;">Heading:</h5><br>
    <textarea rows="2" cols="70" placeholder="Title" name="head" required></textarea><br><br>

    <h5 style="font-family: courier;">Write your Diary below:</h5><br>
    <textarea rows="20" cols="100" name="notes" ></textarea><br><br>
    <input type="checkbox" name="publish" value="1">I am ok publishing this data to public<br>
    <button>finished writing </button>
    
</form>
</center>
</div>
</body>
</html>