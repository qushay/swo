<?php 

$get_dataaa=new get_data();
// session_start();
if(isset($_GET['op'])){
    $op = $_GET['op']; 
    switch ($op) {
        case 'get_log':
            $get_dataaa->getLog($_GET['date']);
            break;
        
        default:
            # code...
            break;
    }
    
}

class get_data {
    private $db_read;

    function __construct() {
        require_once '../include/DB_Functions_Read.php';
        // connect ke database
        $this->db_read = new DB_Functions_Read();
        
    }

    // destructor
    function __destruct() {
        
    }
    
    public function getLog($date){
        $myDateTime = DateTime::createFromFormat('m/d/Y', $date);
        $newDateString = $myDateTime->format('Y-m-d'); 
        $d = mysql_query("SELECT l.aksi,l.createdate,pw.nama 
            FROM log AS l, penggunaweb AS pw 
            WHERE l.createby=pw.id_pengguna_web
             AND DATE(l.createdate)='$newDateString'");
        while($data=mysql_fetch_array($d)){ 
            echo "<tr>";
            echo "    <td>".$data['createdate']."</td>";
            echo "    <td>".$data['aksi']."</td>";
            echo "    <td>".$data['nama']."</td>";
            echo "</tr>";
        } 
    }
    

}
?> 

