
<?php
    include 'header.php';
?>

<br><br>
<?php
$url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
if (strpos($url,'error=empty')!==false){
    echo "<center ><p style= 'color:red;'>--**Fill all fields!**--</p></center>";
}
elseif (strpos($url,'error=usernametaken')!==false){
    echo "<center ><p style= 'color:red;'>--**Pen Name already taken choose another one!**--</p></center>";
}

?>
<head>
<link rel='stylesheet' type='text/css' href='forregistrationpage.css'>
</head>
<br><br>
<h4 >CREATE YOUR PROFILE</h4>
<form id="ff" action="includes/signup.inc.php" method="POST">
  <div class="col-2">
    <label>
      Pen Name
      <input placeholder="create a penname" id="pname" name="pname" tabindex="1">
    </label>
  </div>

  <div class="col-2">
    <label>
      password
      <input type = "PASSWORD" placeholder="protect your profile with a password" id="password" name="password" tabindex="2">
    </label>
  </div>
  <div class="col-3">
    <label>
      First Name
      <input placeholder="What is your first name?" id="fname" name="fname" tabindex="3">
    </label>
  </div>
  <div class="col-3">
    <label>
      Last Name
      <input placeholder="What is your last name?" id="lname" name="lname" tabindex="4">
    </label>
  </div>
  <div class="col-3">
    <label>
      Email
      <input placeholder="What is your e-mail address?" id="email" name="email" tabindex="5">
    </label>
  </div>
  <div class="col-2">
    <label>
      Gender
      <select name= "gender" tabindex="6">
        <option>male</option>
        <option>female</option>
        <option>other</option>
      </select>
    </label>
  </div>

  <div class="col-2">
    <label>
      Age
      <input placeholder="whats your age?" id="age" name="age" tabindex="7">
    </label>
  </div>
  <div class="col-3">
    <label>
      City
      <input placeholder="where do you live?" id="city" name="city" tabindex="8">
    </label>
  </div>
    <div class="col-3">
    <label>
      State
      <input placeholder="which state?" id="state" name="state" tabindex="9">
    </label>
  </div>
  <div class="col-3">
    <label>
      Country
      <input placeholder="which country are you from?" id="country" name="country" tabindex="10">
    </label>
  </div>

  <div class="col-submit">
    <button class="submitbtn">Create my Profile</button>
  </div>

</form>
</body>
</html>