<?php

include("../connect.php");

$id_pengguna_device = $_POST['id_pengguna_device'];
$username_pengguna_device = $_POST['username_pengguna_device'];
$password_pengguna_device = $_POST['password_pengguna_device'];
$id_sto = $_POST['id_sto2'];
$id_team = $_POST['id_team2'];
$id_area = $_POST['id_area2'];

$pembuat_pengguna_web = $_POST['pembuat_pengguna_web'];

$get_id_sto = mysql_query("select id_sto from sto where nama_sto='$id_sto';");
while($ar_get_id_sto = mysql_fetch_array($get_id_sto)){
	$id_sto3 = $ar_get_id_sto["id_sto"];
}


if ($cpassword==$password){
	$check = 1;
}else{
	$check = 0;
}


$update_query = "update penggunadevice set username_pengguna_device='$username_pengguna_device', password_pengguna_device='$password_pengguna_device', id_sto='$id_sto3', id_area='$id_area' where id_pengguna_device='$id_pengguna_device';";
mysql_query($update_query);

?>