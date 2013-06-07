<?php
include("../connect.php");
?>

<?php
	session_start();
	if (!isset($_SESSION['username'])){
		header('Location: http://localhost/swo/');
	}else{
		$username=$_SESSION['username'];
		$id_sto=$_SESSION['id_sto'];
		$id_pengguna=$_SESSION['id_pengguna_web'];
		$hak=$_SESSION['hak'];
	}
?>

<?php

$id_team = $_POST['id_team'];
$jml_ont = $_POST['jml_ont'];
$sn_ont = $_POST['sn_ont'];
$jml_roset = $_POST['jml_roset'];
$kabel_50 = $_POST['kabel_50'];
$kabel_75 = $_POST['kabel_75'];
$kabel_100 = $_POST['kabel_100'];
$jml_duct = $_POST['jml_duct'];
$jml_flex_pipe = $_POST['jml_flex_pipe'];
$tgl_ambil = $_POST['tgl_ambil'];

//$tgl_ambil = "2013-09-09";
	
function getIdTeamFromNamaTeam($nama_team){
	$q_get_id_team = mysql_query("select id_team from team where nama_team='$nama_team'");
	while($ar_get_id_team = mysql_fetch_array($q_get_id_team)){
		$id_team=$ar_get_id_team["id_team"];
	}
	return $id_team;
}


$id_team2 = getIdTeamFromNamaTeam($id_team);
$query = mysql_query("select * from pengambilanmaterial where id_team='$id_team2';");
if(mysql_num_rows($query) > 0){
	
}else{

	/*
	Penggunaan Material itu isinya sisa Material yang diupload dari HP
	*/
	
	mysql_query("insert into penggunaanmaterial(id_team,jumlah_ont, sn_ont, jumlah_roset, kabel_50, kabel_75, kabel_100, jumlah_duct, jumlah_flexible_pipe, createdate, createby) values('$id_team2','$jml_ont','$sn_ont','$jml_roset','$kabel_50','$kabel_75','$kabel_100','$jml_duct','$jml_flex_pipe',NOW(),'$id_pengguna');");
	mysql_query("insert into pengambilanmaterial(id_team,jumlah_ont, sn_ont, jumlah_roset, kabel_50, kabel_75, kabel_100, jumlah_duct, jumlah_flexible_pipe, createdate, createby) values('$id_team2','$jml_ont','$sn_ont','$jml_roset','$kabel_50','$kabel_75','$kabel_100','$jml_duct','$jml_flex_pipe', NOW(),'$id_pengguna');");
	mysql_query("insert into materialterpakai(id_team,jumlah_ont, sn_ont, jumlah_roset, kabel_50, kabel_75, kabel_100, jumlah_duct, jumlah_flexible_pipe, createdate, createby) values('$id_team2',0,'$sn_ont',0,0,0,0,0,0, NOW(), '$id_pengguna');");
	mysql_query("insert into perubahantable(nama_table, id_team, tgl_perubahan, createby, createdate) values('penggunaanmaterial','$id_team',NOW(),'$id_pengguna',NOW())");
	mysql_query("insert into log(aksi, createdate, createby) values('Awal Pengambilan Material Oleh Team',NOW(),'$id_pengguna');");
}						


?>