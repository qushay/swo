<?php
session_start();
include '../session.php';
if ($hak!="super"){
    $id_sto=$_SESSION['id_sto'];
}else{
    if (isset($_GET['sto'])){
        $id_sto=$_GET['sto'];
    }else{
        $id_sto="";
    }
}
if (isset($_GET['ket'])){
    $ket=$_GET['ket'];
}else{$ket="";}

if (isset($_GET['penerima'])){
    $penerima=$_GET['penerima'];
}else{$penerima="";}

$store_dataaa=new store_data();
if (isset($_GET['op'])&&isset($_GET['idp'])){
	$op=$_GET['op'];
	if ($op=="pending"){
		$store_dataaa->setPending($_GET['idp'],$_GET['two'],$id_sto,$id_pengguna);
	}elseif ($op=="ditolak") {
		$store_dataaa->setDitolak($_GET['idp'],$_GET['two'],$id_sto,$id_pengguna);
	}elseif ($op=="notone") {
        $store_dataaa->setNotone($_GET['idp'],$_GET['two'],$id_sto,$ket,$penerima,$id_pengguna);
    }elseif ($op=="diterima") {
		$store_dataaa->setDiterima($_GET['idp'],$_GET['two'],$id_sto,$_GET['jam_janji'],$ket,$penerima,$id_pengguna);
	}
}
if (isset($_GET['opm'])&&isset($_GET['idp'])){
    $op=$_GET['opm'];
    if ($op=="pending"){
        $store_dataaa->setPendingMigrasi($_GET['idp'],$id_sto,$id_pengguna);
    }elseif ($op=="ditolak") {
        $store_dataaa->setDitolakMigrasi($_GET['idp'],$id_sto,$id_pengguna);
    }elseif ($op=="notone") {
        $store_dataaa->setNotoneMigrasi($_GET['idp'],$id_sto,$ket,$penerima,$id_pengguna);
    }elseif ($op=="diterima") {
        $store_dataaa->setDiterimaMigrasi($_GET['idp'],$id_sto,$_GET['jam_janji'],$ket,$penerima,$id_pengguna);
    }
}

class store_data{
	private $db_read;
	private $db_store;

    function __construct() {
        require '../include/DB_Functions_Read.php';
        require '../include/DB_Functions_Create.php';
        // connect ke database
        $this->db_read = new DB_Functions_Read();
        $this->db_store = new DB_Functions_Create();
        
    }

    // destructor
    function __destruct() {
        
    }

    public function setPending($id_pelanggan,$two,$id_sto,$createdby){
        if ($two=="instalasi"){
            $set=$this->db_store->setWOPending($id_pelanggan,$id_sto,$createdby);
            if ($set){
                header("Location: ./");
            }
        }else{
            $set=$this->db_store->setWOPendingMigrasi($id_pelanggan,$id_sto,$createdby);
            if ($set){
                header("Location: migrasi_call.php");
            }
        }
    }
    public function setNotone($id_pelanggan,$two,$id_sto,$createdby){
        if ($two=="instalasi"){
            $set=$this->db_store->setWONotone($id_pelanggan,$id_sto,$createdby);
            if ($set){
                header("Location: ./");
            }
        }else{
            $set=$this->db_store->setWONotoneMigrasi($id_pelanggan,$id_sto,$createdby);
            if ($set){
                header("Location: migrasi_call.php");
            }
        }
    }
    public function setDitolak($id_pelanggan,$two,$id_sto,$catatan,$penerima,$createdby){
        if ($two=="instalasi"){
            $set=$this->db_store->setWODitolak($id_pelanggan,$id_sto,$catatan,$penerima,$createdby);
            if ($set){
                header("Location: ./");
            }
        }else{
            $set=$this->db_store->setWODitolakMigrasi($id_pelanggan,$id_sto,$catatan,$penerima,$createdby);
            if ($set){
                header("Location: migrasi_call.php");
            }
        }
    }
    public function setDiterima($id_pelanggan,$two,$id_sto,$jam_janji,$catatan,$penerima,$createdby){
        if ($two=="instalasi"){
            $myDateTime = DateTime::createFromFormat('d/m/Y H:i', $jam_janji);
            $newDateString = $myDateTime->format('Y-m-d H:i:s'); 
            $this->db_store->setWODiterima($id_pelanggan,$id_sto,$newDateString,$catatan,$penerima,$createdby);
        }else{
            $myDateTime = DateTime::createFromFormat('d/m/Y H:i', $jam_janji);
            $newDateString = $myDateTime->format('Y-m-d H:i:s'); 
            $this->db_store->setWODiterimaMigrasi($id_pelanggan,$id_sto,$newDateString,$catatan,$penerima,$createdby);
        }
    }

}
?>