<?php
include("connect.php");

//$bank_id=$_REQUEST['bank_id'];
//$phone_number = $_REQUEST['phone_number'];
//$customer_name = $_POST['cust_name'];

//$customer_name = "ABED";

//$sql=mysql_query("select artno, desc1, net_price from pod ");
//select cust from cust_01 where cust='ABED'

//$sql=mysql_query("select cust from cust_01 where cust= '$customer_name' ");

$id_sto=$_GET['id_sto'];
$id_sto=1;
//$sql=mysql_query("select id_sto, nama_sto, pembuat_sto from sto where id_sto='$id_sto';");
$sql=mysql_query("select * from sto where id_sto='$id_sto';");

if(mysql_num_rows($sql) > 0){
	$response["sto"] = array();
	while($row=mysql_fetch_array($sql)){
		//$output[]=$row["id_material"];

		$product = array();
		$product["id_sto"] = $row["id_sto"];
		$product["nama_sto"] = $row["nama_sto"];
		//$product["pembuat_sto"] = $row["pembuat_sto"];
		array_push($response["sto"],$product);
	}
	$response["success"]=1;
	print(json_encode($response));

}else{
	$response["success"]=0;
	print(json_encode($response));
}

//print(json_encode($output));



mysql_close();

?>
