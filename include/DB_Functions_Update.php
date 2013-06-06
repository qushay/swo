<?php

class DB_Functions {

    private $db;

    function __construct() {
        require_once '../include/DB_Connect.php';
        // connect ke database
        $this->db = new DB_Connect();
        $this->db->connect();
    }

    // destructor
    function __destruct() {
        
    }

    public function deleteLinePelanggan($id_line_pelanggan,$updateby) {
        $result = mysql_query("UPDATE line_pelanggan SET isactive='0' WHERE id_line_pelanggan='$id_line_pelanggan'");
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    
}

?>
