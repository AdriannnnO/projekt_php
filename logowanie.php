<?php
session_start();
?>
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
    <form action="logowanie.php" method="POST">

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
require"klasa.php";




// echo $connection -> connect_errno; 
// echo $connection -> connect_error; 

if (isset($_POST["username"]) & isset($_POST["userPassword"]) & isset($_POST["userEmail"])) {
  $username = htmlentities($_POST['username'], ENT_QUOTES, "UTF-8");
  $userEmail = htmlentities($_POST['userEmail'], ENT_QUOTES, "UTF-8");
  $userPassword = htmlentities($_POST['userPassword'], ENT_QUOTES, "UTF-8");

  $MainObiekt = new MainClass("localhost","root","","baza");
  $connection = $MainObiekt -> connection();
  $MainObiekt->logowanie($username,$userEmail,$userPassword);

}





?>