<?php
include("../connect.php");

$username = $_POST['username'];
$password = $_POST['password'];
$cpassword = $_POST['cpassword'];
$id_team = $_POST['id_team'];
$id_sto = $_POST['id_sto'];
$id_area = $_POST['id_area'];

$get_id_sto = mysql_query("select id_sto from sto where nama_sto='$id_sto';");
while($ar_get_id_sto = mysql_fetch_array($get_id_sto)){
	$id_sto2 = $ar_get_id_sto["id_sto"];
}

$hitungrows = mysql_num_rows($get_id_sto);
echo $hitungrows;

if ($cpassword==$password){
	$check = 1;
}else{
	$check = 0;
}


if ($username != "" && $check==1){
	$insert = mysql_query("insert into penggunadevice(username_pengguna_device, password_pengguna_device, id_sto, id_team, id_area) values ('$username','$password','$id_sto2','$id_team','$id_area');");

	//$insert = mysql_query("insert into penggunadevice(username_pengguna_device, password_pengguna_device, id_sto, id_team, id_area) values ('juanda','tes',2,2,2);");	
}


?>