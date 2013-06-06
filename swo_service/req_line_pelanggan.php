<?php
include("connect.php");

$id_pelanggan=$_GET['id_pelanggan'];
//$id_wo=1;
//$sql = mysql_query("select * from workorder where id_area='$id_area'");
//$sql=mysql_query("select id_wo, tgl_pembuatan, pembuat_wo, id_sto, id_team, id_area, catatan from workorder where id_area='$id_area';");

$sql=mysql_query("select * from line_pelanggan where id_pelanggan='$id_pelanggan';");
if(mysql_num_rows($sql) > 0){
	$response["pelanggan"] = array();
	while($row=mysql_fetch_array($sql)){
		//$output[]=$row["id_material"];

		$product = array();
		$product["id_line_pelanggan"] = $row["id_line_pelanggan"];
		$product["id_pelanggan"] = $row["id_pelanggan"];
		$product["nomor_pelanggan"] = $row["nomor_pelanggan"];
		$product["jenis_ont"] = $row["jenis_ont"];
		$product["dp_lama"] = $row["dp_lama"];
		//$product["nomor_pelanggan"] = $row["nomor_pelanggan"];
		$product["layanan_pots"] = $row["layanan_pots"];
		$product["layanan_speedy"] = $row["layanan_speedy"];
		$product["layanan_iptv"] = $row["layanan_iptv"];
		$product["odc"] = $row["odc"];
		$product["odp_baru"] = $row["odp_baru"];
		
		$product["createby"] = $row["createby"];
		$product["createdate"] = $row["createdate"];

		//$product["jenis_ont"] = $row["jenis_ont"];
		$product["updateby"] = $row["updateby"];
		$product["updatedate"] = $row["updatedate"];
		$product["isactive"] = $row["isactive"];
		/*$product["layanan_pots"] = $row["layanan_pots"];
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
