<?php
ob_start();
session_start();
require'klasa.php'
?>
<!DOCTYPE html>
<html lang="en">
<?php
require_once"interfaceClass.php";
$interfaceClass = new InterfaceClass();
$interfaceClass -> printHead("jd.css");
?>
<?php
        if (isset($_SESSION['username'])) {
            // echo '<h1>Witaj ' . $_SESSION['username'] . '</h1>';
        }
        else{
            $interfaceClass -> przekierowanie("index.php");
            // echo "nigga";
        }
    ?>
<header>
    <?php
    $interfaceClass -> printHeader();
    ?>
    </header>
    <body>
    <div id="text">
        <P id="lorem">Witaj użytkowniku, witamy na Pomagam E22, strony do zakładania darmowych zbiórek!</p>
    </div>
    <div id="Sponsorowane_filmy">
        <h2>Dlaczego my?</h2>
        <p>łatwy przydział ludzi</p>
        <p>a</p>
    </body>
<footer>
<?php
$interfaceClass -> printFooter();
?>
</footer>
</html>