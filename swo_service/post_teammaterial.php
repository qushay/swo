<?php
include("connect.php");


$id_team=$_POST['idteam'];

//$id_team=0;
//$sql = mysql_query("select * from pelanggan where id_wo='$id_wo'");
//$sql=mysql_query("select * from penggunaanmaterial where id_team='$id_team'");
$sql=mysql_query("select * from penggunaanmaterial");


if(mysql_num_rows($sql) > 0){
	$response["material"] = array();
	while($row=mysql_fetch_array($sql)){
		//$output[]=$row["id_material"];

		$product = array();
		$product["id_penggunaan_material"] = $row["id_penggunaan_material"];
		$product["id_team"] = $row["id_team"];
		$product["jumlah_ont"] = $row["jumlah_ont"];
		$product["sn_ont"] = $row["sn_ont"];
		$product["jumlah_roset"] = $row["jumlah_roset"];
		$product["panjang_kabel"] = $row["panjang_kabel"];
		$product["jumlah_duct"] = $row["jumlah_duct"];
		$product["jumlah_flexible_pipe"] = $row["jumlah_flexible_pipe"];
		//$product["pembuat_penggunaan_material"] = $row["pembuat_penggunaan_material"];
		//$product["tgl_ambil"] = $row["tgl_ambil"];
		array_push($response["material"],$product);
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
