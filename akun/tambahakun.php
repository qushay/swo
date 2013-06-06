<?php
include("../connect.php");
?>

<?php
	session_start();
	include("../session.php");
?>

<?php
$nama = $_POST['nama'];
$username = $_POST['username'];
$password = $_POST['password'];
$cpassword = $_POST['cpassword'];
$id_sto = $_POST['id_sto'];
$hak_pengguna_web = $_POST['hak_pengguna_web_tambah'];
?>



<?php

echo "Test";
$get_id_sto = mysql_query("select id_sto from sto where nama_sto='$id_sto';");
while($ar_get_id_sto = mysql_fetch_array($get_id_sto)){
	$id_sto2 = $ar_get_id_sto["id_sto"];
}

if ($cpassword==$password){
	$check = 1;
}else{
	$check = 0;
}



if ($username != "" && $check==1){
	$insert =mysql_query("insert into penggunaweb (nama, username_pengguna_web, password_pengguna_web, id_sto, hak_pengguna_web, createdate, createby) values ('$nama', '$username','$password','$id_sto2','$hak_pengguna_web', NOW(), $id_pengguna);");	
}

if($hak_pengguna_web=="call"){
	//setNullIdCaller();
	setNullIdCaller();
	setBackIndex();
	setPelangganCaller();
}



	function masukkanJatah($pelanggan, $caller, $sto, $ar_index){
		$index=1;
		$index2=0;
		while($index<=count($pelanggan)){
			$fix_caller = $caller[$index2];
			$fix_index = $ar_index[$index-1];
			mysql_query("update pelanggan p set p.id_caller='$fix_caller' where id_sto='$sto' and p.index='$fix_index';");
			mysql_query("insert into testinput values('$index')");
			
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


	function checktoWOInstalasi($id_pelanggan){
		$q_get_id_pelanggan_on_woin = mysql_query("select $id_pelanggan from woinstalasi where status_instalasi NOT IN ('mulai','proses','selesai') AND id_pelanggan=".$id_pelanggan.";");
		$jumrows = mysql_num_rows($q_get_id_pelanggan_on_woin);
		if($jumrows > 0){
			return 1;
		}else{
			return 0;
		}
	}


	function setNullIdCaller(){

		$q_get_pelanggan = mysql_query("select id_pelanggan from pelanggan;");
		while($rows = mysql_fetch_array($q_get_pelanggan,MYSQL_ASSOC)){
				$check = checktoWOInstalasi($rows["id_pelanggan"]);
				echo $check."<br>";
				if($check==0){
					$q_set_null_id_caller = mysql_query("update pelanggan set id_caller=NULL where id_pelanggan=".$rows["id_pelanggan"].";");					
				}
			
		}

	}
	

?>