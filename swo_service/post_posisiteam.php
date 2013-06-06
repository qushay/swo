
<?php
include("connect.php");


		$product = array();
		$id_team = $_GET["id_team"];
		$posisi_bujur_pertama = $_GET["posisi_bujur_pertama"];
		$posisi_lintang_pertama = $_GET["posisi_lintang_pertama"];
		$posisi_bujur_kedua = $_GET["posisi_bujur_kedua"];
		$posisi_lintang_kedua = $_GET["posisi_lintang_kedua"];
		$updateby = $username_pengguna_device;
	

			
	//$update = mysql_query("update posisi_team set id_team='$id_team', posisi_bujur_pertama='$posisi_bujur_pertama', posisi_lintang_pertama='$posisi_lintang_pertama', posisi_bujur_kedua='$posisi_bujur_kedua', posisi_lintang_kedua = '$posisi_lintang_kedua' where id_team='$id_team' ;");
	$update = mysql_query("update posisi_team set id_team='$id_team', bujur_pertama='$posisi_bujur_pertama', lintang_pertama='$posisi_lintang_pertama', bujur_kedua='$posisi_bujur_kedua', lintang_kedua = '$posisi_lintang_kedua', updateby='$updateby', updatedate=NOW() where id_team='$id_team' ;");

	if($update){
		$berhasil = "Berhasil";
		print(json_encode($berhasil));
	}else{
		$berhasil = "Gagal";
		print(json_encode($berhasil));

	}
	

mysql_close();

?>
