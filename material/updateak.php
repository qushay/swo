<?php


include("../connect.php");

$id_pengguna_web = $_POST['id_pengguna_web'];
$username_pengguna_web = $_POST['username_pengguna_web'];
$password_pengguna_web = $_POST['password_pengguna_web'];
$id_sto = $_POST['id_sto2'];
$hak_pengguna_web = $_POST['hak_pengguna_web'];
$pembuat_pengguna_web = $_POST['pembuat_pengguna_web'];


//$tgl_ambil = "2013-09-09";
//$newdate = date("d-m-Y",strtotime($tgl_ambil));




//PEMBUAT MATERIAL DIAMBIL DARI SESSION ADMIN YANG SEDANG ONLINE

/*$insert->insertWorkOrder("insert into workorder(tgl_pembuatan,pembuat_wo,id_sto,id_team,id_area,catatan) values('$tgl_input_wo',
						'$pembuat_wo','$id_sto','$id_team','$id_area','$catatan_wo');");
*/

echo $username;						
//$insert->insertPenggunaWeb("insert into penggunaanmaterial(id_team,jumlah_ont, sn_ont, jumlah_roset, panjang_kabel, jumlah_duct, jumlah_flexible_pipe, tgl_ambil) values('$id_team','$jml_ont','$sn_ont','$jml_roset','$pjg_kbl','$jml_duct','$jml_flex_pipe','$newdate');");
//$update->updatePenggunaanMaterial("update penggunaanmaterial set jumlah_ont=100 where id_team=1;");
$update_query = "update penggunaweb set id_pengguna_web='$id_pengguna_web', username_pengguna_web='$username_pengguna_web', password_pengguna_web='$password_pengguna_web', id_sto='$id_sto', hak_pengguna_web='$hak_pengguna_web' where id_pengguna_web='$id_pengguna_web';";
mysql_query($update_query);
//mysql_query("update penggunaanmaterial set id_team='$id_team', jumlah_ont='$jml_ont', sn_ont='$sn_ont', jumlah_roset='$jml_roset', panjang_kabel='$pjg_kbl', jumlah_duct='$jml_duct', jumlah_flexible_pipe='$jml_flex_pipe', tgl_ambil='$tgl_ambil' where id_team='$id_team';");
?>