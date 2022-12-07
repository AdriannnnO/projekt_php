<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">

    <title>Document</title>
</head>
<body>
    <h1> <a href="index.php"> <- Wróć</h1></a>
    <h1 id="rej">Logowanie</h1>


    <div class="center-item">
    <form action="logowanie.php" method="POST">
    <input type="text" placeholder="Enter Username" name="username" id="" required>

    <input type="password" placeholder="Enter Password" name="userPassword" id="" required>

    <input type="email" placeholder="Enter Email" name="userEmail" id="" requierd>

    <button type="submit" name="ok">Login</button>
    
  </div>

</form>

<?php
require"klasa.php";




// echo $connection -> connect_errno; 
// echo $connection -> connect_error; 

if (isset($_POST["username"]) & isset($_POST["userPassword"]) & isset($_POST["userEmail"])) {
  $username = htmlentities($_POST['username'], ENT_QUOTES, "UTF-8");
  $useremail = htmlentities($_POST['userEmail'], ENT_QUOTES, "UTF-8");
  $userpassword = htmlentities($_POST['userPassword'], ENT_QUOTES, "UTF-8");

  $MainObiekt = new MainClass();
  $conn = $MainObiekt -> connector("localhost","root","","baza");
  $sql = sprintf(
    "SELECT * FROM uzytkownicy WHERE userEmail='%s' AND userPassword='%s' AND username='%s'",
    mysqli_real_escape_string($conn, $useremail),
    mysqli_real_escape_string($conn, $userpassword),
    mysqli_real_escape_string($conn, $username)
    );
  $result = $conn -> query($sql);
if($result = $conn -> query($sql)) {

    if($result -> num_rows > 0) {

    $data = $result -> fetch_assoc();
    $user = $data['username'];
    $email = $data['userEmail'];
    $result -> close();
    $_SESSION['loggedin'] = true;
    $_SESSION['username'] = $data['username'];
    $MainObiekt -> przekierowanie("lista.php");
  }
  else {
    $_SESSION['loginerror'] = true;
    if ($_SESSION['loginerror'] = true) {
    //   echo "<h1>niepoprawne dane logowanie</h1>";
      alert("niepoprawne dane logowania");
      
    }
  }

}
}





?>