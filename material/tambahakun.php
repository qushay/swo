<?php
include("../connect.php");

$username = $_POST['username'];
$password = $_POST['password'];
$cpassword = $_POST['cpassword'];
$id_sto = $_POST['id_sto'];
$hak_pengguna_web = $_POST['hak_pengguna_web_tambah'];

//$tgl_ambil = "2013-09-09";
//$newdate = date("d-m-Y",strtotime($tgl_ambil));




//PEMBUAT MATERIAL DIAMBIL DARI SESSION ADMIN YANG SEDANG ONLINE

/*$insert->insertWorkOrder("insert into workorder(tgl_pembuatan,pembuat_wo,id_sto,id_team,id_area,catatan) values('$tgl_input_wo',
						'$pembuat_wo','$id_sto','$id_team','$id_area','$catatan_wo');");
*/


$query = mysql_query("select * from penggunaweb where username_pengguna_web='$username'");

//$insert->insertPenggunaWeb("insert into penggunaweb (username_pengguna_web, password_pengguna_web, id_sto, hak_pengguna_web) values ('$username','$password','$id_sto','$hak_pengguna_web');");
//$insert->insertPenggunaWeb("insert into penggunaweb (username_pengguna_web, password_pengguna_web, id_sto, hak_pengguna_web) values ('dorama','dora',1,'super admin');");						
//$query2 = mysql_query("insert into penggunaweb (username_pengguna_web, password_pengguna_web, id_sto, hak_pengguna_web) values ('dorama','dora',1,'super admin');");


if ($username != ""){
	//$query2 = mysql_query("insert into penggunaweb (username_pengguna_web, password_pengguna_web, id_sto, hak_pengguna_web) values ('dorama','dora',1,'super admin');");
	mysql_query("insert into penggunaweb (username_pengguna_web, password_pengguna_web, id_sto, hak_pengguna_web) values ('$username','$password','$id_sto','$hak_pengguna_web');");
}
?>