<?php



?>

<?php
include("connect.php");
	
		$id_pelanggan = $_GET["id_pelanggan"];
		$layanan_speedy_sebelum= $_GET["layanan_speedy_sebelum"];
		$layanan_speedy_sesudah= $_GET["layanan_speedy_sesudah"];
		$layanan_pots_sebelum= $_GET["layanan_pots_sebelum"];
		$layanan_pots_sesudah= $_GET["layanan_pots_sesudah"];
		$layanan_iptv_sebelum= $_GET["layanan_iptv_sebelum"];
		$layanan_iptv_sesudah= $_GET["layanan_iptv_sesudah"];
				
		
			
	//$insert = mysql_query("insert into perubahanlayanan values( '$id_pelanggan','$layanan_speedy_sebelum', '$layanan_speedy_sesudah', '$layanan_pots_sebelum', '$layanan_pots_sesudah', '$layanan_iptv_sebelum','$layanan_iptv_sesudah');");
	$insert = mysql_query("insert into perubahanlayanan(id_pelanggan,layanan_speedy_sebelum, layanan_speedy_sesudah, layanan_pots_sebelum, layanan_pots_sesudah,layanan_iptv_sebelum, layanan_iptv_sesudah, createby, createdate) values('$id_pelanggan','$layanan_speedy_sebelum', '$layanan_speedy_sesudah', '$layanan_pots_sebelum', '$layanan_pots_sesudah', '$layanan_iptv_sebelum','$layanan_iptv_sesudah','$username_pengguna_device', NOW()) ;");

	if($insert){
		$berhasil = "Berhasil";
		print(json_encode($berhasil));
	}

mysql_close();

?>

