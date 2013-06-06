<?php
include("connect.php");

$id_team=$_GET['idteam'];
//$id_wo=1;
//$sql = mysql_query("select * from workorder where id_area='$id_area'");
//$sql=mysql_query("select id_wo, tgl_pembuatan, pembuat_wo, id_sto, id_team, id_area, catatan from workorder where id_area='$id_area';");

$sql=mysql_query("select * from womigrasi where id_team='$id_team' AND status_migrasi='mulai';");
if(mysql_num_rows($sql) > 0){
	$response["womigrasi"] = array();
	while($row=mysql_fetch_array($sql)){
		//$output[]=$row["id_material"];

		$product = array();
		$product["id_womigrasi"] = $row["id_womigrasi"];
		$product["id_pelanggan"] = $row["id_pelanggan"];
		$product["id_sto"] = $row["id_sto"];
		$product["id_team"] = $row["id_team"];
		$product["id_area"] = $row["id_area"];
		$product["waktu_migrasi"] = $row["waktu_migrasi"];
		$product["tgl_migrasi"] = $row["tgl_migrasi"];
		$product["status_migrasi"] = $row["status_migrasi"];
		//$product["pembuat_womigrasi"] = $row["pembuat_womigrasi"];
		$product["foto_depan_rumah"] = $row["foto_depan_rumah"];
		$product["foto_samping_rumah"] = $row["foto_samping_rumah"];
		$product["keterangan"] = $row["keterangan"];
		
		
		array_push($response["womigrasi"],$product);
	}
	$response["success"]=1;
	print(json_encode($response));

}else{
	$response["success"]=0;
	print(json_encode($response));
}

mysql_close();

?>
