<!DOCTYPE html>
<html lang="en">
<?php
session_start();
require_once"interfaceClass.php";
$interfaceClass = new InterfaceClass();
$interfaceClass -> printHead("css/jd.css");
?>
<header>
<?php
$interfaceClass -> printHeader();
?>
</header>
<body>
        <div id="text">
        <p><h2>Witaj użytkowniku, witamy na Pomagam E22, strony do zakładania darmowych zbiórek!</h2></p>
        <h3>Oferujemy między innymi:</h3>
        <p>Szybkie utworzenie zbiórki<br>
        0 prowizji<br>
        Dział Wsparcia<br>
        Satysfakcje</p>
    </div>


    <?php
                       
    ?>
</body>
<footer>
    <?php
    $interfaceClass -> printFooter();
    ?>
</footer>
</html>