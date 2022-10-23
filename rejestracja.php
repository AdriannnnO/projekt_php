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

if (isset($_POST["username"]) & isset($_POST["userPassword"]) & isset($_POST["userEmail"])) {
  $username = $_POST["username"];
  $useremail = $_POST['userEmail'];
  $userpassword = $_POST['userPassword'];

  if ($username != '' & $useremail != '' & $userpassword != ''){
    $conn = new mysqli($host, $db_user, $db_password, $db_name);

    echo $conn -> connection_errno;
    echo $conn -> connect_error;

     $sql = "SELECT * FROM uzytkownicy WHERE username='$username'AND userEmail='$useremail' AND userPassword='$userpassword'";
     $result = $conn -> query($sql);
     if ($result -> num_rows == 1){
         echo "uzytkownik juz istnieje!";
     } else {
      $sql = "INSERT INTO uzytkownicy (username, useremail, userpassword) values ('".$username."','".$useremail."','".$userpassword."')";
        $result = $conn -> query($sql);
}
$conn -> close();
}
}







?>
</body>
</html>