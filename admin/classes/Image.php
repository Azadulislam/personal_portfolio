<?php
    namespace classes;
    include_once ('Database.php');

class Image{
    public $err;
    public $success;
    public function updateHomeBg($data)
    {
        $dir = "uploades/img_file/";
        $db = new Database;
        $ext_vlid = array('jpg','png','jpeg','gif');
        $bg_img = $_FILES['homebg'];
        $img_name = $bg_img['name'];
        list($height, $width) = getimagesize($dir.$img_name);
        echo $height;
        exit();
        $img_tmp = $bg_img['tmp_name'];
        $file_ext = strtolower(pathinfo($img_name,PATHINFO_EXTENSION));
        // Validate file type
        if(empty($img_name)){
            $this->err = "Background filde is requeired!<br/>";
        }elseif(!in_array($file_ext,$ext_vlid)){
            $this->err = "You must have to include .".implode("/ .",$ext_vlid)." file! as backgroun image.<br>";
        }else{
            $old_file = $data['oldbg'];
            if(file_exists($dir.$old_file)){
                unlink($dir.$old_file);
            }
            $uniq_name = "home-bg-".date('Ymdhis').'.'.$file_ext;
            $up_data = "UPDATE images SET home_bg='$uniq_name' WHERE id='1'";
            $upMess = $db->update($up_data);
            if($upMess){
                $file_movee_dir = move_uploaded_file($img_tmp,$dir.$uniq_name);
                if($file_movee_dir){
                    $this->success = "Background updated successfully.<br>";
                }else{
                    $this->err = "Background file coulde not moved <strong>Contact Administatore.<strong>";
                }
            }else{
                $this->err.= "Background coulde not be updated.";
            }
        }
    }

    public function updateLogo($data)
    {
        $db = new Database;
        $ext_vlid = array('jpg','png');
        $bg_img = $_FILES['logo'];
        $img_name = $bg_img['name'];
        $img_tmp = $bg_img['tmp_name'];
        $dir = "uploades/img_file/";
        $file_ext = strtolower(pathinfo($img_name,PATHINFO_EXTENSION));
        // Validate file type
        if(empty($img_name)){
            $this->err = "Logo filde is requeired!<br/>";
        }elseif(!in_array($file_ext,$ext_vlid)){
            $this->err = "You must have to include .".implode("/ .",$ext_vlid)." file! as logo.<br>";
        }else{
            $old_file = $data['oldlogo'];
            if(file_exists($dir.$old_file)){
                unlink($dir.$old_file);
            }
            $uniq_name = "logo-".date('Ymdhis').'.'.$file_ext;
            $up_data = "UPDATE images SET logo_img='$uniq_name' WHERE id='1'";
            $upMess = $db->update($up_data);
            if($upMess){
                $file_movee_dir = move_uploaded_file($img_tmp,$dir.$uniq_name);
                if($file_movee_dir){
                    $this->success = "Logo updated successfully<br>";
                }else{
                    $this->err = "Logo file coulde not moved <strong>Contact Administatore<strong>";
                }
            }else{
                $this->err.= "Logo coulde not be updated.";
            }
        }
    }
    
    
    public function updateIcon($data)
    {
        $db = new Database;
        $ext_vlid = array('ico','png');
        $bg_img = $_FILES['icon'];
        $img_name = $bg_img['name'];
        $img_tmp = $bg_img['tmp_name'];
        $dir = "uploades/img_file/";
        $file_ext = strtolower(pathinfo($img_name,PATHINFO_EXTENSION));
        // Validate file type
        if(empty($img_name)){
            $this->err = "Icon filde is requeired!<br/>";
        }elseif(!in_array($file_ext,$ext_vlid)){
            $this->err = "You must have to include .".implode("/ .",$ext_vlid)." file! as Icon.<br>";
        }else{
            $old_file = $data['oldicon'];
            if(file_exists($dir.$old_file)){
                unlink($dir.$old_file);
            }
            $uniq_name = "icon-".date('Ymdhis').'.'.$file_ext;
            $up_data = "UPDATE images SET fav_icon='$uniq_name' WHERE id='1'";
            $upMess = $db->update($up_data);
            if($upMess){
                $file_movee_dir = move_uploaded_file($img_tmp,$dir.$uniq_name);
                if($file_movee_dir){
                    $this->success = "Icon updated successfully<br>";
                }else{
                    $this->err = "Icon file coulde not moved <strong>Contact Administatore<strong>";
                }
            }else{
                $this->err.= "Icon coulde not be updated.";
            }
        }
    }
}
    
    
?>