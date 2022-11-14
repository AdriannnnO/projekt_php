<?php
// require"config.php";

// Class MainClass {
//     public $host = "localhost";
//     public $db_user = "root";
//     public $db_password = "";
//     public $db_name = "baza";

//     public function connection(){
//         $conn = new mysqli($host, $db_user, $db_password, $db_name);
//     }
// }

Class MainClass {
    public function connection(){
        $connection = new mysqli("localhost","root","","baza");
        return $connection;
    }
    public function przekierowanie(){
            header('Location: index.php');
            echo "hihi";
        }

    }
?>