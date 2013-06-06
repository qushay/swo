<?php
include("connect.php");


		$product = array();
		$id_posisipelanggan = $_GET["id_posisipelanggan"];
		$posisi_bujur = $_GET["posisi_bujur"];
		$posisi_lintang = $_GET["posisi_lintang"];

			
	$update = mysql_query("update posisipelanggan set id_posisipelanggan='$id_posisipelanggan', posisi_bujur='$posisi_bujur', posisi_lintang='$posisi_lintang' where id_posisipelanggan='$id_posisipelanggan' ;");
	
	if($update){
		$berhasil = "Berhasil";
		print(json_encode($berhasil));
	}

mysql_close();

?>
