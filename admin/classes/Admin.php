<?php
    namespace classes;
    include_once ("Database.php");
    class Admin{
        public $success;
        public $err;
        public $insert;
        public function addAdmin($data){
            $db = new Database();
            $usr = htmlentities(trim($data['usr_name']));
            $scr_pin = $data['scr_pin'];
            $pin = $data['pin'];
            $cek_usr = $db->checkExist("SELECT `usr_name` FROM `admin` WHERE `usr_name`='$usr'");
            if(empty($usr) || empty($scr_pin) || empty($pin)){
                $this->err = "User name, secure pin & pin required";
                return $this->err;
            }elseif($scr_pin != $pin){
                $this->err = "Pin did not matched";
                return $this->err;
            }elseif($cek_usr == true){
                $this->err = "User name alredy exist";
                return $this->err;
            }else{
                $pin_en = md5(sha1($pin));
                $this->insert = $db->insert("INSERT INTO `admin`( `usr_name`, `pass`,`status`) VALUES ('$usr','$pin_en','0')");
                if($this->insert){
                    return $this->insert;
                }else{
                    $this->err = "Sorry! register unsuccess try again";
                }
            }
        }
        public function login($data){
            $db = new Database();
            $pin = md5(sha1($data['pin']));
            $check = $db->checkExist("SELECT `pass` FROM `admin` WHERE `pass`='$pin'");
            if($check == true){
                $select = $db->select("SELECT * FROM `admin` WHERE `pass`='$pin'");
                $admin = $select->fetch_assoc();
                if($admin['status']=='1'){
                    $_SESSION['user'] = $admin['usr_name'];
                    return true;
                }else{
                    $this->err = "Your account is not activet!(Contact with addministrator)";
                }
            }else{
                $this->err = "Sorry pin is incorrect";
            }
        }
    }
?>