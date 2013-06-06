<?php
include("../connect.php");


$nama_team = $_POST['nama_team'];
$nama_anggotateam = $_POST['nama_anggotateam'];
$no_hp = $_POST['nohp'];
$email = $_POST['email'];
$jabatan = $_POST['jabatan'];
$id_sto = $_POST['id_sto'];

$get_id_team = mysql_query("select id_team from team where nama_team='$nama_team';");
while($ar_get_id_team = mysql_fetch_array($get_id_team)){
	$id_team2 = $ar_get_id_team["id_team"];
}

$get_id_sto = mysql_query("select id_sto from sto where nama_sto='$id_sto';");
while($ar_get_id_sto = mysql_fetch_array($get_id_sto)){
	$id_sto2 = $ar_get_id_sto["id_sto"];
}


//$insert =mysql_query("insert into anggotateam(id_team, id_sto, nama_anggotateam, jabatan_anggotateam, no_telpon, email) values (1,1,'test','test','test','test');");
if ($nama_anggotateam != ""){
	$insert =mysql_query("insert into anggotateam(id_team, id_sto, nama_anggotateam, jabatan_anggotateam, no_telpon, email) values ('$id_team2','$id_sto2','$nama_anggotateam','$jabatan','$no_hp','$email');");
	//$insert =mysql_query("insert into anggotateam(id_team, id_sto, nama_anggotateam, jabatan_anggotateam, no_telpon, email) values ('1','1','test','test','test');");
		
}


?>