<?php
require"config.php";

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
    public $host;
    public $db_user;
    public $db_password;
    public $db_name;
    public function __construct($host,$db_user,$db_password,$db_name){
        $this -> host=$host;
        $this -> db_user=$db_user;
        $this -> db_password=$db_password;
        $this -> db_name=$db_name;
}
    public function connection(){
        $connection = new mysqli($this->host,$this->db_user,$this->db_password,$this->db_name);
        return $connection;
    }
    public function przekierowanie(){
            header('Location: index.php');
            echo "hihi";
        }

    }
?>