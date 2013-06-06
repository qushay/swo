<?php
include("connect.php");

$id_team=$_GET['idteam'];
//$id_wo=1;
//$sql = mysql_query("select * from workorder where id_area='$id_area'");
//$sql=mysql_query("select id_wo, tgl_pembuatan, pembuat_wo, id_sto, id_team, id_area, catatan from workorder where id_area='$id_area';");

$sql=mysql_query("select * from pelanggan where id_team='$id_team';");
if(mysql_num_rows($sql) > 0){
	$response["pelanggan"] = array();
	while($row=mysql_fetch_array($sql)){
		//$output[]=$row["id_material"];

		$product = array();
		$product["id_pelanggan"] = $row["id_pelanggan"];
		$product["id_sto"] = $row["id_sto"];
		$product["id_team"] = $row["id_team"];
		$product["id_area"] = $row["id_area"];
		$product["nama_pelanggan"] = $row["nama_pelanggan"];
		//$product["nomor_pelanggan"] = $row["nomor_pelanggan"];
		$product["alamat_pelanggan"] = $row["alamat_pelanggan"];
		$product["nomor_rumah"] = $row["nomor_rumah"];
		$product["keluarahan_pelanggan"] = $row["keluarahan_pelanggan"];
		$product["kecamatan_pelanggan"] = $row["kecamatan_pelanggan"];
		$product["kota_kabupaten_pelanggan"] = $row["kota_kabupaten_pelanggan"];
		//$product["jenis_ont"] = $row["jenis_ont"];
		$product["kode_pos_pelanggan"] = $row["kode_pos_pelanggan"];
		//$product["dp_lama"] = $row["dp_lama"];
		/*$product["layanan_speedy"] = $row["layanan_speedy"];
		$product["layanan_pots"] = $row["layanan_pots"];
		$product["layanan_iptv"] = $row["layanan_iptv"];*/
		//$product["pembuat_pelanggan"] = $row["pembuat_pelanggan"];
		
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
