<?php
    include_once('config.php');

    Class info extends DbConnection {
        public function __construct(){

            parent::__construct();
            
        }

        public function insert($infoID, $fullname, $flrnum, $province, $municipality, $barangay, $mobilenum){

            
            $sql = "INSERT INTO user_info (infoID, fullname, flrnum, province, municipality, barangay, mobilenum) VALUES('$infoID', '$fullname', '$flrnum', '$province', '$municipality', '$barangay', '$mobilenum')";
            $query = $this->connection->query($sql);
            return $query;
            
        }

        public function escape_string($value){
        
            return $this->connection->real_escape_string($value);
        }

    }
?>