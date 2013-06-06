<?php
include("connect.php");


		echo "test";
		
		$product = array();
		$id_penggunaan_material = $_GET["id_penggunaan_material"];
		$id_team = $_GET["id_team"];
		$jumlah_ont = $_GET["jumlah_ont"];
		$sn_ont = $_GET["sn_ont"];
		$jumlah_roset = $_GET["jumlah_roset"];

		$kabel_50 = $_GET["kabel_50"];
		$kabel_75 = $_GET["kabel_75"];
		$kabel_100 = $_GET["kabel_100"];
		$jumlah_duct = $_GET["jumlah_duct"];
		$jumlah_flexible_pipe = $_GET["jumlah_flexible_pipe"];
		//$pembuat_penggunaan_material = $_GET["pembuat_penggunaan_material"];
		//$tgl_ambil = $_GET["tgl_ambil"];
		
	


	$update = mysql_query("update penggunaanmaterial set jumlah_ont='$jumlah_ont', sn_ont='$sn_ont', jumlah_roset='$jumlah_roset', kabel_50='$kabel_50', kabel_75='$kabel_75', kabel_100='$kabel_100', jumlah_duct='$jumlah_duct', jumlah_flexible_pipe='$jumlah_flexible_pipe' where id_team = '$id_team'");

	$query1= mysql_query("select * from pengambilanmaterial where id_team='$id_team';");
	$query2= mysql_query("select * from penggunaanmaterial where id_team='$id_team';");
	while($rows=mysql_fetch_array($query1)){
		while($rows1=mysql_fetch_array($query2)){
			$jumlah_ont1=$rows["jumlah_ont"] - $rows1["jumlah_ont"];
			
			$jumlah_roset1=$rows["jumlah_roset"] - $rows1["jumlah_roset"];
			$kabel_501 = $rows["kabel_50"] - $rows1["kabel_50"];
			$kabel_751 = $rows["kabel_75"] - $rows1["kabel_75"];
			$kabel_1001 = $rows["kabel_100"] - $rows1["kabel_100"];
			$jumlah_duct1 = $rows["jumlah_duct"] - $rows1["jumlah_duct"];
			$jumlah_flexible_pipe1 = $rows["jumlah_flexible_pipe"] - $rows1["jumlah_flexible_pipe"];
		}
		
	}




	$ambil_mat_terpakai = mysql_query("select * from materialterpakai where id_team='$id_team';");
	$check = mysql_num_rows($ambil_mat_terpakai);
	if($check > 0){
		$update2 = mysql_query("update materialterpakai set jumlah_ont='$jumlah_ont1', jumlah_roset='$jumlah_roset1', kabel_50='$kabel_501', kabel_75='$kabel_751', kabel_100='$kabel_1001', jumlah_duct='$jumlah_duct1', jumlah_flexible_pipe='$jumlah_flexible_pipe1' where id_team = '$id_team'");
	}else{
		$insert = mysql_query("insert into materialterpakai(id_team, jumlah_ont, jumlah_roset, panjang_kabel, jumlah_duct, jumlah_flexible_pipe, createdate, createby) values ('$id_team',0,0,0,0,0);");
	}
	if($update){
		$berhasil = "Berhasil";
		print(json_encode($berhasil));
	}else{
		$berhasil = "Gagal";
		print(json_encode($berhasil));
	}
	

mysql_close();

?>
