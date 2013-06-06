<?php
include("connect.php");

$id_wo=$_GET['idwo'];
//$id_wo=1;
//$sql = mysql_query("select * from workorder where id_area='$id_area'");
//$sql=mysql_query("select id_wo, tgl_pembuatan, pembuat_wo, id_sto, id_team, id_area, catatan from workorder where id_area='$id_area';");

$sql=mysql_query("select * from pengerjaanwo where id_wo='$id_wo';");
if(mysql_num_rows($sql) > 0){
	$response["pengerjaanwo"] = array();
	while($row=mysql_fetch_array($sql)){
		//$output[]=$row["id_material"];

		$product = array();
		$product["id_pengerjaanwo"] = $row["id_pengerjaanwo"];
		$product["id_wo"] = $row["id_wo"];
		$product["tipe_wo"] = $row["tipe_wo"];
		$product["status_wo"] = $row["status_wo"];
		$product["pembuat_pengerjaanwo"] = $row["pembuat_pengerjaanwo"];
		
		
		array_push($response["pengerjaanwo"],$product);
	}
	$response["success"]=1;
	print(json_encode($response));

}else{
	$response["success"]=0;
	print(json_encode($response));
}

mysql_close();

?>
