<?php
session_start();
include("connect.php");


$username = $_GET['username'];

//$username="tes";
$sql=mysql_query("select * from penggunadevice where username_pengguna_device='$username';");

if(mysql_num_rows($sql) > 0){
	$response["penggunadevice"] = array();
	while($row=mysql_fetch_array($sql)){
		//$output[]=$row["id_material"];

		$product = array();
		$product["password_pengguna_device"] = $row["password_pengguna_device"];
		$password = $row["password_pengguna_device"];

		//membuat session untuk android
		$id_pengguna_device = $row["id_pengguna_device"];
		$_SESSION["id_pengguna_device"] = $id_pengguna_device;

		array_push($response["penggunadevice"],$product);
	}
	
	$_SESSION['username_pengguna_device'] = $id_pengguna_device;
	
	
	$response["success"]=1;
	print(json_encode($response));

}else{
	$response["success"]=0;
	print(json_encode($response));
}



mysql_close();

?>
