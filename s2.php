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
echo '<form>Wpłać pieniądze na konto<input type="number" name="ile" id="ile"><br><input type="submit" name="WPLAC" value="WPLAC" /></button></form>';
echo '<h1><a href="logout.php">Wyloguj</h1></a>';
if (isset($_GET['ile'])){
    dymy($_SESSION['username'],$_GET['ile']);
    alert('Pomyślnie wpłacono');
    header('Location: s2.php');
}

function dymy($jd,$jd2){
    $MainObiekt = new MainClass("localhost","root","","baza");
    if ($jd2=="" or $jd2==null){
        alert("nie");
    }else{
        $MainObiekt -> wplacpieniadze($jd,$jd2);
    }
}




?>

</body>
</html>


