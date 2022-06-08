<?php
    namespace classes;
    include_once ('Database.php');
    class Gallery{
        public $success;
        public $err;
        public $dir = "uploades/img_file/";
        public function inserGalleryImg($data){
            $db = new Database;
            $gallStatus = $data['gallStatus'];
            $valid_ext = array('png','jpg','jpeg','pdf');
            $srv_img = $_FILES['gall_img'];
            $img_name = $srv_img['name'];
            
            $img_tmp = $srv_img['tmp_name'];
            $img_ext = strtolower(pathinfo($img_name,PATHINFO_EXTENSION));
            if(empty($img_name)){
                $this->err = "Image filed is required!<br>";
            }elseif(!in_array($img_ext,$valid_ext)){
                $this->err = "File must be in (.".implode(', .',$valid_ext).") file";
            }else{
                $uniq_name = "gallery-".date('ymdhis').".".$img_ext;
                $ex = explode('.',$uniq_name);
                $val = array_values($ex);
                $img_nm = array_shift($val);
                move_uploaded_file($img_tmp,$this->dir.$uniq_name);
                $ins_gal = $db->insert("INSERT INTO `gallery`(`gal_img`,`name`, `status`) VALUES ('$uniq_name','$img_nm','$gallStatus')");
                if($ins_gal){
                    $this->success = "Gallery item saved successfully <br/>";
                   
                }else{
                    $this->err = "Data could not be inserted";
                }
            }
            return $this->success;
            return $this->err;
            
        }


        public function updateGalleryImg($data){
            $db = new Database;
            $gallStatus = $data['gallStatus'];
            $valid_ext = array('png','jpg','jpeg','pdf');
            $gal_img = $_FILES['gall_img'];
            $img_name = $gal_img['name'];
            $img_nm = $data['img_nm'];
            $old_file = $data['old_gall_img'];
            $id = $data['id'];
            $uniq_name = $old_file;
            if(!empty($img_name)){
                $img_tmp = $gal_img['tmp_name'];
                $img_ext = strtolower(pathinfo($img_name,PATHINFO_EXTENSION));
                if(!in_array($img_ext,$valid_ext)){
                    $this->err = "File must be in (.".implode(', .',$valid_ext).") file";
                    return $this->err;
                }else{
                    $uniq_name = "gallery-".date('ymdhis').".".$img_ext;
                    $ex = explode('.',$uniq_name);
                    $val = array_values($ex);
                    $img_nm = array_shift($val);
                    move_uploaded_file($img_tmp,$this->dir.$uniq_name);
                    if(file_exists($this->dir.$old_file)){
                        unlink($this->dir.$old_file);
                    }
                }
                
            }
            $up_gal = $db->update("UPDATE `gallery` SET `gal_img`='$uniq_name',`name`='$img_nm',`status`='$gallStatus' WHERE `id`='$id'");
            if($up_gal){
                $this->success = "Gallery item updated successfully <br/>";
                
            }else{
                $this->err = "Data could not be updated";
            }
            
            return $this->success;
            return $this->err;
            
        }
    }
?>