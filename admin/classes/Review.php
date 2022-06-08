<?php
    namespace classes;
    include_once ('Database.php');
    class Review{
        public $success;
        public $err;
        public function insertReview($data){
            $db = new Database;
            $dir = "uploades/img_file/";
            $valid_ext = array('jpg','png','jpeg');
            $name = htmlentities($data['clnt_name']);
            $cmnt = htmlentities($data['clnt_cmmnt']);
            $cntry = htmlentities($data['clnt_cntry']);
            $rting = $data['ratings'];
            $pro_img = $_FILES['clnt_prof'];
            $img_name = $pro_img['name'];
            $img_tmp = $pro_img['tmp_name'];
            $img_ext = strtolower(pathinfo($img_name,PATHINFO_EXTENSION));
            if(empty($name)){
                $this->err = "Name is required <br>";
            }elseif(empty($cmnt)){
                $this->err = "Comment filed is required <br>";
            }elseif(empty($cntry)){
                $this->err = "Country is required <br>";
            }elseif(empty($img_name)){
                $this->err = "Image filed is required!<br>";
            }elseif(empty($rting)){
                $this->err = "Ratings is required!<br>";
            }elseif(!in_array($img_ext,$valid_ext)){
                $this->err = "File must be in (.".implode(', .',$valid_ext).") file";
            }else{
                $uniq_name = "client-profile-".date('ymdhis').".".$img_ext;
                move_uploaded_file($img_tmp,$dir.$uniq_name);
                $ins_rvw = "INSERT INTO `review`(`clnt_name`, `clnt_cmnt`, `clnt_cntry`, `clnt_rting`, `clnt_img`) VALUES ('$name','$cmnt','$cntry','$rting','$uniq_name')";
                $ins_review = $db->insert($ins_rvw);
                if($ins_review){
                    $this->success = "Review inserted successfully <br/>";
                }else{
                    $this->err = "Data could not be inserted";
                }
            }
        }
        public function updateResume($data){
            $db = new Database;
            $id = $data['id'];
            $clnt = $data['clnt'];
            $project = $data['project'];
            $review = $data['review'];
            $r_project = $data['r_project'];
            if(empty($clnt)){
                $this->err = "Customer filde is required <br>";
            }elseif(empty($project)){
                $this->err = "Porject filde is required <br>";
            }elseif(empty($review)){
                $this->err = "Review filde is required <br>";
            }elseif(empty($r_project)){
                $this->err = "Image filed is required!<br>";
            }else{
                $ins_rvw = "UPDATE `resume` SET `clnt`='$clnt',`project`='$project',`review`='$review',`runing_pro`='$r_project' WHERE `id`='$id'";
                $ins_review = $db->update($ins_rvw);
                if($ins_review){
                    $this->success = "Rsume updated successfully <br/>";
                }else{
                    $this->err = "Data could not be updated!";
                }
            }
        }
    }
?>