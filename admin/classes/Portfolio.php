<?php
    namespace classes;
    include_once ('Database.php');
    class Portfolio{
        public $success;
        public $err;
        public function insertPortfolio($data){
            $db = new Database;
            $dir = "uploades/img_file/";
            $valid_ext = array('png','jpg','jpeg');
            $title = htmlentities($data['title']);
            $desc = htmlentities($data['port_desc']);
            $srv_img = $_FILES['port_img'];
            $img_name = $srv_img['name'];
            $img_tmp = $srv_img['tmp_name'];
            $img_ext = strtolower(pathinfo($img_name,PATHINFO_EXTENSION));
            if(empty($title)){
                $this->err = "Title is required <br>";
            }elseif(empty($desc)){
                $this->err = "Description filed is required <br>";
            }elseif(empty($img_name)){
                $this->err = "Image filed is required!<br>";
            }elseif(!in_array($img_ext,$valid_ext)){
                $this->err = "File must be in (.".implode(', .',$valid_ext).") file";
            }else{
                $uniq_name = "portfolio-".date('ymdhis').".".$img_ext;
                move_uploaded_file($img_tmp,$dir.$uniq_name);
                $ins_port = "INSERT INTO `portfolio`(`title`, `port_desc`, `port_img`) VALUES ('$title','$desc','$uniq_name')";
                $ins_portfolio = $db->insert($ins_port);
                if($ins_portfolio){
                    $this->success = "Portfilo inserted successfully <br/>";
                   
                }else{
                    $this->err = "Data could not be inserted <b>Contact with administator</b>";
                }
            }
            return $this->success;
            return $this->err;
            
        }
    }
?>