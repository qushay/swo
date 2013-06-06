<?php
include("../connect.php");


$id_team = $_POST['id_team2'];
$nama_team = $_POST['nama_team2'];
$id_sto = $_POST['id_sto2'];
$createby = $_POST['createby'];
$createdate = $_POST['createdate'];
$updateby = $_POST['updateby'];
$updatedate = $_POST['updatedate'];
$isactive = $_POST['isactive'];


//$query = mysql_query("select * from penggunaweb where username_pengguna_web='$username'");

$get_id_sto = mysql_query("select id_sto from sto where nama_sto='$id_sto';");
while($ar_get_id_sto = mysql_fetch_array($get_id_sto)){
	$id_sto3 = $ar_get_id_sto["id_sto"];
}




if ($nama_team != ""){
	$insert =mysql_query("update team set nama_team='$nama_team', id_sto='$id_sto3' where id_team='$id_team';");

	//$insert =mysql_query("insert into penggunadevice(username_pengguna_device, password_pengguna_device, id_sto, id_team, id_area) values ('juanda','tes',2,2,2);");	
}


?>