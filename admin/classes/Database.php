<?php
    namespace classes;
    ob_start();
    include ('config.php');
    use mysqli;
    class Database
    {
        public $con;
        public $err;
        function __construct()
        {
            $this->dbcon();
        }
        private function dbcon(){
            $this->con = new mysqli(HOST,USER,PASS,DBN);
            if($this->con-> connect_errno){
                $this->err = "Failed to connect to Database: " . $this->con -> connect_error;
            }
        }
        
        public function select($query){
           $result = $this->con->query($query) ;
            return $result;
        }

        public function insert($query){
            $ins_row = $this->con->query($query) ;
            return $ins_row;
           
        }
        
        public function update($query){
            $update_row = $this->con->query($query);
            return $update_row;
            
        }

        public function checkExist($query){
            $sel_ch = $this->con->query($query);
            if($sel_ch->num_rows>0){
                return true;
            }else{
                return false;
            }
        }
    }
    

?>