<?php
include("connect.php");

$username=$_POST['username'];
//$username="yy";
//$sql = mysql_query("select * from pelanggan where id_wo='$id_wo'");
//$sql=mysql_query("select password_pengguna_web from penggunaweb where username_pengguna_web='$username';");

//$username="tes";
$sql=mysql_query("select * from penggunadevice where username_pengguna_device='$username';");
if(mysql_num_rows($sql) > 0){
	$response["penggunaweb"] = array();
	while($row=mysql_fetch_array($sql)){
		//$output[]=$row["id_material"];

		$product = array();
		$product["password_pengguna_web"] = $row["password_pengguna_web"];

		array_push($response["penggunaweb"],$product);
	}
	$response["success"]=1;
	print(json_encode($response));

}else{
	$response["success"]=0;
	print(json_encode($response));
}


mysql_close();

?>
