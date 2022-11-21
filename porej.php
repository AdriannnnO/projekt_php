<?php
require('klasa.php');
session_start();
?>
<link rel="stylesheet" type="text/css" href="jd.css">
<?php
$MainObiekt = new MainClass("localhost","root","","baza");
if (isset($_SESSION['loggedin'])==TRUE) {
        echo "<h1>rejestracja zakończona sukcesem<h1>";
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