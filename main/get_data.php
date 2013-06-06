<?php 

$get_dataaa=new get_data();
session_start();
$hak=$_SESSION['hak'];
$id_pengguna=$_SESSION['id_pengguna_web'];
if ($hak!="super"){
    $id_sto=$_SESSION['id_sto'];
}else{
    if (isset($_GET['sto'])){
        $id_sto=$_GET['sto'];
    }else{
        $id_sto="";
    }
}
if(isset($_GET['op'])){
    $op = $_GET['op']; 
    if ($op=="get_tolak_wo_by_sto_pengguna"){
        $get_dataaa->ceknewnotif($id_sto,$_GET['id_pengguna']);
        $get_dataaa->getTolakWO_bySTO_Pengguna($id_sto,$id_pengguna);
        
    }elseif ($op=="del_tolak_wo") {
        $get_dataaa->delTolakWO($_GET['id']);
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
 
    public function ceknewnotif($id_sto,$id_pengguna){
        $query=mysql_query("SELECT tw.id_tolak_wo,t.nama_team,tw.id_wo,tw.alasan,tw.createdate
            FROM tolak_wo AS tw, team AS t,woinstalasi AS wi
            WHERE tw.id_team=t.id_team AND tw.id_wo=wi.id_woinstalasi
            AND tw.id_sto='$id_sto' AND tw.isactive='1' AND wi.createby='$id_pengguna'
            ORDER BY tw.createdate DESC") or die(mysql_error());
        $jml=mysql_num_rows($query);
        if ($jml>0){
            echo "1";
        }else{
            echo "0";
        }
    }
    public function getTolakWO_bySTO_Pengguna($id_sto,$id_pengguna){
        $query=mysql_query("SELECT tw.id_tolak_wo,t.nama_team,tw.id_wo,tw.alasan,tw.createdate
            FROM tolak_wo AS tw, team AS t,woinstalasi AS wi
            WHERE tw.id_team=t.id_team AND tw.id_wo=wi.id_woinstalasi
            AND tw.id_sto='$id_sto' AND tw.isactive='1' AND wi.createby='$id_pengguna'
            ORDER BY tw.createdate DESC") or die(mysql_error());
        while($data=mysql_fetch_array($query)){
            $i=1;
            echo '
            <div class="c-alert">
                <div class="alert-message">
                    <a class="close" href="#close"><i class="icon-large icon-remove-circle"></i></a>
                    <div class="media media-feed">
                        <a class="pull-left" href="#">
                            <img class="media-object img-rounded" src="../library/images/avatar.png" style="width:60px;"/>
                        </a>
                        <div class="media-body">
                            <input id="idtw'.$i.'" class="idtolakwo" type="hidden" value="'.$data['id_tolak_wo'].'"></input>
                            <input id="lidtw" type="hidden" value="'.$i.'"></input>
                            <a href="#"><h4 class="media-heading">'.$data['nama_team'].'</h4></a>
                            <p class="meta">
                                <span class="tags"><a href="#" class="text-warning">'.$data['id_wo'].'</a></span>
                            </p>
                            <p class="excerpt">'.$data['alasan'].'</p>

                            <a style="float:right;margin:-20px -20px 0 0;">'.$data['createdate'].'</a>
                        </div>
                    </div>
                </div>
            </div>';
            $i++;
        }
    }

    public function delTolakWO($idtolakwo){
        mysql_query("UPDATE tolak_wo SET isactive='0' WHERE id_tolak_wo='$idtolakwo'") or die(mysql_error());
        $result=mysql_query("SELECT id_wo FROM tolak_wo WHERE id_tolak_wo='$idtolakwo'");
        $data=mysql_fetch_array($result);
        $data_id_wo=$data['id_wo'];
        mysql_query("DELETE FROM pekerjaan WHERE id_wo='$data_id_wo'") or die(mysql_error());
        mysql_query("UPDATE woinstalasi SET status_instalasi='reject' WHERE id_woinstalasi='$data_id_wo'") or die(mysql_error());
    }

}
?> 
