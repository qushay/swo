<?

Class DataPelanggan{
	
	public function getData(){
		$datalain="datalain";
		return $datalain;
	}
	
	
	public function setDataPelanggan($id_pelanggan,$id_wo,$id_sto,$id_area,$nama_pelanggan,$nomor_pelanggan,$alamat_pelanggan,$keluarahan_pelanggan,$kecamatan_pelanggan, $kota_kabupaten_pelanggan, $kodepos_pelanggan, $pembuat_pengguna_pelanggan){
		
		$dataPelanggan[0] = $id_pelanggan;
		$dataPelanggan[1] = $id_wo;
		return $dataPelanggan;	
	}
	
	public function getDatafromPelanggan(){
		$data=mysql_query("select * from pelanggan;");
		return $data;
	}
	
	public function insertIntoPelanggan(){
		mysql_query("insert into sto values(1,'dora','dora');");
	}

	public function updatePelanggan($id_pelanggan){
		mysql_query("update sto set nama_sto='$id_pelanggan' where nama_sto='dora' ;");
	}
	
		
}

?>
