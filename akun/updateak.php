<?php

 include("../connect.php");
?>

<?php
	session_start();
	if (!isset($_SESSION['username'])){
		header('Location: http://localhost/swo/');
	}else{
		//$username=$_SESSION['username'];
		//$id_sto=$_SESSION['id_sto'];
		$id_pengguna=$_SESSION['id_pengguna_web'];
		//$hak=$_SESSION['hak'];
	}
?>


<?php


$id_pengguna_web = $_POST['id_pengguna_web'];
$username_pengguna_web = $_POST['username_pengguna_web'];
$password_pengguna_web = $_POST['password_pengguna_web'];
$id_sto = $_POST['id_sto2'];
$hak_pengguna_web = $_POST['hak_pengguna_web'];
$pembuat_pengguna_web = $_POST['pembuat_pengguna_web'];
$nama_tambah = $_POST['nama_tambah'];




$get_id_sto = mysql_query("select id_sto from sto where nama_sto='$id_sto';");
while($ar_get_id_sto = mysql_fetch_array($get_id_sto)){
	$id_sto2 = $ar_get_id_sto["id_sto"];
}


if ($cpassword==$password){
	$check = 1;
}else{
	$check = 0;
}

echo $username;						

$update_query = "update penggunaweb set id_pengguna_web='$id_pengguna_web', nama='$nama_tambah', username_pengguna_web='$username_pengguna_web', password_pengguna_web='$password_pengguna_web', id_sto='$id_sto2', hak_pengguna_web='$hak_pengguna_web', updatedate=NOW(), updateby='$id_pengguna' where id_pengguna_web='$id_pengguna_web';";
mysql_query($update_query);

?>