<?php
include("connect.php");

$id_team = $_POST['id_team2'];
$jml_ont = $_POST['jml_ont2'];
$sn_ont = $_POST['sn_ont2'];
$jml_roset = $_POST['jml_roset2'];
$pjg_kbl = $_POST['pjg_kbl2'];
$kabel_50 = $_POST['kabel_502'];
$kabel_75 = $_POST['kabel_752'];
$kabel_100 = $_POST['kabel_1002'];
$jml_duct = $_POST['jml_duct2'];
$jml_flex_pipe = $_POST['jml_flex_pipe2'];
$tgl_ambil = $_POST['tgl_ambil2'];
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

$query = mysql_query("select * from pengambilanmaterial where id_team='$id_team';");
while($rows=mysql_fetch_array($query)){
	$temp_jml_ont = $rows["jumlah_ont"] + $jml_ont;
	//$temp_sn_ont = $rows["sn_ont"] + $sn_ont;
	$temp_jml_roset = $rows["jumlah_roset"] + $jml_roset;
	/*$temp_pjg_kbl = $rows["panjang_kabel"] + $pjg_kbl;*/
	$temp_kabel_50 = $rows["kabel_50"] + $kabel_50;
	$temp_kabel_75 = $rows["kabel_75"] + $kabel_75;
	$temp_kabel_100 = $rows["kabel_100"] + $kabel_100;	
	$temp_jml_duct = $rows["jumlah_duct"] + $jml_duct;
	$temp_jml_flex_pipe = $rows["jumlah_flexible_pipe"] + $jml_flex_pipe;
}


$query2 = mysql_query("select * from penggunaanmaterial where id_team='$id_team';");
while($rows=mysql_fetch_array($query2)){
	$temp_jml_ont2 = $rows["jumlah_ont"] + $jml_ont;
	//$temp_sn_ont2 = $rows["sn_ont"] + $sn_ont;
	$temp_jml_roset2 = $rows["jumlah_roset"] + $jml_roset;
/*	$temp_pjg_kbl2 = $rows["panjang_kabel"] + $pjg_kbl;*/
	$temp_kabel_502 = $rows["kabel_50"] + $kabel_50;
	$temp_kabel_752 = $rows["kabel_75"] + $kabel_75;
	$temp_kabel_1002 = $rows["kabel_100"] + $kabel_100;
	$temp_jml_duct2 = $rows["jumlah_duct"] + $jml_duct;
	$temp_jml_flex_pipe2 = $rows["jumlah_flexible_pipe"] + $jml_flex_pipe;
}

if(mysql_num_rows($query) > 0){
	mysql_query("update pengambilanmaterial set jumlah_ont='$temp_jml_ont', sn_ont='$sn_ont', jumlah_roset='$temp_jml_roset', kabel_50='$temp_kabel_50', kabel_75='$temp_kabel_75', kabel_100='$temp_kabel_100', jumlah_duct='$temp_jml_duct', jumlah_flexible_pipe='$temp_jml_flex_pipe', updatedate=NOW(), updateby='$id_pengguna' where id_team='$id_team'");
	mysql_query("update penggunaanmaterial set jumlah_ont='$temp_jml_ont2', sn_ont='$sn_ont', jumlah_roset='$temp_jml_roset2', kabel_50='$temp_kabel_502', kabel_75='$temp_kabel_752', kabel_100='$temp_kabel_1002', jumlah_duct='$temp_jml_duct2', jumlah_flexible_pipe='$temp_jml_flex_pipe2', updatedate=NOW(), updateby='$id_pengguna' where id_team='$id_team'");
	mysql_query("update perubahantable set tgl_perubahan=NOW(), updatedate=NOW(), updateby='$id_pengguna' where id_team='$id_team';");
	mysql_query("insert into log(aksi,createby, createdate) values('Penambahan Material oleh Salah Satu Team','$id_pengguna',NOW());");
}						


?>