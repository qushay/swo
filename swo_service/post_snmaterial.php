<?php
include("connect.php");



		$product = array();
		$id_snmaterial = $_GET["id_snmaterial"];
		$id_pelanggan = $_GET["id_pelanggan"];
		$id_team = $_GET["id_team"];
		$sn_material = $_GET["sn_material"];
		
		
			
	$insert = mysql_query("insert into snmaterial(id_pelanggan, id_team, sn_material) values('$id_pelanggan','$id_team', '$sn_material');" );
	
	if($insert){
		$berhasil = "Berhasil";
		print(json_encode($berhasil));
	}else{
		$berhasil = "Gagal";
		print(json_encode($berhasil));
	}

mysql_close();

?>
