<?php
    namespace classes;
    include_once ('Database.php');
    class Blog{
        public $success;
        public $err;
        public $user;
        public $dir = "uploades/img_file/";
        
        public function insertBlog($data){
            if(isset($_SESSION['user'])){
                $this->user = $_SESSION['user'];
            }
            $db = new Database;
            $valid_ext = array('png','jpg','jpeg','gif');
            $title = htmlentities(trim($data['blog_title']));
            $slg = str_replace(' ','-',strtolower($title));
            $blog_desc = $data['blog_desc'];
            $cat = $data['category'];
            $chek_ttl = $db->checkExist("SELECT `title` FROM `blog` WHERE `title`='$title'");
            $srv_img = $_FILES['blog_image'];
            $img_name = $srv_img['name'];
            $img_tmp = $srv_img['tmp_name'];
            $img_ext = strtolower(pathinfo($img_name,PATHINFO_EXTENSION));
            if(empty($title)){
                $this->err = "Title filed is required <br>";
            }elseif($chek_ttl == true){
                $this->err = "Blog title is alredy exist<br>";
            }elseif(empty($blog_desc)){
                $this->err = "Description filed is required <br>";
            }elseif(empty($img_name)){
                $this->err = "Image filed is required!<br>";
            }elseif(!in_array($img_ext,$valid_ext)){
                $this->err = "File must be in (.".implode(', .',$valid_ext).") file";
            }else{
                $uniq_name = "blog-".date('ymdhis').".".$img_ext;
                move_uploaded_file($img_tmp,$this->dir.$uniq_name);
                $ins_blog = $db->insert("INSERT INTO `blog`(`title`,`slg`, `image`,`category`, `blg_dsc`, `user`) VALUES ('$title','$slg','$uniq_name','$cat','$blog_desc','$this->user')");
                if($ins_blog){
                    $this->success = "Blog post inserted successfully <br/>";
                }else{
                    $this->err = "Blog data could not be inserted".$db->con->error;
                }
            }
            return $this->success;
            return $this->err;
            
        }

        public function updateBlog($data){
            if(isset($_SESSION['user'])){
                $this->user = $_SESSION['user'];
            }
            $db = new Database;
            $id= $data['id'];
            $valid_ext = array('png','jpg','jpeg','gif');
            $title = htmlentities(trim($data['blog_title']));
            $slg = str_replace(' ','-',strtolower($title));
            $blog_desc = $data['blog_desc'];
            $cat = $data['category'];
            $old_file = $data['old_blog_image'];
            $srv_img = $_FILES['blog_image'];
            $img_name = $srv_img['name'];
            $uniq_name = $old_file;
            if(empty($title)){
                $this->err = "Title filed is required <br>";
            }elseif(empty($blog_desc)){
                $this->err = "Description filed is required <br>";
            }else{
                if(!empty($img_name)){
                    $img_tmp = $srv_img['tmp_name'];
                    $img_ext = strtolower(pathinfo($img_name,PATHINFO_EXTENSION));
                    if(!in_array($img_ext,$valid_ext)){
                        $this->err = "File coude not be updated.File must be in (.".implode(', .',$valid_ext).") file <br>";
                        return $this->err;
                    }else{
                        $uniq_name = "blog-".date('ymdhis').".".$img_ext;
                        move_uploaded_file($img_tmp,$this->dir.$uniq_name);
                        if(file_exists($this->dir.$old_file)){
                            unlink($this->dir.$old_file);
                        }
                    }
                }
                $up_blog = $db->update("UPDATE `blog` SET `title`='$title',`slg`='$slg',`image`='$uniq_name',`category`='$cat',`blg_dsc`='$blog_desc',`user`='$this->user' WHERE `id`='$id'");
                if($up_blog){
                    $this->success = "Blog post updated successfully <br/>";
                }else{
                    $this->err = "Blog data could not be updated".$db->con->error;
                }
            }
            return $this->success;
            return $this->err;
            
        }
    }
?>