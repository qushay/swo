<?
require_once("MySQLConnect.php");

Class DataUpdate{
	public function __construct(){
		echo "konstruktor";
		//$connect =& MySQLConnect();	
	}
	
	public function updateSTO($query){
		mysql_query($query);
	}
	
	public function updateArea($query){
		mysql_query($query);
	}

	public function updateMaterial($query){
		mysql_query($query);
	}	

	public function updatePelanggan($query){
		mysql_query($query);
	}
	
	public function updatePengerjaanWO($query){
		mysql_query($query);
	}
	
	public function updatePenggunaanMaterial($query){
		mysql_query($query);
	}
	
	public function updatePenggunaDevice($query){
		mysql_query($query);
	}
	
	public function updatePenggunaWeb($query){
		mysql_query($query);
	}
	
	public function updatePenggunaTable($query){
		mysql_query($query);
	}
	
	public function updateTeam($query){
		mysql_query($query);
	}
	
	public function updateWOInstalasi($query){
		mysql_query($query);
	}
	
	public function updateWOMigrasi($query){
		mysql_query($query);
	}
	public function updateWorkOrder($query){
		mysql_query($query);
	}
	
}
?>