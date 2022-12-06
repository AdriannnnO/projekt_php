<!DOCTYPE html>
<html lang="en">
<?php
session_start();
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
    <div id="rozmiar-list">
    </div>
</body>
<footer>
    <?php
    $interfaceClass -> printFooter();
    ?>
</footer>
</html>



<?php


$MainObiekt = new MainClass();
$conn = $MainObiekt -> connector("localhost","root","","baza");
$result = $conn->query("SELECT * FROM zbiorki"); 

?>
<?php if($result->num_rows > 0){ ?> 
    <div id="gallery"> 
        <?php while($row = $result->fetch_assoc()){ ?> 
            <div id="zbiorka">
            <img src="images/<?php echo ($row['img_src']); ?>" alt="Girl in a jacket" width="120" height="100">
            <p><?php echo ($row['opis']); ?></p>
            </div id="zbiorka">
        <?php } ?> 
    </div> 
<?php }else{ ?> 
    <p class="status error">Image(s) not found...</p> 
<?php } ?>
