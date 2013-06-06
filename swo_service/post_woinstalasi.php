<?php
include("connect.php");


		
		$id_woinstalasi = $_GET["id_woinstalasi"];
		$id_pelanggan = $_GET["id_pelanggan"];
		$id_sto = $_GET["id_sto"];
		$id_team = $_GET["id_team"];
		$id_area = $_GET["id_area"];
		$waktu_instalasi = $_GET["waktu_instalasi"];
		// $tgl_instalasi = $_GET["tgl_instalasi"];
		$status_instalasi = $_GET["status_instalasi"];
		//$pembuat_woinstalasi = $_GET["pembuat_woinstalasi"];
		$foto_depan_rumah = $_GET["foto_depan_rumah"];
		$foto_jaringan = $_GET["foto_jaringan"];
		$foto_roset = $_GET["foto_roset"];
		$foto_bobokan = $_GET["foto_bobokan"];
		$keterangan = $_GET["keterangan"];
		
		
			//pembuat_woinstalasi='$pembuat_woinstalasi',
	//$insert = mysql_query("insert into woinstalasi values( '$id_woinstalasi', '$id_wo', '$waktu_instalasi', '$tgl_instalasi', '$status_instalasi', '$pembuat_woinstalasi', '$foto_depan_rumah','$foto_jaringan', '$foto_roset', '$foto_samping_rumah', '$keterangan');");
	
//	$update = mysql_query("update woinstalasi set id_woinstalasi='$id_woinstalasi', id_pelanggan='$id_pelanggan', id_sto='$id_sto', id_team='$id_team', id_area='$id_area', waktu_instalasi='$waktu_instalasi', tgl_instalasi='$tgl_instalasi', status_instalasi='$status_instalasi', foto_depan_rumah='$foto_depan_rumah', foto_jaringan ='$foto_jaringan', foto_roset='$foto_roset', foto_roset='$foto_roset', foto_bobokan='$foto_bobokan' , keterangan = '$keterangan' where id_woinstalasi='$id_woinstalasi' ;");

	$update = mysql_query("UPDATE woinstalasi SET waktu_instalasi='$waktu_instalasi', tgl_instalasi=NOW(), status_instalasi='$status_instalasi', 
		foto_depan_rumah='$foto_depan_rumah', foto_jaringan='$foto_jaringan', foto_roset='$foto_roset',foto_bobokan='$foto_bobokan' , 
		keterangan = '$keterangan' 
		WHERE id_woinstalasi='$id_woinstalasi' ;");


	
	
	if($status_instalasi=="selesai"){
		$temp_id= substr($id_woinstalasi, 1);
		$id_wo_migrasi = "2".$temp_id;
		echo $id_wo_migrasi;
		$insert = mysql_query("INSERT into womigrasi (id_womigrasi, id_pelanggan, id_sto, status_migrasi, createby, createdate) values ('$id_wo_migrasi', '$id_pelanggan','$id_sto','belum','$id_team', NOW());");
	}

	
	if($update || $insert){
		$berhasil = "Berhasil";
		print(json_encode($berhasil));
	}
mysql_close();

?>
