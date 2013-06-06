<?php
//if(session_status() != 2) {session_start();}
//session_start();
include '../session.php';
if ($hak!="super"){
    $id_sto=$_SESSION['id_sto'];
}else{
    $id_sto="";
}
class get_data_langsung {
    private $db_read;

    function __construct() {
        require '../include/DB_Functions_Read.php';
        // connect ke database
        $this->db_read = new DB_Functions_Read();
        
    }

    // destructor
    function __destruct() {
        
    }

    function dateFormatConverter($date){
            $myDateTime = DateTime::createFromFormat('Y-m-d', $date);
            $newDateString = $myDateTime->format('d F Y'); 
            return $newDateString;
    }
    
    public function getSTO_all(){
        $d = mysql_query("SELECT * FROM sto");
        echo "<option value=''>Semua STO</option>";
        while($data=mysql_fetch_array($d)){
            echo "<option value='".$data['id_sto']."'>".$data['nama_sto']."</option>";
        }
    }
    public function getPelanggan_byID($idp){
        $d = mysql_query("SELECT * FROM pelanggan WHERE id_pelanggan='$idp'");
        return $d;
    }
    public function getTglAssignment(){
        $d = mysql_query("SELECT DISTINCT DATE(jam_janji) AS jam_janji
            FROM pekerjaan");
        echo "<option value=''>Semua Tanggal</option>";
        while($data=mysql_fetch_array($d)){
            echo "<option value='".$data['jam_janji']."'>".$this->dateFormatConverter($data['jam_janji'])."</option>";
        }
    }
    
}

?> 
    