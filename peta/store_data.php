<?php
session_start();
if (isset($_SESSION['username'])&&isset($_SESSION['id_pengguna_web'])&&isset($_SESSION['hak'])){
	$store_dataaa=new store_data();
	$hak=$_SESSION['hak'];
	if (isset($_GET['op'])&&$hak=="super"){
		$op=$_GET['op'];
		if ($op=="insert"){
			if(isset($_GET['id_sto'])&&isset($_GET['nama_sto'])&&isset($_GET['alamat'])&&isset($_GET['lintang'])&&isset($_GET['bujur'])){
				$nama_sto= ($_GET['nama_sto']);
				$id_sto= ($_GET['id_sto']);
				$prov= ($_GET['prov']);
				$alamat=($_GET['alamat']);
				$lintang=($_GET['lintang']);
				$bujur=($_GET['bujur']);
				$store_dataaa->storeSTO($id_sto,$nama_sto,$prov,$alamat,$lintang,$bujur,$_SESSION['id_pengguna_web']);
				
			}
		}
	}
}else{
	include '../domain.php';
	header('Location: '.$domain);
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

    public function storeSTO($id_sto,$nama_sto,$prov,$alamat,$lintang,$bujur,$createby){

    	$input=$this->db_store->inputSTO($id_sto,$nama_sto,$prov,$alamat,$lintang,$bujur,$createby);
        if ($input){
        	echo "sukses";
        }else{
        	echo "gagal";
        }
    }
}
?>