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
    public function printHead($css){
        echo "
        <head>
    <link rel='icon' type='image/x-icon' href='assets/favicon.ico'>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link rel='stylesheet' type='text/css' href='$css'>
    <link rel='stylesheet' type='text/css' href='css/progressbar.css'>

    <link href='https://fonts.googleapis.com/css?family=Gruppo' rel='stylesheet'>
    <title>POMAGAM E22</title>
</head>
        ";
    }
    public function connector($host,$db_user,$db_password,$db_name){
        $conn = new mysqli($host,$db_user,$db_password,$db_name);
        return $conn;
        
    }
    public function przekierowanie($redirect){
            header('Location: '. $redirect);
            echo "hihi";
    }
    public function walidacja($username,$useremail,$userpassword,$repeatPassword){
        if ($username != '' && $useremail != '' && $userpassword != '' && $repeatPassword==$userpassword && strlen($userpassword)>=8 && preg_match("/^[^A-Za-z]/", $username)==FALSE){
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
    public function stankonta($username){
        $conn = $this -> connector("localhost","root","","baza");
        $sql = "SELECT userMoney FROM uzytkownicy where username='$username'";
        $result = $conn ->query($sql);
        $data = $result -> fetch_assoc();
        $kasa = $data['userMoney'];
        return $kasa;

    }
    public function grupa($username){
        $conn = $this -> connector("localhost","root","","baza");
        $sql = "SELECT grupa_krwi FROM uzytkownicy where username='$username'";
        $result = $conn ->query($sql);
        $data = $result -> fetch_assoc();
        $grupa = $data['grupa_krwi'];
        return $grupa;

    }
    public function wplacpieniadze($username,$kwota){
        $connection = new mysqli($this->host,$this->db_user,$this->db_password,$this->db_name);
        $sql = "UPDATE uzytkownicy SET userMoney = userMoney+$kwota WHERE username='$username'";
        $result = $connection ->query($sql);
    }
    public function ustaw_grupe_krwi($username,$grupa){
        $connection = new mysqli($this->host,$this->db_user,$this->db_password,$this->db_name);
        $sql = "UPDATE uzytkownicy SET grupa_krwi = '$grupa' WHERE username='$username'";
        $result = $connection ->query($sql);
    }

// $connection -> close();
}






?>