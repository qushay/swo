<?php

class DB_Functions_Read {

    private $db;

    function __construct() {
        require_once 'DB_Connect.php';
        // connect ke database
        $this->db = new DB_Connect();
        $this->db->connect();
    }

    // destructor
    function __destruct() {
        
    }

        public function getAllSTO() {
        $result = mysql_query("SELECT * FROM sto") or die(mysql_error());
        $no_of_rows = mysql_num_rows($result);
        if ($no_of_rows > 0) {
            $result = mysql_fetch_array($result);
            return $result;
        } else {
            // sto not found
            return false;
        }
    }

   
    public function getAllTeam() {
        $result = mysql_query("SELECT * FROM team") or die(mysql_error());
        $no_of_rows = mysql_num_rows($result);
        if ($no_of_rows > 0) {
            $result = mysql_fetch_array($result);
            return $result;
        } else {
            // team not found
            return false;
        }
    }

 
    public function getAllArea() {
        $result = mysql_query("SELECT * FROM area") or die(mysql_error());
        $no_of_rows = mysql_num_rows($result);
        if ($no_of_rows > 0) {
            $result = mysql_fetch_array($result);
            return $result;
        } else {
            // team not found
            return false;
        }
    }

    public function getAllWO() {
        $result = mysql_query("SELECT * FROM workorder") or die(mysql_error());
        $no_of_rows = mysql_num_rows($result);
        if ($no_of_rows > 0) {
            $result = mysql_fetch_array($result);
            return $result;
        } else {
            // team not found
            return false;
        }
    }

    public function getAllPengerjaanWO() {
        $result = mysql_query("SELECT * FROM pengerjaanwo") or die(mysql_error());
        $no_of_rows = mysql_num_rows($result);
        if ($no_of_rows > 0) {
            $result = mysql_fetch_array($result);
            return $result;
        } else {
            // team not found
            return false;
        }
    }
    public function getAllWOInstalasi() {
        $result = mysql_query("SELECT * FROM woistalasi") or die(mysql_error());
        $no_of_rows = mysql_num_rows($result);
        if ($no_of_rows > 0) {
            $result = mysql_fetch_array($result);
            return $result;
        } else {
            // team not found
            return false;
        }
    }

    public function getAllWOMigrasi() {
        $result = mysql_query("SELECT * FROM womigrasi") or die(mysql_error());
        $no_of_rows = mysql_num_rows($result);
        if ($no_of_rows > 0) {
            $result = mysql_fetch_array($result);
            return $result;
        } else {
            // team not found
            return false;
        }
    }

    public function getAllMaterial() {
        $result = mysql_query("SELECT * FROM material") or die(mysql_error());
        $no_of_rows = mysql_num_rows($result);
        if ($no_of_rows > 0) {
            $result = mysql_fetch_array($result);
            return $result;
        } else {
            // team not found
            return false;
        }
    }

    public function getAllPenggunaanMaterial() {
        $result = mysql_query("SELECT * FROM penggunaanmaterial") or die(mysql_error());
        $no_of_rows = mysql_num_rows($result);
        if ($no_of_rows > 0) {
            $result = mysql_fetch_array($result);
            return $result;
        } else {
            // team not found
            return false;
        }
    }

    public function getAllPelanggan() {
        $result = mysql_query("SELECT * FROM pelanggan") or die(mysql_error());
        $no_of_rows = mysql_num_rows($result);
        if ($no_of_rows > 0) {
            $result = mysql_fetch_array($result);
            return $result;
        } else {
            // team not found
            return false;
        }
    }

    public function getAllPenggunaWeb() {
        $result = mysql_query("SELECT * FROM penggunaweb") or die(mysql_error());
        $no_of_rows = mysql_num_rows($result);
        if ($no_of_rows > 0) {
            $result = mysql_fetch_array($result);
            return $result;
        } else {
            // team not found
            return false;
        }
    }

    public function getAllPenggunaDevice() {
        $result = mysql_query("SELECT * FROM penggunadevice") or die(mysql_error());
        $no_of_rows = mysql_num_rows($result);
        if ($no_of_rows > 0) {
            $result = mysql_fetch_array($result);
            return $result;
        } else {
            // team not found
            return false;
        }
    }

    public function getAllPerubahanTable() {
        $result = mysql_query("SELECT * FROM area") or die(mysql_error());
        $no_of_rows = mysql_num_rows($result);
        if ($no_of_rows > 0) {
            $result = mysql_fetch_array($result);
            return $result;
        } else {
            // team not found
            return false;
        }
    }
}

?>
