<?php
	session_start();
	include '../session.php';
?>

<?php
include("../connect.php");
$status = $_GET['status'];
function getDataLength($status,$id_sto,$username){
	
	if ($status==1){
		
		error_reporting(E_ALL);
		ini_set('display_errors', TRUE);
		ini_set('display_startup_errors', TRUE);
		date_default_timezone_set('Europe/London');

		define('EOL',(PHP_SAPI == 'cli') ? PHP_EOL : '<br />');

		/** Include PHPExcel */
		require_once '../excel/Classes/PHPExcel.php';


		// Create new PHPExcel object
		// echo date('H:i:s') , " Create new PHPExcel object" , EOL;
		$objPHPExcel = new PHPExcel();
		$file1 = "../excelfile/".$id_sto.$username."."."xlsx";
		$file2 = "../excelfile/".$id_sto.$username."."."xls";
		echo $file1;
		if(file_exists($file1)){
			$objPHPExcel = PHPExcel_IOFactory::load($file1);
		}else{
			$objPHPExcel = PHPExcel_IOFactory::load($file2);
		}

		

		
		$i=3;
		$sum_rows = 0;
		$value = $objPHPExcel->getActiveSheet()->getCell("C3")->getValue();
		$total_data = $objPHPExcel->getActiveSheet()->getHighestRow();
		while($i<($total_data)){
			//$exvalue = $objPHPExcel->getActiveSheet()->getCell("C".$i)->getValue();
			$exid_pelanggan = $objPHPExcel->getActiveSheet()->getCell("B".$i)->getValue();
			$exid_sto = $objPHPExcel->getActiveSheet()->getCell("A".$i)->getValue();
			$exnama_pelanggan = $objPHPExcel->getActiveSheet()->getCell("C".$i)->getValue();
			$exalamat_pelanggan = $objPHPExcel->getActiveSheet()->getCell("D".$i)->getValue();
			$exnomor_rumah = $objPHPExcel->getActiveSheet()->getCell("E".$i)->getValue();
			$exprovinsi = $objPHPExcel->getActiveSheet()->getCell("F".$i)->getValue();
			$exkelurahan_pelanggan = $objPHPExcel->getActiveSheet()->getCell("G".$i)->getValue();
			$exkecamatan_pelanggan = $objPHPExcel->getActiveSheet()->getCell("H".$i)->getValue();
			$exkota_kabupaten_pelanggan = $objPHPExcel->getActiveSheet()->getCell("I".$i)->getValue();
			$exkode_pos_pelanggan = $objPHPExcel->getActiveSheet()->getCell("J".$i)->getValue();
			$exjenis_ont = $objPHPExcel->getActiveSheet()->getCell("K".$i)->getValue();
			$exdp_lama = $objPHPExcel->getActiveSheet()->getCell("L".$i)->getValue();
			$exlayanan_pots = $objPHPExcel->getActiveSheet()->getCell("M".$i)->getValue();
			$exlayanan_speedy = $objPHPExcel->getActiveSheet()->getCell("N".$i)->getValue();
			$exlayanan_iptv = $objPHPExcel->getActiveSheet()->getCell("O".$i)->getValue();
			
			if($exid_pelanggan != ""){
				mysql_query("INSERT INTO pelanggan(id_pelanggan, id_sto, nama_pelanggan, alamat_pelanggan, nomor_rumah, provinsi_pelanggan, kelurahan_pelanggan, kecamatan_pelanggan, kota_kabupaten_pelanggan, kode_pos_pelanggan, createdate, createby) 
					VALUES ('$exid_pelanggan','$exid_sto','$exnama_pelanggan','$exalamat_pelanggan','$exnomor_rumah','$exprovinsi','$exkelurahan_pelanggan','$exkecamatan_pelanggan','$exkota_kabupaten_pelanggan','$exkode_pos_pelanggan', NOW(), '$id_pengguna');");
				
				mysql_query("INSERT INTO line_pelanggan (id_pelanggan, jenis_ont, dp_lama, layanan_pots, layanan_speedy, layanan_iptv, createby, createdate, updateby, updatedate) VALUES('$exid_pelanggan', '$exjenis_ont', '$exdp_lama', '$exlayanan_pots', '$exlayanan_speedy', '$exlayanan_iptv',5,NOW(),5, NOW())");

				$sum_rows++;
			}

			$i++;
		}

		unlink($file1);
		unlink($file2);



		//$value = $objPHPExcel->getActiveSheet()->getCell("B".$i)->getValue();
		//return ($sum_rows);
		return($sum_rows);
	}else{
		/*for($test=0;$test<100;$test++){
			mysql_query("insert into testinput values('$test')");
		}*/

		return(0);
	}
}



function masukkanJatah($pelanggan, $caller, $sto, $ar_index){
	$index=1;
	$index2=0;

	while($index<=count($pelanggan)){
		$fix_caller = $caller[$index2];
		$fix_index = $ar_index[$index-1];
		mysql_query("update pelanggan p set p.id_caller='$fix_caller' where id_sto='$sto' and p.index='$fix_index';");
		//mysql_query("insert into testinput values('$index')");
		
		$index++;
		$index2++;
		
		$check = cekJumlah($index2,count($caller));
		if($check==true){
			$index2=0;
		}
	}
											
	//mysql_query("update pelanggan set id_caller=null;");
	//mysql_query("delete id_caller from pelanggan");
}

function cekJumlah($jumlah, $jumlah_sebenarnya){
	if($jumlah==$jumlah_sebenarnya){
		return true;
	}else{
		return false;
	}
}

function setPelangganCaller(){
	

	$q_get_sto = mysql_query("select id_sto from sto");
	while($rows2=mysql_fetch_array($q_get_sto)){
		$array_pelanggan = array();
		$array_caller = array();
		$array_index = array();

		$res_id_sto = $rows2["id_sto"];
		$q_get_pelanggan = mysql_query("SELECT p.index, id_sto, id_pelanggan FROM pelanggan as p WHERE id_sto='$res_id_sto';");
		$q_get_caller = mysql_query("SELECT id_pengguna_web FROM penggunaweb WHERE id_sto='$res_id_sto' AND hak_pengguna_web='call';");
		//mysql_query("insert into testinput values('$res_id_sto')");

		while($ar_get_pelanggan = mysql_fetch_array($q_get_pelanggan)){
			array_push($array_pelanggan, $ar_get_pelanggan["id_pelanggan"]);
			array_push($array_index, $ar_get_pelanggan["index"]);
			//mysql_query("insert into testinput values('$ar_get_pelanggan[index]')");
		}

		while($ar_get_caller = mysql_fetch_array($q_get_caller)){
			array_push($array_caller, $ar_get_caller["id_pengguna_web"]);
		}


		masukkanJatah($array_pelanggan, $array_caller, $res_id_sto, $array_index);
		
		
		$sum_pelanggan_for_sto = mysql_num_rows($q_get_pelanggan);
		$sum_caller_for_sto = mysql_num_rows($q_get_caller);
		//$sum_jatah = $sum_pelanggan_for_sto / $sum_caller_for_sto;

	}
	$pelcall = array();
	array_push($pelcall, $array_pelanggan);
	array_push($pelcall, $array_caller);
	return $pelcall;												
		
}

function setBackIndex(){
	$q_sum_index= mysql_query("select p.index from pelanggan p");
	$res_sum_index = mysql_num_rows($q_sum_index);
	$i=1;
	$q_get_id_pelanggan = mysql_query("select id_pelanggan from pelanggan");
	while($ar_get_id_pelanggan = mysql_fetch_array($q_get_id_pelanggan)){
		$temp_id_pelanggan = $ar_get_id_pelanggan["id_pelanggan"];
		mysql_query("update pelanggan p set p.index='$i' where p.id_pelanggan='$temp_id_pelanggan';");
		$i++;
	}


}




// echo $length;								
//getPanjangData(1);
echo "test";

getDataLength($status,$id_sto,$username);
setBackIndex();
/*	
	echo count(setPelangganCaller()[0]);
	echo " " ;
	echo count(setPelangganCaller()[1]);								
	echo setPelangganCaller()[1][5];	
*/								
setPelangganCaller();

?>

								
