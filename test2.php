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
    <h1>jakieś ten tego</h1>
    <form action="test2.php" method="get">
  <div class="container">
    <P><label for="uname"><b>Username</b></label></p>
    <input type="text" placeholder="Enter Username" name="name" >
    <?php
    if(empty($_GET["name"])){
        echo 'nie wprowadzono nazwy użytkownika';
    }
    else{
        echo "twoja nazwa to " . $_GET['name'];
    }
    ?>

    <P><label for="psw"><b>Password</b></label></p>
    <input type="password" placeholder="Enter Password" name="psw" >
    <?php
    if (empty($_GET['psw'])){
        echo "nie wprowadzono hasła";
    }
    else{
        echo "hasło wprowadzone";
    }
    ?>
    <button type="submit" name="ok">Register</button>
    
    <label>
      <input type="checkbox" checked="checked" name="remember"> Remember me
    </label>
  </div>

  <div class="container" style="background-color:#f1f1f1">
    <button type="button" class="cancelbtn">Cancel</button>
    <span class="psw">Forgot <a href="xd.html">password?</a></span>
  </div>
</form>

<?php
     $name = $psw = "";

     if ($_SERVER["REQUEST_METHOD"] == "POST") {
       $name = test_input($_POST["name"]);
       $email = test_input($_POST["email"]);
       $website = test_input($_POST["website"]);
       $comment = test_input($_POST["comment"]);
       $gender = test_input($_POST["gender"]);
     }
     
     echo $name
?>
</body>
</html>