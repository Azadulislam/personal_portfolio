<?php
    namespace classes;
    include_once ('Database.php');
    class Category{
        public $success;
        public $err;
        public function insertCategory($data){
            $db = new Database;
            $cat_name = $data['cat_name'];
            $cat_type = $data['cat_type'];
            $check_cat = $db->checkExist("SELECT `name` FROM `category` WHERE `name`='$cat_name'");
            if(empty($cat_name)){
                $this->err = "Name is required <br>";
            }elseif(empty($cat_type)){
                $this->err = "Type filde is required <br>";
            }elseif($check_cat == true){
                $this->err = "Name alredy exist <br>";
            }else{
                $ins_query = "INSERT INTO `category`(`name`, `type`) VALUES ('$cat_name','$cat_type')";
                $ins_cat= $db->insert($ins_query);
                if($ins_cat){
                    $this->success = "Category Saved successfully <br/>";
                }else{
                    $this->err = "Data could not be inserded!";
                }
            }
        }
    }
?>