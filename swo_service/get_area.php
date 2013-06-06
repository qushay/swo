<?php
include("connect.php");

$id_area=$_GET['idarea'];
//$id_area=1;
//$sql = mysql_query("select * from workorder where id_area='$id_area'");
//$sql=mysql_query("select id_wo, tgl_pembuatan, pembuat_wo, id_sto, id_team, id_area, catatan from workorder where id_area='$id_area';");
//$sql=mysql_query("select * from workorder where id_area='$id_area';");

$sql=mysql_query("select * from area;");
if(mysql_num_rows($sql) > 0){
	$response["area"] = array();
	while($row=mysql_fetch_array($sql)){
		//$output[]=$row["id_material"];

		$product = array();
		$product["id_area"] = $row["id_area"];
		$product["id_team"] = $row["id_team"];
		$product["nama_area"] = $row["nama_area"];
		$product["pembuat_area"] = $row["pembuat_area"];
		array_push($response["area"],$product);
	}
	$response["success"]=1;
	print(json_encode($response));

}else{
	$response["success"]=0;
	print(json_encode($response));
}

mysql_close();

?>
