<?php
include("../connect.php");
?>

<?php
	session_start();
	if (!isset($_SESSION['username'])){
		header('Location: http://localhost/swo/');
	}else{
		//$username=$_SESSION['username'];
		//$id_sto=$_SESSION['id_sto'];
		$id_pengguna=$_SESSION['id_pengguna_web'];
		//$hak=$_SESSION['hak'];
	}
?>

<?php


$nama_team = $_POST['nama_team'];
$id_sto = $_POST['id_sto2'];
$createby = $_POST['createby'];
$createdate = $_POST['createdate'];
$updateby = $_POST['updateby'];
$updatedate = $_POST['updatedate'];
$isactive = $_POST['isactive'];

$get_id_sto = mysql_query("select id_sto from sto where nama_sto='$id_sto';");
while($ar_get_id_sto = mysql_fetch_array($get_id_sto)){
	$id_sto2 = $ar_get_id_sto["id_sto"];
}



//$query = mysql_query("select * from penggunaweb where username_pengguna_web='$username'");



if ($nama_team != ""){
	$insert =mysql_query("insert into team(id_sto, nama_team, createdate, createby) values('$id_sto2','$nama_team', NOW(), $id_pengguna);");

	//$insert =mysql_query("insert into penggunadevice(username_pengguna_device, password_pengguna_device, id_sto, id_team, id_area) values ('juanda','tes',2,2,2);");	
}


?>