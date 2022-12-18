<?php
require"klasa.php";
session_start();
$MainObiekt = new MainClass();
?>

<!DOCTYPE html>
<html lang="en">
<?php
$MainObiekt -> PrintHead("css/style.css")
?>
<body>
    <h1> <a href="lista.php"> <- Wróć </h1></a>
    <h1 id="rej">dodaj</h1>
    <div class="center-item">
    <form action="dodaj.php" method="post" enctype="multipart/form-data">
    <input type="text" placeholder="nazwa zbiórki" name="nazwa" required>
    <input type="number" placeholder="cel" name="cel" required>
    <input type="text" placeholder="opis" name="opis" requierd>
    <input type="file" name="image" accept="image/*" requierd/>


    <button type="submit" name="ok">Dodaj zbiórke</button>
    
  </div>
</form>
</body>
</html>



<?php
if (isset($_POST["nazwa"]) & isset($_POST["cel"]) & isset($_POST["opis"])){
    $cel = $_POST["cel"];
    $opis = $_POST['opis'];
    $nazwa = $_POST['nazwa'];
    $image_file = $_FILES["image"];
    $conn = $MainObiekt -> connector("localhost","root","","baza");
    $user_id = idusera($_SESSION['username'], $conn);

    if (!file_exists($_FILES['image']['tmp_name']) || !is_uploaded_file($_FILES['image']['tmp_name']) || filesize($image_file["tmp_name"]) <= 0 || !exif_imagetype($image_file["tmp_name"])) {
        //     alert('NIEPOPRAWNY ROZMIAR PLIKU/BRAK PLIKU');){
            $sql = "INSERT INTO zbiorki (WymaganaKwota, user_id, opis, nazwa) values ('".$cel."','".$user_id."','".$opis."','".$nazwa."')";
            $conn -> query($sql);
            $_SESSION['dodano'] = true;
            $MainObiekt -> przekierowanie("podod.php");
    }
    else{
        $image_type = exif_imagetype($image_file["tmp_name"]);
        $image_extension = image_type_to_extension($image_type, true);
        $image_name = bin2hex(random_bytes(16)) . $image_extension;
        move_uploaded_file(
            $image_file["tmp_name"],
            __DIR__ . "/images/" . $image_name
        );
        $sql = "INSERT INTO zbiorki (WymaganaKwota, user_id, opis, img_src, nazwa) values ('".$cel."','".$user_id."','".$opis."','".$image_name."','".$nazwa."')";
        $conn -> query($sql);
        $_SESSION['dodano'] = true;
        $MainObiekt -> przekierowanie("podod.php");
    }
    
 }




function idusera($username, $conn){
    $sql = "SELECT user_id FROM uzytkownicy where username='$username'";
    $result = $conn ->query($sql);
    $data = $result -> fetch_assoc();
    $user_id = $data['user_id'];
    return $user_id;
}
?>