<?php
include("connect.php");


		$product = array();
		$id_womigrasi = $_GET["id_womigrasi"];
		$id_pelanggan = $_GET["id_pelanggan"];
		$id_sto = $_GET["id_sto"];
		$id_team = $_GET["id_team"];
		$id_area = $_GET["id_area"];
		$waktu_migrasi = $_GET["waktu_migrasi"];
		$tgl_migrasi = $_GET["tgl_migrasi"];
		$status_migrasi = $_GET["status_migrasi"];
		//$pembuat_womigrasi = $_GET["pembuat_womigrasi"];
		$foto_depan_rumah = $_GET["foto_depan_rumah"];
		$foto_samping_rumah = $_GET["foto_samping_rumah"];
		$keterangan = $_GET["keterangan"];
		
		//, pembuat_womigrasi='$pembuat_womigrasi'
			
	$update = mysql_query("UPDATE womigrasi set waktu_migrasi='$waktu_migrasi', tgl_migrasi=NOW(), status_migrasi='$status_migrasi', 
		foto_depan_rumah='$foto_depan_rumah', foto_samping_rumah ='$foto_samping_rumah', keterangan='$keterangan' where id_womigrasi='$id_womigrasi' ;");
	
	if($update){
		$berhasil = "Berhasil";
		print(json_encode($berhasil));
	}

mysql_close();

?>
