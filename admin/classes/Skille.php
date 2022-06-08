<?php
    namespace classes;
    include_once ('Database.php');
    class Skille{
        public $success;
        public $err;
        public function insertSkille($data){
            $db = new Database();
            $skl_name = strtoupper($data['newSkill']);
            $skl_prcnt = $data['sklPrcnt'];
            $select_skl = "SELECT * FROM skille WHERE skl_name='$skl_name'";
            $check_skl = $db->select($select_skl);
            if($check_skl->num_rows > 0){
                $this->err = "Skille name is alredy Exist";
            }else{
                $ins_skl = "INSERT INTO `skille`(`skl_name`, `skl_prcnt`) VALUES ('$skl_name','$skl_prcnt')";
                if($db->insert($ins_skl)){
                    $this->success = "New skill inserted successfully!";
                }else{
                    $this->err = "Skille could not be inserted!".$db->error;
                }
            }
            
        }
        public function deleteSkille($data){
            $db = new Database();
            $skl_name = strtoupper($data['newSkill']);
            $skl_prcnt = $data['sklPrcnt'];
            $select_skl = "SELECT * FROM skille WHERE skl_name='$skl_name'";
            $check_skl = $db->select($select_skl);
            if($check_skl->num_rows > 0){
                $this->err = "Skille name is alredy Exist";
            }else{
                $ins_skl = "INSERT INTO `skille`(`skl_name`, `skl_prcnt`) VALUES ('$skl_name','$skl_prcnt')";
                if($db->insert($ins_skl)){
                    $this->success = "New skill inserted successfully!";
                }else{
                    $this->err = "Skille could not be inserted!".$db->error;
                }
            }
            
        }

    }
?>