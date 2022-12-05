<!DOCTYPE html>
<html lang="en">
<?php
require_once"interfaceClass.php";
$interfaceClass = new InterfaceClass();
$interfaceClass -> printHead("jd.css");
?>
<header>
<?php
$interfaceClass -> printHeader();
?>
</header>
<body>
    <?php 
        session_unset();
    ?>
        <div id="text">
        <P id="lorem">Lorem ipsum dolor sit amet, consectetur adipiscing elit. In varius eleifend lobortis. Integer commodo sit amet nibh sit amet vehicula. Mauris ac tincidunt ante, id placerat tortor. Vestibulum dignissim sollicitudin erat quis vehicula. Integer nec ullamcorper mauris. Morbi tincidunt, tortor vel rutrum dictum, tellus tellus dapibus dui, non vehicula augue mauris at arcu. Sed laoreet tellus quis arcu pretium hendrerit. Phasellus posuere, metus nec elementum interdum, mauris velit accumsan enim, ut iaculis massa neque ut nisl. Quisque eu egestas mauris. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris tempus, velit eu gravida accumsan, orci tellus varius nisi, in euismod.</p>
    </div>;
    <div id="Sponsorowane_filmy">
        <h2>Dlaczego my?</h2>
        <p>łatwy przydział ludzi</p>
        <p>prosta obsługa</p>
        <p>niskie ceny</p>
        <p>x</p>
        <p>x</p>
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