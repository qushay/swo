
<?php
include("connect.php");



		$product = array();
		$id_line_pelanggan	 = $_GET["id_line_pelanggan"];
		
		$id_pelanggan = $_GET["id_pelanggan"];
		$jenis_ont = $_GET["jenis_ont"];
		$dp_lama = $_GET["dp_lama"];
		$layanan_pots = $_GET["layanan_pots"];
		$layanan_speedy = $_GET["layanan_speedy"];
		$layanan_iptv = $_GET["layanan_iptv"];
		$odc = $_GET["odc"];
		$odp_baru = $_GET["odp_baru"];
	/*	$createby = $id_pengguna_web;
		$createdate = NOW();
		$updateby = $_GET["updateby"];

		$updatedate = $_GET["updatedate"];
		$isactive = $_GET["isactive"];
	*/

	$check_pelanggan = mysql_query("select id_pelanggan from line_pelanggan where layanan_pots='$layanan_pots'");
	if(mysql_num_rows($check_pelanggan)>0){
		$update = mysql_query("update line_pelanggan set id_pelanggan='$id_pelanggan', jenis_ont='$jenis_ont', dp_lama='$dp_lama', layanan_pots='$layanan_pots', layanan_speedy='$layanan_speedy', layanan_iptv='$layanan_iptv', odc='$odc', odp_baru='$odp_baru' where layanan_pots='$layanan_pots' AND id_pelanggan='$id_pelanggan'; ");
	}else{
		$insert = mysql_query("insert into line_pelanggan(id_pelanggan, jenis_ont, dp_lama, layanan_pots, layanan_speedy, layanan_iptv, odc, odp_baru, updatedate) values('$id_pelanggan','$jenis_ont','$dp_lama','$layanan_pots','$layanan_speedy','$layanan_iptv', '$odc', '$odp_baru', NOW());");
	}

	if($update){
		$berhasil = "Berhasil";
		echo $id_pelanggan;
		print(json_encode($berhasil));
	}else{
		$berhasil = "Gagal";
		print(json_encode($berhasil));

	}

mysql_close();

?>
