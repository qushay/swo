<?php

	session_start();
	if (!isset($_SESSION['username'])){
		header('Location: http://localhost/swo/');
	}else{
		$username=$_SESSION['username'];
		$id_sto=$_SESSION['id_sto'];
		$id_pengguna_web=$_SESSION['id_pengguna_web'];
		$hak=$_SESSION['hak'];
		$username_pengguna_device = $_SESSION['username_pengguna_device'];
	}

?>

<?php
include("connect.php");


		$product = array();
		//$id_pengerjaanwo = $_GET["id_pengerjaanwo"];
		//$id_pengerjaanwo = 1;
		$id_wo = $_GET["id_wo"];
		$tipe_wo = $_GET["tipe_wo"];
		$status_wo = $_GET["status_wo"];
		$pembuat_pengerjaanwo = $_GET["pembuat_pengerjaanwo"];
		
	
	$update = mysql_query("update pengerjaanwo set id_wo='$id_wo', tipe_wo='$tipe_wo', status_wo='$status_wo',  pembuat_pengerjaanwo='$pembuat_pengerjaanwo' where id_wo='$id_wo';");
	
	
	if ($update){
		$berhasil["1"] = "berhasil";
		print json_encode($berhasil);
	}else{
		$berhasil["1"]= "tidak berhasil";
		print json_encode($berhasil);
	}
	

mysql_close();

?>
