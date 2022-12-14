<?php
require"klasa.php";
session_start();
$MainObiekt = new MainClass();
?>

<!DOCTYPE html>
<html lang="en">
<?php
$MainObiekt -> PrintHead("css/dodawanie.css")
?>
<body>
    <h1> <a href="lista.php"> Wróć </h1></a>
    <div class="center-item">
    <form action="dodaj.php" method="post" enctype="multipart/form-data">
    <input type="text" placeholder="nazwa zbiórki" name="nazwa" required>
    <input id="cel" type="number" placeholder="cel" name="cel" required>
    <input type="text" placeholder="opis" name="opis" requierd>
    <div id="drop-area">
      <p>Upload multiple files with the file dialog or by dragging and dropping images onto the dashed region</p>
      <input type="file" name="image" id="fileElem" accept="image/*" onchange="handleFiles(this.files)">
      <label class="button" for="fileElem">Select some files</label>
    <progress id="progress-bar" max=100 value=0></progress>
    <div id="gallery"></div>
  </div>

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

<script>
// ************************ Drag and drop ***************** //
let dropArea = document.getElementById("drop-area")

// Prevent default drag behaviors
;['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
  dropArea.addEventListener(eventName, preventDefaults, false)   
  document.body.addEventListener(eventName, preventDefaults, false)
})

// Highlight drop area when item is dragged over it
;['dragenter', 'dragover'].forEach(eventName => {
  dropArea.addEventListener(eventName, highlight, false)
})

;['dragleave', 'drop'].forEach(eventName => {
  dropArea.addEventListener(eventName, unhighlight, false)
})

// Handle dropped files
dropArea.addEventListener('drop', handleDrop, false)

function preventDefaults (e) {
  e.preventDefault()
  e.stopPropagation()
}

function highlight(e) {
  dropArea.classList.add('highlight')
}

function unhighlight(e) {
  dropArea.classList.remove('active')
}

function handleDrop(e) {
  var dt = e.dataTransfer
  var files = dt.files

  handleFiles(files)
}

let uploadProgress = []
let progressBar = document.getElementById('progress-bar')

function initializeProgress(numFiles) {
  progressBar.value = 0
  uploadProgress = []

  for(let i = numFiles; i > 0; i--) {
    uploadProgress.push(0)
  }
}

function updateProgress(fileNumber, percent) {
  uploadProgress[fileNumber] = percent
  let total = uploadProgress.reduce((tot, curr) => tot + curr, 0) / uploadProgress.length
  progressBar.value = total
}

function handleFiles(files) {
  files = [...files]
  initializeProgress(files.length)
  files.forEach(uploadFile)
  files.forEach(previewFile)
}

function previewFile(file) {
  let huj = document.getElementById('gallery')
  let length = huj.length;
  let reader = new FileReader()
  reader.readAsDataURL(file)
  reader.onloadend = function() {
    let img = document.createElement('img')
    img.src = reader.result
    if(huj<2)
        document.getElementById('gallery').appendChild(img)
        var huj = document.getElementById('gallery')
        var length = huj.length;
  }
}

function uploadFile(file, i) {
  var url = 'https://api.cloudinary.com/v1_1/joezimim007/image/upload'
  var xhr = new XMLHttpRequest()
  var formData = new FormData()
  xhr.open('POST', url, true)
  xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest')

  // Update progress (can be used to show progress indicator)
  xhr.upload.addEventListener("progress", function(e) {
    updateProgress(i, (e.loaded * 100.0 / e.total) || 100)
  })

  xhr.addEventListener('readystatechange', function(e) {
    if (xhr.readyState == 4 && xhr.status == 200) {
      updateProgress(i, 100) // <- Add this
    }
    else if (xhr.readyState == 4 && xhr.status != 200) {
      // Error. Inform the user
    }
  })

  formData.append('upload_preset', 'ujpu6gyk')
  formData.append('file', file)
  xhr.send(formData)
}
</script>