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
<?php
$interfaceClass -> printHej();
?>
</div>
<?php


$MainObiekt = new MainClass();
$conn = $MainObiekt -> connector("localhost","root","","baza");
$result = $conn->query("SELECT * FROM zbiorki"); 

?>
<?php if($result->num_rows > 0){ ?> 
    <div id="gallery"> 
        <?php while($row = $result->fetch_assoc()){ ?> 
            <div id="zbiorka">
            <p><?php echo ($row['nazwa']); ?></p>
            <img src="images/<?php echo ($row['img_src']); ?>" alt="Girl in a jacket" width="120" height="100">
            </div>
        <?php } ?> 
    </div> 
<?php }else{ ?> 
    <p class="status error">Image(s) not found...</p> 
<?php } ?>
</body>
<footer>
    <?php
    $interfaceClass -> printFooter();
    ?>
</footer>
</html>



