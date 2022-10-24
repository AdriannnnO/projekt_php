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
    <h1> <a href="index.php"> <- Wróć</h1></a>
    <h1 id="rej">Logowanie</h1>
    <form action="logowanie.php" method="get">

  <div class="container">

    <P><label for="username"><b>Username</b></label></p>
    <input type="text" placeholder="Enter Username" name="username" id="" required>

    <P><label for="userPassword"><b>Password</b></label></p>
    <input type="password" placeholder="Enter Password" name="userPassword" id="" required>

    <p><label for="userEmail"><b>Email</b></label></p>
    <input type="email" placeholder="Enter Email" name="userEmail" id="" requierd>

    <button type="submit" name="ok">Login</button>
    
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

if (isset($_GET["username"]) & isset($_GET["userPassword"]) & isset($_GET["userEmail"])) {
  $username = htmlentities($_GET['username'], ENT_QUOTES, "UTF-8");
  $userEmail = htmlentities($_GET['userEmail'], ENT_QUOTES, "UTF-8");
  $userPassword = htmlentities($_GET['userPassword'], ENT_QUOTES, "UTF-8");

  $sql = sprintf(
    "SELECT * FROM uzytkownicy WHERE userEmail='%s' AND userPassword='%s' AND username='%s'",
    mysqli_real_escape_string($connection, $userEmail),
    mysqli_real_escape_string($connection, $userPassword),
    mysqli_real_escape_string($connection, $username)
    );
  $result = $connection -> query($sql);
if($result = $connection -> query($sql)) {

    if($result -> num_rows > 0) {

    $data = $result -> fetch_assoc();
    $user = $data['username'];
    $email = $data['userEmail'];
    $result -> close();
    $_SESSION['loggedin'] = true;
    $_SESSION['username'] = $data['username'];
    // if ($_SESSION['loggedin'] = true) {
      header('Location: indexlogin.php');
    // } 
  }
  else {
    $_SESSION['loginerror'] = true;
    if ($_SESSION['loginerror'] = true) {
      echo "<h1>niepoprawne dane logowanie</h1>";
    }
  }
  
}




$connection -> close();
}





?>