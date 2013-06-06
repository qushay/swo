<?php
include("../connect.php");

$id_team = $_POST['id_teamr'];
$jml_ont = $_POST['jml_ontr'];
$sn_ont = $_POST['sn_ontr'];
$jml_roset = $_POST['jml_rosetr'];
$pjg_kbl = $_POST['pjg_kblr'];
$jml_duct = $_POST['jml_ductr'];
$jml_flex_pipe = $_POST['jml_flex_piper'];
$tgl_ambil = $_POST['tgl_ambilr'];

//$tgl_ambil = "2013-09-09";
$newdate = date("d-m-Y",strtotime($tgl_ambil));



$query = mysql_query("select * from pengambilanmaterial where id_team='$id_team';");
while($rows=mysql_fetch_array($query)){
	$temp_jml_ont = $rows["jumlah_ont"] - $jml_ont;
	$temp_sn_ont = $rows["sn_ont"] - $sn_ont;
	$temp_jml_roset = $rows["jumlah_roset"] - $jml_roset;
	$temp_pjg_kbl = $rows["panjang_kabel"] - $pjg_kbl;
	$temp_jml_duct = $rows["jumlah_duct"] - $jml_duct;
	$temp_jml_flex_pipe = $rows["jumlah_flexible_pipe"] - $jml_flex_pipe;
}


$query2 = mysql_query("select * from penggunaanmaterial where id_team='$id_team';");
while($rows=mysql_fetch_array($query2)){
	$temp_jml_ont2 = $rows["jumlah_ont"] - $jml_ont;
	$temp_sn_ont2 = $rows["sn_ont"] - $sn_ont;
	$temp_jml_roset2 = $rows["jumlah_roset"] - $jml_roset;
	$temp_pjg_kbl2 = $rows["panjang_kabel"] - $pjg_kbl;
	$temp_jml_duct2 = $rows["jumlah_duct"] - $jml_duct;
	$temp_jml_flex_pipe2 = $rows["jumlah_flexible_pipe"] - $jml_flex_pipe;
}
//$jml_ont = $jml_ont + $temp_jml_ont;
//$jml_ont = 1;

//mysql_query("update penggunaanmaterial set jumlah_ont='$id_team' where id_team=7;");
if(mysql_num_rows($query) > 0){
	//mysql_query("update penggunaanmaterial set jumlah_ont=10 where id_team=7;");
	mysql_query("update pengambilanmaterial set jumlah_ont='$temp_jml_ont', jumlah_roset='$temp_jml_roset', panjang_kabel='$temp_pjg_kbl', jumlah_duct='$temp_jml_duct', jumlah_flexible_pipe='$temp_jml_flex_pipe' where id_team='$id_team'");
	
	mysql_query("update penggunaanmaterial set jumlah_ont='$temp_jml_ont2', jumlah_roset='$temp_jml_roset2', panjang_kabel='$temp_pjg_kbl2', jumlah_duct='$temp_jml_duct2', jumlah_flexible_pipe='$temp_jml_flex_pipe2' where id_team='$id_team'");
}else{
	//$insert->insertPenggunaWeb("insert into penggunaanmaterial(id_team,jumlah_ont, sn_ont, jumlah_roset, panjang_kabel, jumlah_duct, jumlah_flexible_pipe) values('$id_team','$jml_ont','$sn_ont','$jml_roset','$pjg_kbl','$jml_duct','$jml_flex_pipe');");
	//mysql_query("update penggunaanmaterial set jumlah_ont='$jml_ont+$temp_jml_ont', jumlah_roset='$jml_roset+temp_jml_roset', panjang_kabel='$pjg_kbl+temp_pjg_kbl' jumlah_duct='jml_duct+temp_jml_duct', jumlah_flexible_pipe='$jml_flex_pipe+temp_jml_flex_pipe' where id_team='$id_team'");
	//mysql_query("update penggunaanmaterial set jumlah_ont=10, jumlah_roset='$temp_jml_roset', panjang_kabel='$temp_pjg_kbl' jumlah_duct='$temp_jml_duct', jumlah_flexible_pipe='$temp_jml_flex_pipe' where id_team='$id_team'");
	//mysql_query("update penggunaanmaterial set jumlah_ont='$jml_ont' where id_team=id_team;");
}						


?>