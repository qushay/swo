<?php 
$get_dataaa=new get_data();
session_start();  ///// cek status session

/////////////////////////////////////////////////// jika sesion ada isinya
if(isset($_SESSION)){
    $id_pengguna=$_SESSION['id_pengguna_web'];
    $hak=$_SESSION['hak'];
    if ($hak!="super"){
        $id_sto=$_SESSION['id_sto'];
    }else{
        if (isset($_GET['sto'])){
            $id_sto=$_GET['sto'];
        }else{
            $id_sto="";
        }
    }

    /////////////////////////// GET value OP
    if (isset($_GET['op'])){
        $op=$_GET['op'];

        switch ($op) {
            case 'get_grafik':
               $get_dataaa->getGrafik_bySTO($id_sto);
                break;
            default:
                # code...
                break;
        }
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
    
    public function getGrafik_bySTO($sto){
        function CountIKR($odc,$sto){
            $result_ikr=mysql_query("SELECT DISTINCT(lp.id_pelanggan)
                FROM woinstalasi AS wi, line_pelanggan AS lp
                WHERE wi.id_pelanggan=lp.id_pelanggan AND lp.odc='$odc' AND wi.id_sto='$sto'
                GROUP BY lp.id_pelanggan");
            $jml_ikr=mysql_num_rows($result_ikr);
            if ($jml_ikr<=0){
                return 0;
            }else{
                return $jml_ikr;
            }
        }

        function CountMigrasi($odc,$sto){
            $result_migrasi=mysql_query("SELECT DISTINCT(lp.id_pelanggan)
                FROM womigrasi AS wm, line_pelanggan AS lp
                WHERE wm.id_pelanggan=lp.id_pelanggan AND lp.odc ='$odc' AND wm.id_sto='$sto'
                GROUP BY lp.id_pelanggan");
            $jml_migrasi=mysql_num_rows($result_migrasi);
            if ($jml_migrasi<=0){
                return 0;
            }else{
                return $jml_migrasi;
            }
        }
        function CountPelanggan($odc,$sto){
            $result_pelanggan=mysql_query("SELECT DISTINCT(lp.id_pelanggan)
                FROM line_pelanggan AS lp, pelanggan AS p
                WHERE lp.id_pelanggan=p.id_pelanggan AND lp.odc ='$odc' AND p.id_sto='$sto'
                GROUP BY lp.id_pelanggan");
            $jml_pelanggan=mysql_num_rows($result_pelanggan);
            if ($jml_pelanggan<=0){
                return 0;
            }else{
                return $jml_pelanggan;
            }
        }

        echo '<div id="horizontal-bar-div" 
                style="height:300px;width:100%;" 
                data-value="';
            echo "[[[".CountIKR('FAA',$sto).",'FAA'],[".CountIKR('FAM',$sto).",'FAM'],[".CountIKR('FAN',$sto).",'FAN'], [".CountIKR('FBD',$sto).",'FBD'], [".CountIKR('FRD',$sto).",'FRD'], [".CountIKR('FRN',$sto).",'FRN']],

                    [[".CountMigrasi('FAA',$sto).",'FAA'],[".CountMigrasi('FAM',$sto).",'FAM'],[".CountMigrasi('FAN',$sto).",'FAN'], [".CountMigrasi('FBD',$sto).",'FBD'], [".CountMigrasi('FRD',$sto).",'FRD'], [".CountMigrasi('FRN',$sto).",'FRN']],

                    [[".CountPelanggan('FAA',$sto).",'FAA'],[".CountPelanggan('FAM',$sto).",'FAM'],[".CountPelanggan('FAN',$sto).",'FAN'], [".CountPelanggan('FBD',$sto).",'FBD'], [".CountPelanggan('FRD',$sto).",'FRD'], [".CountPelanggan('FRN',$sto).",'FRN']]]";
            // $countikr=CountIKR('FRN','1');
            // echo "[[[".$countikr.",'FAA']],

            //         [[".$countikr.",'FAA']],

            //         [[".$countikr.",'FAA']]]";
            // echo "[[[2,1], [4,2], [6,3], [3,4]],[[5,1], [1,2], [3,3], [4,4]],[[4,1], [7,2], [1,3], [2,4]]]";
        echo '"';
        echo ' data-labels="';
            echo "[{label:'Count of Migrasi'},{label:'Count of IKR'},{label:'Count of Nama Pelanggan'}]";
        echo '"';
        echo ' data-colors="';
            echo "[ '#425eb8','#b64b53','#409627']";
        echo '">';
        echo '</div>';

        echo '<script src="../library/assets/js/bootstrap.min.js"></script>';

        echo '<script src="../library/js/loader.js"></script>';


    }


}
?> 

    