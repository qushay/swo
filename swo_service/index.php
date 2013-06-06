<?
require_once("DataPelanggan.php");
require_once("MySQLConnect.php");	
require_once("DataUpdate.php");

$dp =& new DataPelanggan();
$connect =& new MySQLConnect();
$update =& new DataUpdate();

$datapelanggan = $dp->setDataPelanggan("bagas","kebumen","bagas","kebumen","bagas","kebumen","bagas","kebumen","bagas","kebumen","bagas","kebumen");
echo $datapelanggan[0];

/*
echo "cek konek adalah : ".$connect->checkConnect();
$cekconnect = $connect->checkConnect();
for ($i=0;$i<5;$i++){
	if ( $connect->checkConnect() == true){
		echo "1";
	}else{
		echo "0";
	}
	
}
*/

$connect->checkConnect();
$query_up_sto = "update sto set nama_sto='intibaru' where id_sto=1";
$update->updateSTO($query_up_sto);

?>