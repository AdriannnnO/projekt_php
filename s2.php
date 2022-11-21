<?php
session_start();
require"klasa.php";
$MainObiekt = new MainClass("localhost","root","","baza");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
if (isset($_SESSION['loggedin'])==TRUE) {
    echo "witaj";
}else{
    $MainObiekt -> przekierowanie('index.php');
}

$kaska_user = $MainObiekt -> stankonta($_SESSION['username']);

echo '<h1>Witaj ' . $_SESSION['username'] . ' stan twojego konta wynosi ' .  $kaska_user. '</h1>';

?>

</body>
</html>