<?php
session_start();
if (isset($_SESSION['username'])&&isset($_SESSION['id_pengguna_web'])){
	$store_dataaa=new store_data();
	if (isset($_GET['op'])){
		$op=$_GET['op'];
		if ($op=="insert"){
			if(isset($_GET['sto'])&&isset($_GET['prov'])&&isset($_GET['kab'])&&isset($_GET['kec'])&&isset($_GET['kel'])
				&&isset($_GET['idp'])&&isset($_GET['nama'])&&isset($_GET['alamat'])&&isset($_GET['norumah'])&&isset($_GET['kodepos'])
				&&isset($_GET['jml'])){

				$id_sto= ($_GET['sto']);
				$prov=($_GET['prov']);
				$kab=($_GET['kab']);
				$kec=($_GET['kec']);
				$kel=($_GET['kel']);

				$idp=($_GET['idp']);
				$nama=($_GET['nama']);
				$alamat=($_GET['alamat']);
				$norumah=$_GET['norumah'];
				$kodepos=$_GET['kodepos'];

				$jml_tab=$_GET['jml'];

				if ($_SESSION['hak']=="super"){
					$store_dataaa->storePelanggan($idp,$nama,$alamat,$norumah,$kodepos,$prov,$id_sto,$kab,$kec,$kel,$_SESSION['id_pengguna_web']);
				}else{
					$store_dataaa->storePelanggan($idp,$nama,$alamat,$norumah,$kodepos,$prov,$_SESSION['id_sto'],$kab,$kec,$kel,$_SESSION['id_pengguna_web']);
				}

				for($i=0;$i<$jml_tab;$i++){
					$idlp[$i]=$_GET['id_line'.$i];
					$dp_lama[$i]=$_GET['dp_lama'.$i];
					$jenis_ont[$i]=$_GET['jenis_ont'.$i];
					$existing_pots[$i]=$_GET['existing_pots'.$i];
					$existing_speedy[$i]=$_GET['existing_speedy'.$i];
					$existing_iptv[$i]=$_GET['existing_iptv'.$i];

					$store_dataaa->storeLinePelanggan($idlp[$i],$idp,$dp_lama[$i],$jenis_ont[$i],$existing_pots[$i],$existing_speedy[$i],$existing_iptv[$i],$_SESSION['id_pengguna_web']);
					
				}

				
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

    public function storePelanggan($idp,$nama_pelanggan,$alamat_pelanggan,$norumah,$kodepos,
    	$provinsi_pelanggan,$id_sto,$kota_kabupaten_pelanggan,$kecamatan_pelanggan,$kelurahan_pelanggan,
    	$createby){
    	$result = mysql_query("SELECT * FROM pelanggan WHERE id_pelanggan = '$idp'");
        $no_of_rows = mysql_num_rows($result);
        if ($no_of_rows > 0) {
            //simpan jika belum exist
            $query= "UPDATE pelanggan SET id_pelanggan='$idp',nama_pelanggan='$nama_pelanggan',alamat_pelanggan='$alamat_pelanggan',
                nomor_rumah='$norumah',kode_pos_pelanggan='$kodepos',provinsi_pelanggan='$provinsi_pelanggan',id_sto='$id_sto',
                kota_kabupaten_pelanggan='$kota_kabupaten_pelanggan',kecamatan_pelanggan='$kecamatan_pelanggan',kelurahan_pelanggan='$kelurahan_pelanggan',
                createby='$createby',createdate=NOW() WHERE id_pelanggan='$idp'";
            $result = mysql_query($query);
            if ($result) {
                $uid = mysql_insert_id(); // last inserted id
                $result = mysql_query("SELECT * FROM pelanggan WHERE id_pelanggan = $uid");

                //LOG INSERT DATA PELANGGAN
                $result_log=mysql_query("INSERT INTO log (aksi,createby,createdate) VALUES('Input Pelanggan -> $idp','$createby',NOW())");

                return mysql_fetch_array($result);
            } else {
                return false;
            }
        } else {
            //simpan jika belum exist
            $result_load=mysql_query("SELECT COUNT(*) AS jml_load FROM pelanggan WHERE id_sto='$id_sto' GROUP BY id_caller");
            $i=0;
            while($data_load=mysql_fetch_array($result_load)){
                $jml_load[$i]=$data_load['jml_load'];
                $i++;
            }
            $min_load=min($jml_load);
            $result_id_caller=mysql_query("SELECT id_caller FROM pelanggan WHERE id_sto='$id_sto' GROUP BY id_caller HAVING COUNT(*)='$min_load'");
            $data_result_id_caller=mysql_fetch_array($result_id_caller);
            $id_caller=$data_result_id_caller['id_caller'];
                
            $query= "INSERT INTO pelanggan (id_pelanggan,nama_pelanggan,alamat_pelanggan,nomor_rumah,kode_pos_pelanggan,
                provinsi_pelanggan,id_sto,kota_kabupaten_pelanggan,kecamatan_pelanggan,kelurahan_pelanggan,
                id_caller,createby,createdate) 
            VALUES ('$idp','$nama_pelanggan','$alamat_pelanggan','$norumah','$kodepos',
                '$provinsi_pelanggan','$id_sto','$kota_kabupaten_pelanggan','$kecamatan_pelanggan','$kelurahan_pelanggan',
                '$id_caller','$createby',NOW())";
            $result = mysql_query($query);
            if ($result) {
                $uid = mysql_insert_id(); // last inserted id
                $result = mysql_query("SELECT * FROM pelanggan WHERE id_pelanggan = $uid");

                //LOG INSERT DATA PELANGGAN
                $result_log=mysql_query("INSERT INTO log (aksi,createby,createdate) VALUES('Input Pelanggan -> $idp','$createby',NOW())");

                return mysql_fetch_array($result);
            } else {
                return false;
            }
        }
    }
    public function storeLinePelanggan($idlp,$idp,$dp_lama,$jenis_ont,
    	$existing_pots,$existing_speedy,$existing_iptv,$createby){

    	$result = mysql_query("SELECT * FROM line_pelanggan WHERE id_line_pelanggan='$idlp'");
        $no_of_rows = mysql_num_rows($result);
        if ($no_of_rows > 0) {
            $query= "UPDATE line_pelanggan SET id_pelanggan='$idp',dp_lama='$dp_lama',jenis_ont='$jenis_ont',
                layanan_pots='$existing_pots',layanan_speedy='$existing_speedy',layanan_iptv='$existing_iptv',
                createby='$createby',createdate=NOW() WHERE id_line_pelanggan='$idlp'";
            $result = mysql_query($query);
            if ($result) {
                $uid = mysql_insert_id(); // last inserted id
                $result = mysql_query("SELECT * FROM line_pelanggan WHERE id_pelanggan = $uid");
                return mysql_fetch_array($result);
            } else {
                return false;
            }
        } else {
            //simpan jika belum exist
            $query= "INSERT INTO line_pelanggan (id_pelanggan,dp_lama,jenis_ont,
                layanan_pots,layanan_speedy,layanan_iptv,createby,createdate) 
            VALUES ('$idp','$dp_lama','$jenis_ont',
                '$existing_pots','$existing_speedy','$existing_iptv','$createby',NOW())";
            $result = mysql_query($query);
            if ($result) {
                $uid = mysql_insert_id(); // last inserted id
                $result = mysql_query("SELECT * FROM line_pelanggan WHERE id_pelanggan = $uid");
                return mysql_fetch_array($result);
            } else {
                return false;
            }
        }
        
    }
   
}
?>