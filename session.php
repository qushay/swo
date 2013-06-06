<?php
	include '../domain.php';
	if (!isset($_SESSION['username'])){
		header('Location: '.$domain);
	}else{
		$username=$_SESSION['username'];
		$id_sto=$_SESSION['id_sto'];
		$hak=$_SESSION['hak'];
		$id_pengguna=$_SESSION['id_pengguna_web'];
	
	}
?>