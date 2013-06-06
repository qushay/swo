<?php
include("connect.php");


$id_area=$_GET['idarea'];
//$id_area=1;
//$sql = mysql_query("select * from workorder where id_area='$id_area'");
//$sql=mysql_query("select id_wo, tgl_pembuatan, pembuat_wo, id_sto, id_team, id_area, catatan from workorder where id_area='$id_area';");
$sql=mysql_query("select * from workorder where id_area='$id_area';");

if(mysql_num_rows($sql) > 0){
	$response["workorder"] = array();
	while($row=mysql_fetch_array($sql)){
		//$output[]=$row["id_material"];

		$product = array();
		$product["id_wo"] = $row["id_wo"];
		$product["tgl_pembuatan"] = $row["tgl_pembuatan"];
		$product["pembuat_wo"] = $row["pembuat_wo"];
		$product["id_sto"] = $row["id_sto"];
		$product["id_team"] = $row["id_team"];
		$product["id_area"] = $row["id_area"];
		$product["catatan"] = $row["catatan"];
		array_push($response["workorder"],$product);
	}
	$response["success"]=1;
	print(json_encode($response));

}else{
	$response["success"]=0;
	print(json_encode($response));
}

mysql_close();

?>
