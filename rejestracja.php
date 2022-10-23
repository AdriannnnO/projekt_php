<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="rejestracja.css">

    <title>Document</title>
</head>
<body>
    <h1> <a href="index.php"> <- Wróć </h1></a>
    <h1 id="rej">Rejestracja</h1>
    <form action="rejestracja.php" method="post">

  <div class="container">

    <P><label for="username"><b>Username</b></label></p>
    <input type="text" placeholder="Enter Username" name="username" id="" required>

    <P><label for="userPassword"><b>Password</b></label></p>
    <input type="password" placeholder="Enter Password" name="userPassword" id="" required>

    <p><label for="userEmail"><b>Email</b></label></p>
    <input type="email" placeholder="Enter Email" name="userEmail" id="" requierd>

    <button type="submit" name="ok">Register</button>
    
  </div>

  <div class="container" style="background-color:#f1f1f1">
    <button type="button" class="cancelbtn">Cancel</button>
    <span class="psw"><a href="xd.html">Forgot password?</a></span>
  </div>
</form>

<?php

require_once"config.php";

$connection = new mysqli($host, $db_user, $db_password, $db_name);

echo $connection -> connect_errno;
echo $connection -> connect_error; 

if (isset($_POST["username"])) {
  echo "<p>username set</p>";    
} else {    
  echo "<p>username not set</p>";
}
if (isset($_POST["userEmail"])) {
  echo "<p>useremail set</p>";    
} else {    
  echo "<p>useremail not set</p>";
}
if (isset($_POST["userPassword"])) {
  echo "<p>userpassword set</p>";    
} else {    
  echo "<p>userpassword not set</p>";
}

if (isset($_POST["username"]) & isset($_POST["username"]) & isset($_POST["username"])) {
    $sql = "INSERT INTO uzytkownicy (id, username, userPassword,	userEmail) values ('','".$_POST["username"]."','".$_POST["userPassword"]."','".$_POST["userEmail"]."')";
    $result = $connection -> query($sql);
}
  else{
    echo "nie";
  }



$connection -> close();

?>
</body>
</html>