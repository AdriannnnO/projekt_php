<?php
require_once "klasa.php";
class InterFaceClass extends MainClass{
    public function interfaceFunction(){
        echo "funckja w Interface";
    }
    public function printHeader(){
        if (isset($_SESSION["loggedin"])) {
            echo "<div id='top'>
        <div id='leftop'>
        <a href='index.php'><h1>POMAGAM E22</h1></a>
        </div>
    <div>
    <ul>
        <li><a href='s2.php'>Profil</a></li>
        <li><a href='logout.php'>LogOut</a></li>
        <li><a href='lista.php'>lista</a></li>
        <li><a href='dodaj.php'>dodaj zbiórke</a></li>
    </ul>
    </div>";
        }
        else{
            echo "<div id='top'>
            <div id='leftop'>
            <a href='index.php'><h1>POMAGAM E22</h1></a>
        </div>
    <div>
    <ul>
    <li><a href='rejestracja.php'>Rejestracja</a></li>
    <li><a href='logowanie.php'>Logowanie</a></li>
    <li><a href='lista.php'>lista</a></li>
    <li><a href='onas.php'>addtext</a></li>
    </ul>

    </div>";
        }

    }
    public function printFooter(){
        echo "<div id='footer_content'>siema eniu</div>
    <div id='footer_content'>siema eniu</div>
    <div id='footer_content'>siema eniu</div>";
    }
    public function printHej(){
        if (isset($_SESSION["loggedin"])) {
            echo "<body>
            <div id='siemano'>
            <h3 id='hej'>Hej! $_SESSION[username]<h3>
            <p>Cieszymy sie że cie tu mamy! poniżej znajdziesz listę dostępnych zbiórek.</p>
        </div>";
        }
        else{
            echo "<body>
            <div id='siemano'>
            <p>Poniżej znajduję się lista zbiórek.</p>
        </div>";

    }
}
}
?>