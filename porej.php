<?php
require('klasa.php');
session_start();
?>
<link rel="stylesheet" type="text/css" href="css/style.css">
<?php
$MainObiekt = new MainClass("localhost","root","","baza");
if (isset($_SESSION['loggedin'])==TRUE) {
        echo "<h1>rejestracja zakończona sukcesem<h1>";
        echo "<h1><a href='index.php'>POWRÓT</a></h1>";
    }else{
        $MainObiekt -> przekierowanie("index.php");
        // echo "nigga";
     }
?>

<style>
    h1{
        text-align: center;
    }
</style>