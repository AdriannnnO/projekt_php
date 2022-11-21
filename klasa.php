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
    public function przekierowanie($redirect){
            header('Location: '. $redirect);
            echo "hihi";
    }
    public function walidacja($username,$useremail,$userpassword,$repeatPassword){
        if ($username != '' & $useremail != '' & $userpassword != '' & $repeatPassword==$userpassword & strlen($userpassword)>=8){
            return TRUE;
            
        }
        else{
            if ($repeatPassword!=$userpassword or strlen($userpassword)<8 & is_numeric($userpassword[0])==TRUE){
                return FALSE;
              }
              elseif ($repeatPassword!=$userpassword or strlen($userpassword)<8){
            
                return FALSE;
              }
              elseif (is_numeric($username[0])==TRUE){
            
                return FALSE;
            }
            echo "jd";
        }

    }
    public function rejestracja($username,$useremail,$userpassword,$repeatPassword){
        $connection = new mysqli($this->host,$this->db_user,$this->db_password,$this->db_name);
        $sql = "SELECT * FROM uzytkownicy WHERE username='$username'AND userEmail='$useremail' AND userPassword='$userpassword'";
        $result = $connection -> query($sql);
        if ($result -> num_rows == 1){
            echo "uzytkownik juz istnieje!";
        } else {
            $sql = "INSERT INTO uzytkownicy (username, useremail, userpassword) values ('".$username."','".$useremail."','".$userpassword."')";
            $result = $connection -> query($sql);
            echo "rej dokonczony";
        }
    }
    public function jd($jd){
        echo jd;
    }


// $connection -> close();
}

?>