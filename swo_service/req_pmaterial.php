<?php
include("connect.php");


$id_penggunaan_material=$_GET['id_penggunaan_material'];
//$id_material=1;
//$sql = mysql_query("select * from pelanggan where id_wo='$id_wo'");
//$sql=mysql_query("select id_penggunaan_material, id_material, id_team, serial_number_material, sisa_material, pembuat_penggunaan_material from penggunaanmaterial where id_material='$id_material';");

$sql=mysql_query("select * from penggunaanmaterial where id_penggunaan_material='$id_penggunaan_material';");

if(mysql_num_rows($sql) > 0){
	$response["penggunaanmaterial"] = array();
	while($row=mysql_fetch_array($sql)){
		//$output[]=$row["id_material"];

		$product = array();
		$product["id_penggunaan_material"] = $row["id_penggunaan_material"];
		$product["id_material"] = $row["id_material"];
		$product["id_team"] = $row["id_team"];
		$product["serial_number_material"] = $row["serial_number_material"];
		$product["sisa_material"] = $row["sisa_material"];
		//$product["pembuat_penggunaan_material"] = $row["pembuat_penggunaan_material"];
		array_push($response["penggunaanmaterial"],$product);
	}
	$response["success"]=1;
	print(json_encode($response));

}else{
	$response["success"]=0;
	print(json_encode($response));
}

mysql_close();

?>
