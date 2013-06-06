<?php
include("../connect.php");

$id_team = $_POST['id_team'];
$jml_ont = $_POST['jml_ont'];
$sn_ont = $_POST['sn_ont'];
$jml_roset = $_POST['jml_roset'];
$pjg_kbl = $_POST['pjg_kbl'];
$jml_duct = $_POST['jml_duct'];
$jml_flex_pipe = $_POST['jml_flex_pipe'];
$tgl_ambil = $_POST['tgl_ambil'];



echo $username;						
//$insert->insertPenggunaWeb("insert into penggunaanmaterial(id_team,jumlah_ont, sn_ont, jumlah_roset, panjang_kabel, jumlah_duct, jumlah_flexible_pipe, tgl_ambil) values('$id_team','$jml_ont','$sn_ont','$jml_roset','$pjg_kbl','$jml_duct','$jml_flex_pipe','$newdate');");
//$update->updatePenggunaanMaterial("update penggunaanmaterial set jumlah_ont=100 where id_team=1;");
mysql_query("update penggunaanmaterial set id_team='$id_team', jumlah_ont='$jml_ont', sn_ont='$sn_ont', jumlah_roset='$jml_roset', panjang_kabel='$pjg_kbl', jumlah_duct='$jml_duct', jumlah_flexible_pipe='$jml_flex_pipe' where id_team='$id_team';");
?>