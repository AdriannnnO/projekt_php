<!DOCTYPE html>
<html lang="en">
<?php
session_start();
require_once"interfaceClass.php";
$MainObiekt = new MainClass();
$interfaceClass = new InterfaceClass();
$interfaceClass -> printHead("css/jd.css");
?>
<header>
<?php
$interfaceClass -> printHeader();
?>
</header>
<body>
        <?php
        if (isset($_GET['id_zbiorki'])){
            $id_zbiorki=$_GET['id_zbiorki'];
            // echo $id_zbiorki;
            $conn = $MainObiekt -> connector("localhost","root","","baza");
            $result = $conn -> query("SELECT * FROM zbiorki where id_zbiorki=$id_zbiorki");
            if($result->num_rows > 0){
                $data = $result -> fetch_assoc();
          //      $owner = $data['']; //do dopisania
                $nazwa = $data['nazwa'];
                $opis = $data['opis'];
                $img_src = $data['img_src'];
                $zebrana = $data['ZebranaKwota'];
                $wymagana = $data['WymaganaKwota'];
            }
                ?>
                    <div id="produkt">
                    <div><img src="images/<?php echo ($data['img_src']); ?>"></div>
                        <h1><?php echo ($data['nazwa']); ?></h1>
                        <p><?php echo ($data['opis']); ?></p>
                    </div>
                <?php
        }
        else{
            echo "oj nieeeeeeeeeeeeee";
        }
        ?>
</body>
</html>







<?php
$opo = "SELECT username
FROM zbiorki
left join uzytkownicy on zbiorki.user_id=uzytkownicy.user_id where id_zbiorki='$id_zbiorki'";
$result = $conn -> query($opo);
        $data = $result -> fetch_assoc();
        $resulta = $data['username'];
echo $resulta;



?>