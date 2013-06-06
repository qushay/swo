<?php
include("connect.php");


$id_team=$_GET['id_team'];
//$id_wo=1;
//$sql = mysql_query("select * from workorder where id_area='$id_area'");
//$sql=mysql_query("select id_wo, tgl_pembuatan, pembuat_wo, id_sto, id_team, id_area, catatan from workorder where id_area='$id_area';");

$sql=mysql_query("select * from woinstalasi where id_team='$id_team' AND status_instalasi='mulai';");
if(mysql_num_rows($sql) > 0){
	$response["woinstalasi"] = array();
	while($row=mysql_fetch_array($sql)){
		//$output[]=$row["id_material"];

		$product = array();
		$product["id_woinstalasi"] = $row["id_woinstalasi"];
		$product["id_pelanggan"] = $row["id_pelanggan"];
		$product["id_sto"] = $row["id_sto"];
		$product["id_team"] = $row["id_team"];
		$product["id_area"] = $row["id_area"];
		$product["waktu_instalasi"] = $row["waktu_instalasi"];
		$product["tgl_instalasi"] = $row["tgl_instalasi"];
		$product["status_instalasi"] = $row["status_instalasi"];
		$product["pembuat_woinstalasi"] = $row["pembuat_woinstalasi"];
		$product["foto_depan_rumah"] = $row["foto_depan_rumah"];
		$product["foto_jaringan"] = $row["foto_jaringan"];
		//$product["pembuat_woinstalasi"] = $row["pembuat_woinstalasi"];
		$product["foto_depan_rumah"] = $row["foto_depan_rumah"];
		$product["foto_jaringan"] = $row["foto_jaringan"];
		$product["foto_roset"] = $row["foto_roset"];
		$product["foto_bobokan"] = $row["foto_bobokan"];
		$product["keterangan"] = $row["keterangan"];
		
		
		array_push($response["woinstalasi"],$product);
	}
	$response["success"]=1;
	print(json_encode($response));

}else{
	$response["success"]=0;
	print(json_encode($response));
}

mysql_close();

?>
