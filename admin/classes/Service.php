<?php
    namespace classes;
    include_once ('Database.php');
    class Services{
        public $success;
        public $err;
        public function insertServices($data){
            $db = new Database;
            $dir = "uploades/img_file/";
            $valid_ext = array('png');
            $name = htmlentities($data['srv_name']);
            $chek_name = $db->select("SELECT `name` FROM `services` WHERE `name`='$name'");
            $desc = htmlentities($data['srv_desc']);
            $srv_img = $_FILES['srv_img'];
            $img_name = $srv_img['name'];
            $img_tmp = $srv_img['tmp_name'];
            $img_ext = strtolower(pathinfo($img_name,PATHINFO_EXTENSION));
            $this->success =$img_ext;
            if(empty($name)){
                $this->err = "Name is required <br>";
            }elseif($chek_name->num_rows>0){
                $this->err = "Name is alredy exist<br>";
            }elseif(empty($desc)){
                $this->err = "Description filed is required <br>";
            }elseif(empty($img_name)){
                $this->err = "Image filed is required!<br>";
            }elseif(!in_array($img_ext,$valid_ext)){
                $this->err = "File must be in (.".implode(', .',$valid_ext).") file";
            }else{
                $uniq_name = "service-".date('ymdhis').".".$img_ext;
                move_uploaded_file($img_tmp,$dir.$uniq_name);
                $ins_srv = "INSERT INTO `services`(`name`, `srv_desc`, `image`) VALUES ('$name','$desc','$uniq_name')";
                $ins_service = $db->insert($ins_srv);
                if($ins_service){
                    $this->success = "Service inserted successfully <br/>";
                   
                }else{
                    $this->err = "Data could not be inserted";
                }
            }
            return $this->success;
            return $this->err;
            
        }
    }
?>