<?php
include("../connect.php");


$nama_team = $_POST['nama_team2'];
$nama_anggotateam = $_POST['nama_anggotateam2'];
$no_hp = $_POST['nohp2'];
$email = $_POST['email2'];
$jabatan = $_POST['jabatan2'];
$id_sto = $_POST['id_sto2'];
$id_anggotateam2 = $_POST['id_anggotateam2'];

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
	//$insert =mysql_query("insert into anggotateam(id_team, id_sto, nama_anggotateam, jabatan_anggotateam, no_telpon, email) values ('$id_team2','$id_sto2','$nama_anggotateam','$jabatan','$no_hp','$email');");
	$update = mysql_query("update anggotateam set nama_anggotateam='$nama_anggotateam', jabatan_anggotateam='$jabatan', no_telpon='$no_hp', email='$email' where id_sto='$id_sto2' and id_team='$id_team2' and id_anggotateam='$id_anggotateam2';");
		
}


?>