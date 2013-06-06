<?php
include("connect.php");


$id_wo=$_GET['idwo'];
//$id_wo=111;
//$sql = mysql_query("select * from pelanggan where id_wo='$id_wo'");
//$sql=mysql_query("select id_pelanggan, id_wo, id_sto, id_area, nama_pelanggan, nomor_pelanggan, alamat_pelanggan, kelurahan_pelanggan, kecamatan_pelanggan, kota_kabupaten_pelanggan, kodepos_pelanggan, pembuat_pelanggan from pelanggan where id_wo='$id_wo';");

$sql=mysql_query("select * from pelanggan where id_wo='$id_wo';");

if(mysql_num_rows($sql) > 0){
	$response["pelanggan"] = array();
	while($row=mysql_fetch_array($sql)){
		//$output[]=$row["id_material"];

		$product = array();
		$product["id_pelanggan"] = $row["id_pelanggan"];
		$product["id_wo"] = $row["id_wo"];
		$product["id_sto"] = $row["id_sto"];
		$product["id_area"] = $row["id_area"];
		$product["nama_pelanggan"] = $row["nama_pelanggan"];
		$product["nomor_pelanggan"] = $row["nomor_pelanggan"];
		$product["alamat_pelanggan"] = $row["alamat_pelanggan"];
		$product["kelurahan_pelanggan"] = $row["kelurahan_pelanggan"];
		$product["kecamatan_pelanggan"] = $row["kecamatan_pelanggan"];
		$product["kota_kabupaten_pelanggan"] = $row["kota_kabupaten_pelanggan"];
		$product["kodepos_pelanggan"] = $row["kodepos_pelanggan"];
		$product["dp_lama"] = $row["dp_lama"];
		$product["layanan_speedy"] = $row["layanan_speedy"];
		$product["layanan_pots"] = $row["layanan_pots"];
		$product["layanan_iptv"] = $row["layanan_iptv"];
		$product["pembuat_pelanggan"] = $row["pembuat_pelanggan"];
		array_push($response["pelanggan"],$product);
	}
	
	$response["success"]=1;
	print(json_encode($response));

}else{
	$response["success"]=0;
	print(json_encode($response));
}


mysql_close();

?>
	