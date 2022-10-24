<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="jd.css">
    <title>Document</title>
</head>
<body>
<?php
        session_start();
        if (isset($_SESSION['username'])) {
            echo '<h1>Witaj ' . $_SESSION['username'] . '</h1>';
        }
    ?>
    <div id="stronga_główna">
        <h1>Filmweb_logo</h1>
    </div>
    <div id="navbar">
        <h3 id="navbarContent"><a href="s2.php">Ranking</h3></a>
        <h3 id="navbarContent"><a href="index.php">Wyloguj się</h3></a>
    </div>
    <div id="text">
        <P id="lorem">Lorem ipsum dolor sit amet, consectetur adipiscing elit. In varius eleifend lobortis. Integer commodo sit amet nibh sit amet vehicula. Mauris ac tincidunt ante, id placerat tortor. Vestibulum dignissim sollicitudin erat quis vehicula. Integer nec ullamcorper mauris. Morbi tincidunt, tortor vel rutrum dictum, tellus tellus dapibus dui, non vehicula augue mauris at arcu. Sed laoreet tellus quis arcu pretium hendrerit. Phasellus posuere, metus nec elementum interdum, mauris velit accumsan enim, ut iaculis massa neque ut nisl. Quisque eu egestas mauris. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris tempus, velit eu gravida accumsan, orci tellus varius nisi, in euismod.</p>
    </div>
    <div id="Sponsorowane_filmy">
        <h2>$PON$OROWANE FILMY</h2>
        <p>jakis film</p>
        <p>jakis film</p>
        <p>jakis film</p>
        <p>jakis film</p>
        <p>jakis film</p>
    </div>
</body>
<footer>
    <div id="footer_content">siema eniu</div>
    <div id="footer_content">siema eniu</div>
    <div id="footer_content">siema eniu</div>
</footer>
</html>