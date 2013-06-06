

<?php
include("connect.php");

		
		$id_pelanggan = $_GET["id_pelanggan"];
		$id_sto = $_GET["id_sto"];
		$id_wo = $_GET["id_wo"];
		$id_team = $_GET["id_team"];
		$alasan = $_GET["alasan"];
		$createby = 1;
		$createdate = date('d-m-Y H:i:s',time());
		
		//$isactive = $_GET["isactive"];
	


$insert = mysql_query("insert into tolak_wo(id_pelanggan, id_sto, id_wo, id_team, alasan, createby, createdate, isactive) values('$id_pelanggan','$id_sto','$id_wo','$id_team','$alasan','$createby', NOW(), 1); ");
$update = mysql_query("update woinstalasi set status_instalasi='ditolak' where id_pelanggan='$id_pelanggan' and id_sto='$id_sto';");
	
	if($insert){
		$berhasil = "Berhasil";
		echo $createdate;
		print(json_encode($berhasil));
		echo NOW();
	}else{
		echo "Insert Gagal";
		echo $createdate;
	}


?>
