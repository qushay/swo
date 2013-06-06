<?php
include("connect.php");

$id_team=$_GET['id_team'];

$sql=mysql_query("select * from perubahantable where id_team='$id_team';");


if(mysql_num_rows($sql) > 0){
	$response["perubahantable"] = array();
	while($row=mysql_fetch_array($sql)){
		//$output[]=$row["id_material"];

		$product = array();
		$product["updatedate"] = $row["updatedate"];
		$product["nama_table"] = $row["nama_table"];
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
