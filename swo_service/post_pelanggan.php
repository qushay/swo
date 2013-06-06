<?php
include("connect.php");



		$product = array();
		$id_pelanggan = $_GET["id_pelanggan"];
		$id_sto = $_GET["id_sto"];
		$id_team = $_GET["id_team"];
		$id_area = $_GET["id_area"];
		$nama_pelanggan = $_GET["nama_pelanggan"];
		$alamat_pelanggan = $_GET["alamat_pelanggan"];
		$nomor_rumah = $_GET["nomor_rumah"];
		$kelurahan_pelanggan = $_GET["kelurahan_pelanggan"];
		$kecamatan_pelanggan = $_GET["kecamatan_pelanggan"];
		$kota_kabupaten_pelanggan = $_GET["kota_kabupaten_pelanggan"];
		$kode_pos_pelanggan = $_GET["kode_pos_pelanggan"];
		$layanan_pots = $_GET["layanan_pots"];
		$layanan_speedy = $_GET["layanan_speedy"];
		$layanan_iptv = $_GET["layanan_iptv"];
		
	//$sekarang = date('d-m-Y H:i:s',time());;			
	$update = mysql_query("update pelanggan set id_pelanggan ='$id_pelanggan', id_sto='$id_sto', id_team='$id_team', id_area='$id_area', nama_pelanggan='$nama_pelanggan', alamat_pelanggan='$alamat_pelanggan', nomor_rumah='$nomor_rumah', kelurahan_pelanggan='$kelurahan_pelanggan', kecamatan_pelanggan='$kecamatan_pelanggan', kota_kabupaten_pelanggan='$kota_kabupaten_pelanggan', kode_pos_pelanggan='$kode_pos_pelanggan', layanan_pots='$layanan_pots', layanan_speedy='$layanan_speedy', layanan_iptv='$layanan_iptv', updatedate=NOW() where id_pelanggan='$id_pelanggan';");
	
	if($update){
		$berhasil = "Berhasil";
		print(json_encode($berhasil));
	}else{
		$berhasil = "Gagal";
		print(json_encode($berhasil));

	}

mysql_close();

?>
