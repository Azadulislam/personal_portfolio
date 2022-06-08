<?php
    include_once ('classes/Database.php');
    $db = new classes\Database;
    $dir = "uploades/img_file/";
    if(isset($_REQUEST['skille'])){
        $id = $_REQUEST['skille'];
        $del_skl = $db->con->query("DELETE FROM `skille` WHERE `id`='$id'");
        if($del_skl){
            $_SESSION['skille'] = "deleted";
            header('location:skille.php');
        }else{
            $_SESSION['skille'] = "del_err";
            header('location:skille.php');
        }
    }elseif(isset($_REQUEST['del_review'])){
        $id = $_REQUEST['del_review'];
        $img = $_REQUEST['img'];
        $del_rivw = $db->con->query("DELETE FROM `review` WHERE `id`='$id'");
        if($del_rivw){
            if(file_exists($dir.$img)){
                unlink($dir.$img);
            }
            $_SESSION['review'] = "deleted";
            header('location:works.php');
        }else{
            $_SESSION['review'] = "del_err";
            header('location:works.php');
        }
    }elseif(isset($_REQUEST['srv'])){
        $id = $_REQUEST['srv'];
        $img = $_REQUEST['img'];
        $del_rivw = $db->con->query("DELETE FROM `services` WHERE `id`='$id'");
        if($del_rivw){
            if(file_exists($dir.$img)){
                unlink($dir.$img);
            }
            $_SESSION['services'] = "deleted";
            header('location:services.php');
        }else{
            $_SESSION['services'] = "del_err";
            header('location:services.php');
        }
    }elseif(isset($_REQUEST['port'])){
        $id = $_REQUEST['port'];
        $img = $_REQUEST['Prt_img'];
        $del_prt = $db->con->query("DELETE FROM `portfolio` WHERE `id`='$id'");
        if($del_prt){
            if(file_exists($dir.$img)){
                unlink($dir.$img);
            }
            $_SESSION['del_port'] = "deleted";
            header('location:portfolio.php');
        }else{
            $_SESSION['del_port'] = "del_err";
            header('location:portfolio.php');
        }
    }elseif(isset($_REQUEST['del_cat'])){
        $id = $_REQUEST['del_cat'];
        $del_prt = $db->con->query("DELETE FROM `category` WHERE `id`='$id'");
        if($del_prt){
            $_SESSION['del_cat'] = "deleted";
            header('location:category.php');
        }else{
            $_SESSION['del_cat'] = "del_err";
            header('location:category.php');
        }
    }elseif(isset($_REQUEST['del_blg'])){
        $id = $_REQUEST['del_blg'];
        $img = $_REQUEST['img'];
        $del_prt = $db->con->query("DELETE FROM `blog` WHERE `id`='$id'");
        if($del_prt){
            if(file_exists($dir.$img)){
                unlink($dir.$img);
            }
            $_SESSION['del_blog'] = "deleted";
            header('location:view-blog.php');
        }else{
            $_SESSION['del_blog'] = "del_err";
            header('location:view-blog.php');
        }
    }elseif(isset($_REQUEST['del_gal'])){
        $id = $_REQUEST['del_gal'];
        $img = $_REQUEST['img'];
        $delete = $db->con->query("DELETE FROM `gallery` WHERE `id`='$id'");
        if($delete){
            if(file_exists($dir.$img)){
                unlink($dir.$img);
            }
            $_SESSION['del_gal'] = "deleted";
            header('location:view-gallery.php');
        }else{
            $_SESSION['del_gal'] = "del_err";
            header('location:view-gallery.php');
        }
    }

?>