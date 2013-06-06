<?
	Class MySQLConnect{
		public function isMySQLSelectDB(){
			$selectdb=mysql_select_db("swo");
			if ($selectdb){
				return true;
			}else{
				return false;
			}
		}

		
		public function isConnect(){
			$connect = mysql_connect("tito.shaffindo.com","shafocom_pemilik","shaff512");
			if ($connect){
				return true;
			}else{
				return false;
			}				
		}
		
		public function checkConnect(){
			$check = ($this->isConnect() && $this->isMySQLSelectDB());
			return $check;
		}
		
		public function getPelanggan($query){
			$data = mysql_query($query);
			
			return $data;
		}

	}
?>