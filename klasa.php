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
    public $username;
    public $useremail;
    public $userpassword;
    public function __construct($host,$db_user,$db_password,$db_name,$username,$useremail,$userpassword){
        $this -> host=$host;
        $this -> db_user=$db_user;
        $this -> db_password=$db_password;
        $this -> db_name=$db_name;
        $this -> username=$username;
        $this -> useremail=$useremail;
        $this -> userpassword=$userpassword;
}
    public function connection(){
        $connection = new mysqli($this->host,$this->db_user,$this->db_password,$this->db_name);
        return $connection;
    }
    public function przekierowanie($redirect){
            header('Location: '. $redirect);
            echo "hihi";
    }
    public function walidacja($repeatPassword){
        if ($this->username != '' & $this->useremail != '' & $this->userpassword != '' & $repeatPassword==$this->userpassword){
            return TRUE;
        }
        else{
            return FALSE;
        }

    }
    public function rejestracja(){
        $connection = new mysqli($this->host,$this->db_user,$this->db_password,$this->db_name);
        $sql = "SELECT * FROM uzytkownicy WHERE username='$this->username'AND userEmail='$this->useremail' AND userPassword='$this->userpassword'";
        $result = $connection -> query($sql);
        if ($result -> num_rows == 1){
            echo "uzytkownik juz istnieje!";
        } else {
            $sql = "INSERT INTO uzytkownicy (username, useremail, userpassword) values ('".$this->username."','".$this->useremail."','".$this->userpassword."')";
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