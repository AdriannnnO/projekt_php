<?php
require_once "klasa.php";
class InterFaceClass extends MainClass{
    public function interfaceFunction(){
        echo "funckja w Interface";
    }
    public function printHeader(){
        if (isset($_SESSION["loggedin"])) {
            echo "<div id='stronga_główna'>
        <h1>POMAGAM E22</h1>
        <h2>$_SESSION[username]</h2>;
    </div>
    <div id='navbar'>
        <h3 id='navbarContent'><a href='s2.php'>Profil</h3></a>
        <h3 id='navbarContent'> <a href='logout.php'>LogOut</h3></a>
        <h3 id='navbarContent'> <a href='lista.php'>lista</h3></a>
        <h3 id='navbarContent'> <a href='dodaj.php'>dodaj zbiórke</h3></a>
    </div>";
        }
        else{
            echo "<div id='stronga_główna'>
        <h1>POMAGAM E22</h1>
    </div>
    <div id='navbar'>
        <h3 id='navbarContent'><a href='rejestracja.php'>Rejestracja</h3></a>
        <h3 id='navbarContent'><a href='ranking.php'>Ranking</h3></a>
        <h3 id='navbarContent'> <a href='lista.php'>lista</h3></a>
        <h3 id='navbarContent'> <a href='logowanie.php'>Logowanie</h3></a>
    </div>";
        }

    }
    public function printFooter(){
        echo "<div id='footer_content'>siema eniu</div>
    <div id='footer_content'>siema eniu</div>
    <div id='footer_content'>siema eniu</div>";
    }
}
?>