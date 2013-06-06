<?php
include("../connect.php");


$id_team = $_POST['id_teamr'];
$jml_ont = $_POST['jml_ontr'];
$sn_ont = $_POST['sn_ontr'];
$jml_roset = $_POST['jml_rosetr'];
$kabel_50 = $_POST['kabel_50r'];
$kabel_75 = $_POST['kabel_75r'];
$kabel_100 = $_POST['kabel_100r'];
$jml_duct = $_POST['jml_ductr'];
$jml_flex_pipe = $_POST['jml_flex_piper'];
$tgl_ambil = $_POST['tgl_ambilr'];
?>

<?php
	session_start();
	include("../session.php");
?>

<?php
//$tgl_ambil = "2013-09-09";





//PEMBUAT MATERIAL DIAMBIL DARI SESSION ADMIN YANG SEDANG ONLINE

/*$insert->insertWorkOrder("insert into workorder(tgl_pembuatan,pembuat_wo,id_sto,id_team,id_area,catatan) values('$tgl_input_wo',
						'$pembuat_wo','$id_sto','$id_team','$id_area','$catatan_wo');");
*/


$query = mysql_query("select * from pengambilanmaterial where id_team='$id_team';");
while($rows=mysql_fetch_array($query)){
	$temp_jml_ont = $rows["jumlah_ont"] - $jml_ont;
	$temp_sn_ont = $rows["sn_ont"] - $sn_ont;
	$temp_jml_roset = $rows["jumlah_roset"] - $jml_roset;
	$temp_kabel_50 = $rows["kabel_50"] - $kabel_50;
	$temp_kabel_75 = $rows["kabel_75"] - $kabel_75;
	$temp_kabel_100 = $rows["kabel_100"] - $kabel_100;	
	$temp_jml_duct = $rows["jumlah_duct"] - $jml_duct;
	$temp_jml_flex_pipe = $rows["jumlah_flexible_pipe"] - $jml_flex_pipe;
}


$query2 = mysql_query("select * from penggunaanmaterial where id_team='$id_team';");
while($rows=mysql_fetch_array($query2)){
	$temp_jml_ont2 = $rows["jumlah_ont"] - $jml_ont;
	$temp_sn_ont2 = $rows["sn_ont"] - $sn_ont;
	$temp_jml_roset2 = $rows["jumlah_roset"] - $jml_roset;
	$temp_kabel_502 = $rows["kabel_50"] - $kabel_50;
	$temp_kabel_752 = $rows["kabel_75"] - $kabel_75;
	$temp_kabel_1002 = $rows["kabel_100"] - $kabel_100;
	$temp_jml_duct2 = $rows["jumlah_duct"] - $jml_duct;
	$temp_jml_flex_pipe2 = $rows["jumlah_flexible_pipe"] - $jml_flex_pipe;
}
//$jml_ont = $jml_ont + $temp_jml_ont;
//$jml_ont = 1;

//mysql_query("update penggunaanmaterial set jumlah_ont='$id_team' where id_team=7;");
if(mysql_num_rows($query) > 0){
	//mysql_query("update penggunaanmaterial set jumlah_ont=10 where id_team=7;");
	mysql_query("update pengambilanmaterial set jumlah_ont='$temp_jml_ont', jumlah_roset='$temp_jml_roset', kabel_50='$temp_kabel_50', kabel_75='$temp_kabel_75', kabel_100='$temp_kabel_100', jumlah_duct='$temp_jml_duct', jumlah_flexible_pipe='$temp_jml_flex_pipe', updateby = '$id_pengguna', updatedate=NOW() where id_team='$id_team'");
	
	mysql_query("update penggunaanmaterial set jumlah_ont='$temp_jml_ont2', jumlah_roset='$temp_jml_roset2', kabel_50='$temp_kabel_502', kabel_75='$temp_kabel_752', kabel_100 = '$temp_kabel_1002', jumlah_duct='$temp_jml_duct2', jumlah_flexible_pipe='$temp_jml_flex_pipe2', updateby = '$id_pengguna', updatedate=NOW() where id_team='$id_team'");
}else{
	//$insert->insertPenggunaWeb("insert into penggunaanmaterial(id_team,jumlah_ont, sn_ont, jumlah_roset, panjang_kabel, jumlah_duct, jumlah_flexible_pipe) values('$id_team','$jml_ont','$sn_ont','$jml_roset','$pjg_kbl','$jml_duct','$jml_flex_pipe');");
	//mysql_query("update penggunaanmaterial set jumlah_ont='$jml_ont+$temp_jml_ont', jumlah_roset='$jml_roset+temp_jml_roset', panjang_kabel='$pjg_kbl+temp_pjg_kbl' jumlah_duct='jml_duct+temp_jml_duct', jumlah_flexible_pipe='$jml_flex_pipe+temp_jml_flex_pipe' where id_team='$id_team'");
	//mysql_query("update penggunaanmaterial set jumlah_ont=10, jumlah_roset='$temp_jml_roset', panjang_kabel='$temp_pjg_kbl' jumlah_duct='$temp_jml_duct', jumlah_flexible_pipe='$temp_jml_flex_pipe' where id_team='$id_team'");
	//mysql_query("update penggunaanmaterial set jumlah_ont='$jml_ont' where id_team=id_team;");
}						


?>