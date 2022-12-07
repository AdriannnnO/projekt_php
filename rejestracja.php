<?php
require"klasa.php";
session_start();
$MainObiekt = new MainClass();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <title>DocumEnt</title>
</head>
<body>
    <h1> <a href="index.php"> <- Wróć </h1></a>
    <h1 id="rej">Rejestracja</h1>
    <div class="center-item">
    <form action="rejestracja.php" method="post" accept-charset="UTF-8">
    <input type="text" placeholder="Enter Username" name="username" id="" required>


    <input type="password" placeholder="Enter Password" name="userPassword" id="" required>


    <input type="password" placeholder="Repeat Password" name="repeatPassword" id="" required>


    <input type="email" placeholder="Enter Email" name="userEmail" id="" requierd>

    <button type="submit" name="ok">Register</button>
    
  </div>
</form>

<?php


// echo $_POST['repeatPassword'];
// $repeatPassword = $_POST['repeatPassword'];





if (isset($_POST["username"]) & isset($_POST["userPassword"]) & isset($_POST["userEmail"])) {
  $username = $_POST["username"];
  $useremail = $_POST['userEmail'];
  $userpassword = $_POST['userPassword'];
  $repeatPassword = $_POST['repeatPassword'];


  if (isset($username) & isset($useremail) & isset($userpassword)){
    if ($MainObiekt->walidacja($username,$useremail,$userpassword,$repeatPassword)==TRUE){
      $conn = $MainObiekt -> connector("localhost","root","","baza");
      $sql = "SELECT * FROM uzytkownicy WHERE username='$username'AND userEmail='$useremail' AND userPassword='$userpassword'";
      $result = $conn -> query($sql);
      if ($result -> num_rows == 1){
          alert("uzytkownik juz istnieje!");
      } else {
          $sql = "INSERT INTO uzytkownicy (username, useremail, userpassword) values ('".$username."','".$useremail."','".$userpassword."')";
          $result = $conn -> query($sql);
          echo "rej dokonczony"; 
        $_SESSION['loggedin'] = true;
        $MainObiekt -> przekierowanie('porej.php');
      }

  }
}
alert("niepoprwane dane logowania");
}
// $connection -> close();











?>
</body>

</html>