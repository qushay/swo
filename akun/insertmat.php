

<?php
	session_start();
	include("../connect.php");
	include("../session.php");
?>

<?php

$id_team = $_POST['id_team'];
$jml_ont = $_POST['jml_ont'];
$sn_ont = $_POST['sn_ont'];
$jml_roset = $_POST['jml_roset'];
$pjg_kbl = $_POST['pjg_kbl'];
$jml_duct = $_POST['jml_duct'];
$jml_flex_pipe = $_POST['jml_flex_pipe'];
$tgl_ambil = $_POST['tgl_ambil'];

//$tgl_ambil = "2013-09-09";
$newdate = date("d-m-Y",strtotime($tgl_ambil));


function getIdTeamFromNamaTeam($nama_team){
	$q_get_id_team = mysql_query("select id_team from team where nama_team='$nama_team'");
	while($ar_get_id_team = mysql_fetch_array($q_get_id_team)){
		$id_team=$ar_get_id_team["id_team"];
	}
	return $id_team;
}


$id_team2 = getIdTeamFromNamaTeam($id_team);
$query = mysql_query("select * from pengambilanmaterial where id_team='$id_team2';");
if(mysql_num_rows > 0){
	
}else{

	/*
	Penggunaan Material itu isinya sisa Material yang diupload dari HP
	*/
	
	mysql_query("insert into penggunaanmaterial(id_team2,jumlah_ont, sn_ont, jumlah_roset, panjang_kabel, jumlah_duct, jumlah_flexible_pipe, createdate, createby) values('$id_team','$jml_ont','$sn_ont','$jml_roset','$pjg_kbl','$jml_duct','$jml_flex_pipe',NOW(), '$id_pengguna');");
	mysql_query("insert into pengambilanmaterial(id_team2,jumlah_ont, sn_ont, jumlah_roset, panjang_kabel, jumlah_duct, jumlah_flexible_pipe, createdate, createby) values('$id_team','$jml_ont','$sn_ont','$jml_roset','$pjg_kbl','$jml_duct','$jml_flex_pipe', NOW(), '$id_pengguna');");
	mysql_query("insert into materialterpakai(id_team2,jumlah_ont, sn_ont, jumlah_roset, panjang_kabel, jumlah_duct, jumlah_flexible_pipe, createdate, createby) values('$id_team',0,'$sn_ont',0,0,0,0, NOW(), '$id_pengguna');");
	mysql_query("insert into perubahantable(nama_table, id_team2, tgl_perubahan, createby, createdate) values('penggunaanmaterial','$id_team',NOW(),'$id_pengguna',NOW())");
	mysql_query("insert into log(aksi, createdate, createby) values('Awal Pengambilan Material Oleh Team',NOW(),'$id_pengguna');");
}						





?>