<?php
    namespace classes;
    include_once ('Database.php');
    class Profile{
        public $success;
        public $err;
        public $user;
        public $dir = "uploades/img_file/";
        public function updateProfle($data){
            $db = new Database;
            if(isset($_SESSION['user'])){
                $user = $_SESSION['user'];
            }
            $id= $data['id'];
            $wb_nm= htmlentities($data['wb_nm']);
            $fname= htmlentities($data['fname']);
            $lname= htmlentities($data['lname']);
            $title= htmlentities($data['title']);
            $pos= htmlentities($data['pos']);
            $email= $data['email'];
            $address= htmlentities($data['address']);
            $interest= htmlentities($data['interest']);
            $website= $data['website'];
            $linkedin= $data['linkedin'];
            $youtube = $data['youtube'];
            $behance= $data['behance'];
            $resume= $data['resume'];
            $bDate= $data['bDate'];
            $phnNum= $data['phnNum'];
            $skype= $data['skype'];
            $facebook= $data['facebook'];
            $twitter= $data['twitter'];
            $valid_ext = array('png','jpg','jpeg');
            $old_file = $data['old_img'];
            $pro_img = $_FILES['pro_img'];
            $img_name = $pro_img['name'];
            $uniq_name = $old_file;
            if(!empty($img_name)){
                $img_tmp = $pro_img['tmp_name'];
                $img_ext = strtolower(pathinfo($img_name,PATHINFO_EXTENSION));
                if(!in_array($img_ext,$valid_ext)){
                    $this->err = "File coude not be updated.File must be in (.".implode(', .',$valid_ext).") file <br>";
                    return $this->err;
                }else{
                    $uniq_name = "profile-".date('ymdhis').".".$img_ext;
                    move_uploaded_file($img_tmp,$this->dir.$uniq_name);
                    if(file_exists($this->dir.$old_file)){
                        unlink($this->dir.$old_file);
                    }
                }
            }
            $update = $db->update("UPDATE `administrator` SET `fname`='$fname',`lname`='$lname',`title`='$title',`position`='$pos',`email`='$email',`address`='$address',`profile_img`='$uniq_name',`phn`='$phnNum',`interest`='$interest',`birthday`='$bDate',`website`='$website',`web_name`='$wb_nm',`linkedin`='$linkedin',`facebook`='$facebook',`youtube`='$youtube',`behance`='$behance',`resume`='$resume',`skype`='$skype',`twitter`='$twitter' WHERE `id`='$id'");
            if($update){
                $this->success = "Profile updated successfully <br/>";
            }else{
                $this->err = "Profile could not be updated".$db->con->error;
            }
            return $this->success;
            return $this->err;
            
        }
        public function updateAbout($data){
            $db = new Database;
            $id= $data['id'];
            $shrt_dsc= htmlentities($data['shrt_dsc']);
            $lng_dsc= $data['lng_dsc'];
            $update = $db->update("UPDATE `administrator` SET `shrt_desc`='$shrt_dsc',`long_desc`='$lng_dsc' WHERE `id`='$id'");
            if($update){
                $this->success = "About updated successfully <br/>";
            }else{
                $this->err = "About could not be updated".$db->con->error;
            }
            return $this->success;
            return $this->err;
            
        }
    }
?>