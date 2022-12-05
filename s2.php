<?php
session_start();
require"klasa.php";
$MainObiekt = new MainClass();
require_once"interfaceClass.php";
$interfaceClass = new InterfaceClass();
?>
<!DOCTYPE html>
<html lang="en">
<?php
$interfaceClass -> printHead("jd.css");
?>
<body>
<form>
<label for="cars">Choose a car:</label>

<select name="grupa" id="grupa">
  <option value="0">0</option>
  <option value="a">A</option>
  <option value="b">B</option>
  <option value="ab">AB</option>
</select>
<input type="submit" name="ok" value="ok" />
</form>

<?php
if (isset($_SESSION['loggedin'])==TRUE) {
    echo "witaj";
}else{
    $MainObiekt -> przekierowanie('index.php');
}

$kaska_user = $MainObiekt -> stankonta($_SESSION['username']);
$grupa = $MainObiekt -> grupa($_SESSION['username']);


echo '<h1>Witaj ' . $_SESSION['username'] . ' stan twojego konta wynosi ' .  $kaska_user. '</h1>';
echo '<h1>Witaj ' . $_SESSION['username'] . ' twoja grupa krwi to: ' .  $grupa. '</h1>';

// // echo '<form>Wpłać pieniądze na konto<input type="number" name="ile" id="ile"><br><input type="submit" name="WPLAC" value="WPLAC" /></button></form>';
// echo '<h1><a href="logout.php">Wyloguj</h1></a>';
// if (isset($_GET['ile'])){
//     dymy($_SESSION['username'],$_GET['ile']);
//     alert('Pomyślnie wpłacono');
//     header('Location: s2.php');
// }

// function dymy($jd,$jd2){
//     $MainObiekt = new MainClass("localhost","root","","baza");
//     if ($jd2=="" or $jd2==null){
//         alert("nie");
//     }else{
//         $MainObiekt -> wplacpieniadze($jd,$jd2);
//     }
// }

if (isset($_GET['grupa'])){
    dymy($_SESSION['username'],$_GET['grupa']);
    alert('Grupa krwi ustawiona pomyślnie');
    header('Location: s2.php');
}

function dymy($jd,$jd2){
    $MainObiekt = new MainClass("localhost","root","","baza");
    if ($jd2=="" or $jd2==null){
        alert("nie");
    }else{
        $MainObiekt -> ustaw_grupe_krwi($jd,$jd2);
    }
}




?>

</body>
<footer>
    <?php
    $interfaceClass -> printFooter();
    ?>
</footer>
</html>











