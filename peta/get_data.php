<?php 
$get_dataaa=new get_data();

if(isset($_GET['op'])){
    $op = $_GET['op']; 
}
if(isset($_GET['filter'])){
    $filter=$_GET['filter'];
    if ($filter=="get_coor_sto") {
        $get_dataaa->getCoordinatSTO($_GET['id_sto']);
    }elseif ($filter=="get_coor_fo_by_sto") {
        $get_dataaa->getCoordinatFieldOps($_GET['id_sto']);
    }elseif ($filter=="get_coor_divre") {
        $get_dataaa->getCoordinatDivre();
    }elseif ($filter=="get_coor_sto_by_map_bounds") {
        $get_dataaa->getCoordinatSTObyMapBounds($_GET['ne_lat'],$_GET['ne_lon'],$_GET['sw_lat'],$_GET['sw_lon']);
    }elseif ($filter=="get_coor_fo_by_map_bounds_by_sto") {
        $get_dataaa->getCoordinatFO_byMapBounds_bySTO($_GET['id_sto'],$_GET['ne_lat'],$_GET['ne_lon'],$_GET['sw_lat'],$_GET['sw_lon']);
    }
}
class get_data {
    private $db_read;

    function __construct() {
        require_once '../include/DB_Functions_Read.php';
        // connect ke database
        $this->db_read = new DB_Functions_Read();
        
    }

    // destructor
    function __destruct() {
        
    }
 
 
    public function getProvinsi(){
        $d = $this->db_read->getAllProvinsi();
        while($data=mysql_fetch_array($d)){
            echo "<option value='".$data['provinsi']."'>".$data['provinsi']."</option>";
        }
    }
    public function getCoordinatFieldOps($id_sto){
        $d = $this->db_read->getCoordinatFieldOps($id_sto);
        $data=mysql_fetch_array($d);
            $nama=$data['nama_team'];
            $lat=$data['lintang_pertama'];
            $lon=$data['bujur_pertama'];
            echo $nama."|".$lat."|".$lon;   
        while($data=mysql_fetch_array($d)){
            $nama=$data['nama_team'];
            $lat=$data['lintang_pertama'];
            $lon=$data['bujur_pertama'];
            echo "#".$nama."|".$lat."|".$lon;       
        }
    }

    public function getCoordinatSTObyMapBounds($ne_lat,$ne_lon,$sw_lat,$sw_lon){
        $d = $this->db_read->getCoordinatSTObyMapBounds($ne_lat,$ne_lon,$sw_lat,$sw_lon);
        $data=mysql_fetch_array($d);
            $id_sto=$data['id_sto'];
            $nama=$data['nama_sto'];
            $lat=$data['lintang_sto'];
            $lon=$data['bujur_sto'];
            echo $id_sto."|".$nama."|".$lat."|".$lon;   
        while($data=mysql_fetch_array($d)){
            $id_sto=$data['id_sto'];
            $nama=$data['nama_sto'];
            $lat=$data['lintang_sto'];
            $lon=$data['bujur_sto'];
            echo "#".$id_sto."|".$nama."|".$lat."|".$lon;       
        } 
    }

    public function getCoordinatFO_byMapBounds_bySTO($sto,$ne_lat,$ne_lon,$sw_lat,$sw_lon){
        $d = $this->db_read->getCoordinatFO_byMapBounds_bySTO($sto,$ne_lat,$ne_lon,$sw_lat,$sw_lon);
        $data=mysql_fetch_array($d);
            $nama=$data['nama_team'];
            $lat=$data['lintang_pertama'];
            $lon=$data['bujur_petama'];
            echo $nama."|".$lat."|".$lon;   
        while($data=mysql_fetch_array($d)){
            $nama=$data['nama_team'];
            $lat=$data['lintang_pertama'];
            $lon=$data['bujur_pertama'];
            echo "#".$nama."|".$lat."|".$lon;       
        } 
    }

}
?> 