<?php
include("connect.php");


$id_team=$_POST['idteam'];

//$id_team=0;
//$sql = mysql_query("select * from pelanggan where id_wo='$id_wo'");
//$sql=mysql_query("select * from penggunaanmaterial where id_team='$id_team'");
$sql=mysql_query("select * from team");


if(mysql_num_rows($sql) > 0){
	$response["team"] = array();
	while($row=mysql_fetch_array($sql)){
		//$output[]=$row["id_material"];

		$product = array();
		$product["id_team"] = $row["id_team"];
		$product["id_sto"] = $row["id_sto"];
		$product["nama_team"] = $row["nama_team"];
		$product["pembuat_area"] = $row["pembuat_area"];
		array_push($response["team"],$product);
	}
	$response["success"]=1;
	print(json_encode($response));

}else{
	$response["success"]=0;
	print(json_encode($response));
}

	

//print(json_encode($response));



mysql_close();

?>
