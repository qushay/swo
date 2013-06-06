<?php
include("connect.php");


$sql=mysql_query("select * from perubahantable;");
if(mysql_num_rows($sql) > 0){
	$response["perubahantable"] = array();
	while($row=mysql_fetch_array($sql)){
		

		$product = array();
		$product["id_perubahan"] = $row["id_perubahan"];
		$product["nama_table"] = $row["nama_table"];
		$product["tgl_perubahan"] = $row["tgl_perubahan"];
		array_push($response["perubahantable"],$product);
	}
	$response["success"]=1;
	print(json_encode($response));

}else{
	$response["success"]=0;
	print(json_encode($response));
}

mysql_close();

?>
