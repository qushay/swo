<?php 
//if(session_status() != 2) {session_start();}
session_start();
$get_dataaa=new get_data();
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
if ($hak=="call"){
    $penelepon=$id_pengguna;
}else{
    $penelepon="";
}
// if (isset($_GET['penelepon'])){
//     $penelepon=$_GET['penelepon'];
// }else{
//     $penelepon="";
// }

if(isset($_GET['limit'])){$limit_start=($_GET['limit']);}else{$limit_start="0";};
if(isset($_GET['p'])){$page=($_GET['p']);}else{$page="1";};

if(isset($_GET['op'])){
    $op = $_GET['op']; 


    if ($op=="get_all_pelanggan"){
        $get_dataaa->getAllPelanggan('all',$id_sto,$penelepon,$limit_start);
    }elseif ($op=="get_belum_pelanggan") {
        $get_dataaa->getAllPelanggan('belum',$id_sto,$penelepon,$limit_start);
    }elseif ($op=="get_pending1_pelanggan") {
        $get_dataaa->getAllPelanggan('pending1',$id_sto,$penelepon,$limit_start);
    }elseif ($op=="get_pending2_pelanggan") {
        $get_dataaa->getAllPelanggan('pending2',$id_sto,$penelepon,$limit_start);
    }elseif ($op=="get_notone_pelanggan") {
        $get_dataaa->getAllPelanggan('notone',$id_sto,$penelepon,$limit_start);
    }elseif ($op=="get_ditolak_pelanggan") {
        $get_dataaa->getAllPelanggan('ditolak',$id_sto,$penelepon,$limit_start);
    }elseif ($op=="get_reject_oleh_fo_pelanggan") {
        $get_dataaa->getAllPelanggan('ditolak',$id_sto,$penelepon,$limit_start);
    }elseif ($op=="get_pelanggan_by_sto") {
        $get_dataaa->getAllPelanggan('all',$_GET['sto'],$penelepon,$limit_start);
    }elseif ($op=="get_fo") {
        if(isset($_GET['tgl_janji'])){
            $tgl_janji=$_GET['tgl_janji'];
        }else{
            $tgl_janji="";
        }
        $get_dataaa->getFObySTO($id_sto,$_GET['two'],$tgl_janji);
    }elseif ($op=="get_reject") {
        $get_dataaa->getPelangganReject($_GET['id_sto'],$limit_start);
    }elseif ($op=="get_jobwo") {
        $get_dataaa->getPelangganJobWO();
    }elseif ($op=="get_one_wo") {
        $get_dataaa->getOneAssignment($_GET['idp'],$_GET['two']);
    }elseif ($op=="get_wi_selesai") {
        $get_dataaa->getWOSelesai($limit_start);
    }elseif ($op=="tambahWO") {
        $get_dataaa->inputWO($_GET['id_t'],$_GET['id_wi'],$_GET['tipe'],$id_pengguna);
    }elseif ($op=="get_penelepon_by_sto") {
        $get_dataaa->getCaller_bySTO($id_sto);
    }elseif ($op=="get_pagination") {
        $get_dataaa->getPagination($_GET['t'],$page,$id_sto);
    }
}
if(isset($_GET['opm'])){
    $op = $_GET['opm']; 
    if ($op=="get_all_pelanggan"){
        $get_dataaa->getAllPelangganMigrasi('all',$id_sto,$penelepon,$limit_start);
    }elseif ($op=="get_belum_pelanggan") {
        $get_dataaa->getAllPelangganMigrasi('belum',$id_sto,$penelepon,$limit_start);
    }elseif ($op=="get_pending1_pelanggan") {
        $get_dataaa->getAllPelangganMigrasi('pending1',$id_sto,$penelepon,$limit_start);
    }elseif ($op=="get_pending2_pelanggan") {
        $get_dataaa->getAllPelangganMigrasi('pending2',$id_sto,$penelepon,$limit_start);
    }elseif ($op=="get_notone_pelanggan") {
        $get_dataaa->getAllPelangganMigrasi('notone',$id_sto,$penelepon,$limit_start);
    }elseif ($op=="get_ditolak_pelanggan") {
        $get_dataaa->getAllPelangganMigrasi('ditolak',$id_sto,$penelepon,$limit_start);
    }elseif ($op=="get_pelanggan_by_sto") {
        $get_dataaa->getAllPelangganMigrasi('all',$_GET['sto']);
    }elseif ($op=="get_selesai_instalasi") {
        $get_dataaa->getAllPelanggan('sinstalasi');
    }elseif ($op=="get_selesai_migrasi") {
        $get_dataaa->getAllPelanggan('smigrasi');
    }elseif ($op=="get_all_assignment_instalasi") {
        $get_dataaa->getAllPelangganAssignmentInstalasi($id_sto,$id_pengguna);
    }elseif ($op=="get_all_assignment_migrasi") {
        $get_dataaa->getAllPelangganAssignmentMigrasi($id_sto,$id_pengguna);
    }elseif ($op=="get_fo"&&isset($_SESSION['id_sto'])) {
        $get_dataaa->getFObySTO($_SESSION['id_sto'],$_GET("two"));
    }elseif ($op=="get_reject") {
        $get_dataaa->getPelangganReject($_GET['id_sto']);
    }elseif ($op=="get_jobwo") {
        $get_dataaa->getPelangganJobWO();
    }elseif ($op=="get_one_wo") {
        $get_dataaa->getOneAssignment($_GET['id_wo'],$_GET['two']);
    }elseif ($op=="get_wm_selesai") {
        $get_dataaa->getWOSelesaiMigrasi($limit_start);
    }elseif ($op=="tambahWO") {
        $get_dataaa->inputWO($_GET['id_t'],$_GET['id_wi'],$_GET['tipe']);
    }
}
if(isset($_GET['call'])&&isset($_GET['id'])){
    $call=$_GET['call'];
    $id=$_GET['id'];
    if ($call=="get_data_pelanggan"){
        $get_dataaa->getPelanggan($id);
    }
}
if(isset($_GET['filter'])){
    $filter=$_GET['filter'];
    if ($filter=="get_divre"){
        $get_dataaa->getDivre();
    }elseif ($filter=="get_sto") {
        $get_dataaa->getSTO($_GET['divre']);
    }elseif ($filter=="get_area") {
        $get_dataaa->getArea($_GET['id_sto']);
    }elseif ($filter=="get_sto_all") {
        $get_dataaa->getSTO_all();
    }
}
class get_data {
    private $db_read;

    function __construct() {
        require '../include/DB_Functions_Read.php';
        // connect ke database
        $this->db_read = new DB_Functions_Read();
        
    }

    // destructor
    function __destruct() {
        
    }

    
    function dateFormatConverter($date){
            $myDateTime = DateTime::createFromFormat('Y-m-d H:i:s', $date);
            $newDateString = $myDateTime->format('[H:i] d F Y'); 
            return $newDateString;
    }
    
    public function getPelanggan($id){
        $d=$this->db_read->getPelangganById($id);
        $data=mysql_fetch_array($d);
        echo $data['nama_pelanggan']."|".$data['layanan_pots']."|".$data['alamat_pelanggan']."|".
        $data['kelurahan_pelanggan']."|".$data['kecamatan_pelanggan']."|".$data['kota_kabupaten_pelanggan']; 
    }
    //list pelanggan call instalasi
    public function getAllPelanggan($status,$id_sto,$penelepon,$limit_start){
        $limit=30;
        $i=($limit_start*$limit)+1;
        function getStatusWO($tipe,$stat){
            if ($tipe=="warna"){
                if($stat==""){}
                elseif($stat=="pending1"){$stat="info";}
                elseif($stat=="pending2"){$stat="info";}
                elseif($stat=="notone"){$stat="warning";}
                elseif($stat=="ditolak"){$stat="error";}
                return $stat;
            }else{
                if($stat==""){$stat="Belum";}
                elseif($stat=="instalasi"){$stat="Assignment";}
                elseif($stat=="mulai"){$stat="Proses Instalasi";}
                elseif($stat=="pending1"){$stat="Pending 1";}
                elseif($stat=="pending2"){$stat="Pending 2";}
                elseif($stat=="notone"){$stat="No Tone";}
                elseif($stat=="ditolak"){$stat="Ditolak";}
                elseif($stat=="selesai"){$stat="Selesai Instalasi";}
                return $stat;
            }
        }
        function getButton($status,$idp){
            $button="";
            if($status==""||$status=="pending1"||$status=="pending2"||$status=="notone"){
                $button="<a class='btn btn-flat btn-mini btn-info' href='jadwal.php?idp=".$idp."&two=instalasi'><i class='icon-phone'></i></a>";
            }
            return $button;
        }

        if($id_sto==""){ //jika yg login superadmin
            if ($status=="all"){
                $d = $this->db_read->getAllPelangganAndStatus($limit_start);
            }elseif($status=="belum"){
                $d= $this ->db_read->getAllPelangganBelum($limit_start);
            }else{
                $d = $this->db_read->getAllPelangganAndStatus_byStatus($status,$penelepon,$limit_start);
            }
        }else{ //jika yg login bukan super
            if ($status=="all"){
                $d = $this->db_read->getAllPelangganAndStatus_bySTO($id_sto,$penelepon,$limit_start);
            }elseif($status=="belum"){
                $d= $this ->db_read->getAllPelangganBelum_bySTO($id_sto,$penelepon,$limit_start);
            }else{
                $d = $this->db_read->getAllPelangganAndStatus_bySTOStatus($id_sto,$status,$penelepon,$limit_start);
            }
                
        }

        while($data=mysql_fetch_array($d)){ 
            echo "<tr class='".getStatusWo("warna",$data['status_instalasi'])."'>";
            echo "    <td>".$i."</td>";
            echo "    <td>".$data['id_pelanggan']."</td>";
            echo "    <td>".$data['nama_pelanggan']."</td>";
            echo "    <td>".$data['alamat_pelanggan']."</td>";
            echo "    <td>".$data['dp_lama']."</td>";
            echo "    <td>".$data['jenis_ont']."</td>";
            echo "    <td>".$data['layanan_pots']."</td>";
            echo "    <td>".$data['layanan_speedy']."</td>";
            echo "    <td>".$data['layanan_iptv']."</td>";
            echo "    <td>".getStatusWo("ket",$data['status_instalasi'])."</td>";
            echo "    <td style='padding-top:0px;padding-bottom:0px;'>".getButton($data['status_instalasi'],$data['id_pelanggan'])."</td>";
            echo "</tr>";
            $i++;
        } 
    }
    //list pelanggan call migrasi
    public function getAllPelangganMigrasi($status,$id_sto,$penelepon,$limit_start){
        $i=1;
        function getStatusWO($tipe,$stat){
            if ($tipe=="warna"){
                if($stat==""){}
                elseif($stat=="pending1"){$stat="info";}
                elseif($stat=="pending2"){$stat="info";}
                elseif($stat=="notone"){$stat="warning";}
                elseif($stat=="ditolak"){$stat="error";}
                return $stat;
            }else{
                if($stat==""){$stat="Belum";}
                elseif($stat=="belum"){$stat="Belum Migrasi";}
                elseif($stat=="instalasi"){$stat="Assignment";}
                elseif($stat=="mulai"){$stat="Proses Migrasi";}
                elseif($stat=="pending1"){$stat="Pending 1";}
                elseif($stat=="pending2"){$stat="Pending 2";}
                elseif($stat=="notone"){$stat="No Tone";}
                elseif($stat=="ditolak"){$stat="Ditolak";}
                elseif($stat=="selesai"){$stat="Selesai Instalasi";}
                return $stat;
            }
        }
        function getButton($status,$idp){
            if($status==""||$status=="belum"||$status=="notone"||$status=="pending1"||$status=="pending2"){
                $button="<a class='btn btn-flat btn-mini btn-info' href='jadwal.php?idp=".$idp."&two=migrasi'><i class='icon-phone'></i></a>";
                return $button;
            }
        }
         if($id_sto==""){ //jika yg login superadmin
            if ($status=="all"){
                $d = $this->db_read->getAllPelangganAndStatusMigrasi($limit_start);
            }elseif($status=="belum"){
                $d= $this ->db_read->getAllPelangganBelumMigrasi($limit_start);
            }else{
                $d = $this->db_read->getAllPelangganAndStatusMigrasi_byStatus($status,$limit_start);
            }
        }else{ //jika yg login bukan super
            if ($status=="all"){
                $d = $this->db_read->getAllPelangganAndStatusMigrasi_bySTO($id_sto,$limit_start);
            }elseif($status=="belum"){
                $d= $this ->db_read->getAllPelangganBelumMigrasi_bySTO($id_sto,$limit_start);
            }else{
                $d = $this->db_read->getAllPelangganAndStatusMigrasi_bySTOStatus($id_sto,$status,$limit_start);
            }
                
        }
        
        while($data=mysql_fetch_array($d)){ 
            echo "<tr class='".getStatusWo("warna",$data['status_migrasi'])."'>";
            echo "    <td>".$i."</td>";
            echo "    <td>".$data['id_pelanggan']."</td>";
            echo "    <td>".$data['nama_pelanggan']."</td>";
            echo "    <td>".$data['alamat_pelanggan']."</td>";
            echo "    <td>".$data['dp_lama']."</td>";
            echo "    <td>".$data['jenis_ont']."</td>";
            echo "    <td>".$data['layanan_pots']."</td>";
            echo "    <td>".$data['layanan_speedy']."</td>";
            echo "    <td>".$data['layanan_iptv']."</td>";
            echo "    <td>".getStatusWo("ket",$data['status_migrasi'])."</td>";
            echo "    <td style='padding-top:0px;padding-bottom:0px;'>".getButton($data['status_migrasi'],$data['id_pelanggan'])."</td>";
            echo "</tr>";
            $i++;
        } 
    }
    public function getPelangganReject($id_sto,$limit_start){
        $i=1;
        if ($id_sto=="all"){
            $d = $this->db_read->getWORejected($limit_start);
        }else{
            $d = $this->db_read->getWORejected_bySTO($id_sto,$limit_start);
        }
        
        while($data=mysql_fetch_array($d)){ 
            echo "<tr>";
            echo "    <td>".$i."</td>";
            echo "    <td>".$data['nama_sto']."</td>";
            echo "    <td>".$data['nama']."</td>";
            $date = new DateTime($data['createdate']);
            echo "    <td>".$date->format('d/m/Y H:i')."</td>";
            echo "    <td>".$data['nama_pelanggan']."</td>";
            echo "    <td>".$data['alamat_pelanggan']."</td>";
            echo "    <td>".$data['keterangan']."</td>";
            echo "</tr>";
            $i++;
        } 
    }

    public function getPelangganJobWO(){
        $i=1;
        // $d = $this->db_read->getAllPelangganAndStatusByStatus($status);
        
        // while($data=mysql_fetch_array($d)){ 
            echo "<tr>";
            echo "    <td>".$i."</td>";
            echo "    <td>Bandung</td>";
            echo "    <td>R/BDG/Arjuna/1</td>";
            echo "    <td>Admin bandung</td>";
            echo "    <td>20 Mei 2013 08:20</td>";
            echo "    <td>Arjuna</td>";
            echo "    <td>20 Mei 2013 07:10</td>";
            echo "    <td>Yoso Adi Setioko</td>";
            echo "    <td>0229283942</td>";
            echo "    <td>di hatimu yang paling dalam</td>";
            echo "    <td>IKR</td>";
            echo "</tr>";
            $i++;
             echo "<tr>";
            echo "    <td>".$i."</td>";
            echo "    <td>Bandung</td>";
            echo "    <td>R/BDG/Arjuna/1</td>";
            echo "    <td>Admin bandung</td>";
            echo "    <td>20 Mei 2013 08:20</td>";
            echo "    <td>Arjuna</td>";
            echo "    <td>20 Mei 2013 07:10</td>";
            echo "    <td>Yoso Adi Setioko</td>";
            echo "    <td>0229283942</td>";
            echo "    <td>di hatimu yang paling dalam</td>";
            echo "    <td>IKR</td>";
            echo "</tr>";
        // } 
    }
    public function getOneAssignment($idp,$two){
        $i=1;
        if ($two=="instalasi"){
            $kode_wo="1";
        }else{
            $kode_wo="2";
        }
        function generateIDWO($id_pelanggan,$id_sto,$kode_wo){
            $id=$kode_wo."-".$id_sto."-".$id_pelanggan;
            return $id;
        }
        $status="instalasi";
        $result_pelanggan = mysql_query("SELECT p.id_pelanggan,p.nama_pelanggan,p.alamat_pelanggan,p.id_sto,s.nama_sto
            FROM pelanggan AS p, sto AS s
            WHERE p.id_pelanggan='$idp' AND p.id_sto=s.id_sto");
        $result_line_pelanggan = mysql_query("SELECT l.dp_lama,l.jenis_ont,l.layanan_pots,l.layanan_speedy,l.layanan_iptv 
            FROM pelanggan AS p, line_pelanggan AS l
            WHERE p.id_pelanggan='$idp' AND p.id_pelanggan=l.id_pelanggan");
    
        $data_pelanggan=mysql_fetch_array($result_pelanggan);
        $id_woinstalasi=generateIDWO($idp,$data_pelanggan['id_sto'],$kode_wo);
        echo "<tr>";
        echo "   <td style='border-top-width: 0px;margin-top:-40px;' class='span3'>
                    <table>
                        <tr>
                            <td style='border-top-width: 0px;'>ID Pelanggan <h4 style='margin:0 0 0 0;'>".$idp."</h4></td>
                            <input id='hiddenIdPelanggan' type='hidden' value='".$idp."'/>
                            <input id='hiddenIdSTO' type='hidden' value='".$data_pelanggan['id_sto']."'/>
                            <input id='hiddenIdWOInstalasi' type='hidden' value='".$id_woinstalasi."'/>
                            <input id='hiddenTwo' type='hidden' value='".$two."'/>
                        </tr>
                        <tr>
                            <td style='border-top-width: 0px;'>STO <h4 style='margin:0 0 0 0;'>".$data_pelanggan['nama_sto']."</h4></td>
                        </tr>
                        <tr>
                            <td style='border-top-width: 0px;'>Nama Pelanggan <h4 style='margin:0 0 0 0;'>".$data_pelanggan['nama_pelanggan']."</h4></td>
                        </tr>
                        <tr>
                            <td style='border-top-width: 0px;'>Alamat Pelanggan <h4 style='margin:0 0 0 0;'>".$data_pelanggan['alamat_pelanggan']."</h4></td>
                        </tr>
                    </table>
                </td>";
        echo "   <td  style='border-top-width: 0px;'>
                    <table class='table table-condensed table-hover' >
                        <thead>
                            <tr>
                                <th>DP Lama</th>
                                <th>Jenis ONT</th>
                                <th>POTS</th>
                                <th>Speedy</th>
                                <th>IPTV</th>
                            </tr>
                        </thead>

                        <tbody>";
        while($data=mysql_fetch_array($result_line_pelanggan)){
        echo " 
                            <tr>
                                <td >".$data['dp_lama']."</td>
                                <td >".$data['jenis_ont']."</td>
                                <td >".$data['layanan_pots']."</td>
                                <td >".$data['layanan_speedy']."</td>
                                <td >".$data['layanan_iptv']."</td>
                            </tr>";
                        }
        echo "
                        </tbody>

                    </table>
                </td>";
        echo "</tr>";
          
    }
    public function getWOSelesai($limit_start){
        $i=1;
        $d = $this->db_read->getWOSelesai($limit_start);
        
        while($data=mysql_fetch_array($d)){ 
            echo "<tr>";
            echo "    <td>".$i."</td>";
            echo "    <td>".$data['nama_sto']."</td>";
            echo "    <td>".$data['id_woinstalasi']."</td>";
            echo "    <td>".$data['tgl_instalasi']."</td>";
            echo "    <td>".$data['nama_pelanggan']."</td>";
            echo "    <td>".$data['alamat_pelanggan']."</td>";
            echo "    <td>".$data['keterangan']."</td>";
            echo "    <td style='padding-top:3px;padding-bottom:0px;'><a href='detail_done.php?wo=wi&id_wo=".$data['id_woinstalasi']."' class='btn btn-primary btn-flat btn-mini'>Detail</a></td>";
            echo "</tr>";
            $i++;
        } 
    }
    public function getWOSelesaiMigrasi($limit_start){
        $i=1;
        $d = $this->db_read->getWOSelesaiMigrasi($limit_start);
        
        while($data=mysql_fetch_array($d)){ 
            echo "<tr>";
            echo "    <td>".$i."</td>";
            echo "    <td>".$data['nama_sto']."</td>";
            echo "    <td>".$data['id_womigrasi']."</td>";
            echo "    <td>".$data['tgl_migrasi']."</td>";
            echo "    <td>".$data['nama_pelanggan']."</td>";
            echo "    <td>".$data['alamat_pelanggan']."</td>";
            echo "    <td>".$data['keterangan']."</td>";
            echo "    <td style='padding-top:3px;padding-bottom:0px;'><a href='detail_done.php?wo=wm&id_wo=".$data['id_womigrasi']."' class='btn btn-primary btn-flat btn-mini'>Detail</a></td>";
            echo "</tr>";
            $i++;
        } 
    }

    public function getFObySTO($id_sto,$tipe_wo,$tgl_janji){
        $i=1;
        $status="instalasi";
        $d = $this->db_read->getAllFO_bySTO($id_sto);
        
        while($data=mysql_fetch_array($d)){ 
            echo "<tr>";
            echo "   <td class='span3'>
                        <table>
                            <tr>
                                <td style='border-top-width: 0px;padding:0px'><i class='micon-user'></i> Team ".$data['nama_team']."</td>
                            </tr>
                            <tr>
                                <td style='border-top-width: 0px;padding:0px'><i class='micon-phone'></i> ".$data['no_telpon']." (".$data['nama_anggotateam'].")</td>
                            </tr>
                            <tr>
                                <td style='border-top-width: 0px;padding:0px'><i class='micon-location'></i> Dago</td>
                            </tr>   
                        </table>
                    </td>";
            echo "   <td class='span7'>
                        <table>";
                        $d1 = $this->db_read->getJadwalFO_byTeam_Tgl($data['id_team'],$tipe_wo,$tgl_janji);
                        while($data1=mysql_fetch_array($d1)){ 
            echo "          <tr>
                                <td style='border-top-width: 0px;padding:0px;'><b>".$data1['id_wo']."</b> </td>
                                <td style='border-top-width: 0px;padding:0px'><i class='icon-time' style='margin-left:8px;'></i> ".$this->dateFormatConverter($data1['jam_janji'])."</td>
                                <td style='border-top-width: 0px;padding:0px'><i class='icon-arrow-right' style='margin-left:8px;'></i> ".$data1['alamat_pelanggan'].", ".$data1['kelurahan_pelanggan']."</td>
                            </tr>";
                        }
            echo "      </table>
                    </td>";
            echo "  <td class='span2'><a class='btn btn-primary tambahWO'><input class='hiddenIdTeam' type='hidden' value='".$data['id_team']."'/> Tambahkan WO</a></td>";
            echo "</tr>";
            $i++;
        } 
        echo '
            <script> 
                $(document).ready(function(){ 
                    function showGrowl(){
                        $.growlUI("Sukses", "Tambah Work Order"); 
                    }
                    $(".tambahWO").click(function(){ 
                        var id=$("#idpelanggan").val();
                        var two=$("#hiddenTwo").val();
                        var sto=$("#hiddenIdSTO").val();
                        var date=$("#datepicker").val();
                        var time=$("#timepicker").val();
                        var ket=$("#inputKeterangan").val();
                        var penerima=$("#inputPenerima").val();
                        console.log(id+" "+date+" "+time+" "+ket+" "+penerima);
                        $.ajax({ 
                            url: "store_data.php",  
                            data: "op=diterima&idp="+id+"&two="+two+"&sto="+sto+"&jam_janji="+date+" "+time+"&keterangan="+ket+"&penerima="+penerima, 
                            cache: false, 
                            success: function(){ 
                               
                            } 
                        }); 
                    }); 
                    $(".tambahWO").click(function(){ 
                        var id_wi=$("#hiddenIdWOInstalasi").val();
                        var two=$("#hiddenTwo").val();
                        var id_t=$(this).find(".hiddenIdTeam").val();
                        console.log(id_wi+" "+two+" "+id_t);
                        $.ajax({ 
                            url: "get_data.php", 
                            data: "op=tambahWO&id_wi="+id_wi+"&id_t="+id_t+"&tipe="+two, 
                            cache: false, 
                            success: function(){ 
                                $("#get_data_fo").load("get_data.php","op=get_fo&two="+two);
                                console.log("sukses");
                                showGrowl();
                            } 
                        }); 
                    }); 


                }); 
            </script> 
        ';
    }


    public function inputWO($id_team,$id_wo,$tipe_wo,$createby){
        if ($tipe_wo=="instalasi"){
            $wo="1".substr($id_wo,1);    
        }else{
            $wo="2".substr($id_wo,1);
        }   
        

        $result = mysql_query("UPDATE pekerjaan SET id_team='$id_team' WHERE id_wo='$wo'");
        if ($tipe_wo=="instalasi"){
            $result2 = mysql_query("UPDATE woinstalasi SET status_instalasi='mulai' WHERE id_woinstalasi='$id_wo'");
            $result3 = mysql_query("UPDATE woinstalasi SET id_team='$id_team' WHERE id_woinstalasi='$id_wo'");
            $result4 = mysql_query("SELECT id_pelanggan FROM woinstalasi WHERE id_woinstalasi='$id_wo'") or die(mysql_error());
            $data=mysql_fetch_array($result4);
            $data_id_wo=$data['id_pelanggan'];
            $result5 = mysql_query("UPDATE pelanggan SET id_team='$id_team' WHERE id_pelanggan='$data_id_wo'");
            //PERUBAHAN TABLE
            $result_perubahantable=mysql_query("SELECT * FROM perubahantable WHERE nama_table='woinstalasi' AND id_team='$id_team'");
            $jml_perubahantable=mysql_num_rows($result_perubahantable);
            if ($jml_perubahantable>0){
                $results = mysql_query("UPDATE perubahantable SET id_team='$id_team',updateby='$createby',updatedate=NOW() 
                    WHERE nama_table='woinstalasi' AND id_team='$id_team'");
            }else{
                $result6= mysql_query("INSERT INTO perubahantable(nama_table,id_team,tgl_perubahan,createby,createdate) 
                    VALUES('woinstalasi','$id_team',NOW(),'$createby',NOW())");
            }
            //LOG ASSIGNMENT INSTALASI
            $result_log=mysql_query("INSERT INTO log (aksi,createby,createdate) VALUES ('Assigntment WO (instalasi) > $data_id_wo','$createby',NOW())");
        }else if ($tipe_wo=="migrasi"){
            $result2 = mysql_query("UPDATE womigrasi SET status_migrasi='mulai' WHERE id_womigrasi='$id_wo'");
            $result3 = mysql_query("UPDATE womigrasi SET id_team='$id_team' WHERE id_womigrasi='$id_wo'");
            $result4 = mysql_query("SELECT id_pelanggan FROM womigrasi WHERE id_womigrasi='$id_wo'") or die(mysql_error());
            $data=mysql_fetch_array($result4);
            $data_id_wo=$data['id_pelanggan'];
            $result5 = mysql_query("UPDATE pelanggan SET id_team='$id_team' WHERE id_pelanggan='$data_id_wo'");
            //PERUBAHAN TABLE
            $result_perubahantable=mysql_query("SELECT * FROM perubahantable WHERE nama_table='womigrasi' AND id_team='$id_team'");
            $jml_perubahantable=mysql_num_rows($result_perubahantable);
            if ($jml_perubahantable>0){
                $results = mysql_query("UPDATE perubahantable SET id_team='$id_team',updateby='$createby',createdate=NOW() 
                    WHERE nama_table='womigrasi' AND id_team='$id_team'");
            }else{
                $result6= mysql_query("INSERT INTO perubahantable(nama_table,id_team,tgl_perubahan,createby,createdate) 
                    VALUES('womigrasi','$id_team',NOW(),'$createby',NOW())");
            }
            //LOG ASSIGNMENT MIGRASI
            $result_log=mysql_query("INSERT INTO log (aksi,createby,createdate) VALUES ('Assigntment WO (migrasi) > $data_id_wo','$createby',NOW())");
        }
        
        if ($result&&$result2&&$result3&&$result4&&$result5) {
            
            return true;
        } else {
            return false;
        }
    }
    public function getDivre(){
        $d = $this->db_read->getAllDivre();
        echo "<option value=''>Pilih Divre</option>";
        while($data=mysql_fetch_array($d)){
            echo "<option value='".$data['nama_divre']."'>".$data['nama_divre']."</option>";
        }
    }
    public function getSTO_all(){
        $d = $this->db_read->getSTO_all();
        echo "<option value=''>Pilih STO</option>";
        while($data=mysql_fetch_array($d)){
            echo "<option value='".$data['id_sto']."'>".$data['nama_sto']."</option>";
        }
    }
    public function getSTO($divre){
        $d = $this->db_read->getSTOByDivre($divre);
        echo "<option value=''>Pilih STO</option>";
        while($data=mysql_fetch_array($d)){
            echo "<option value='".$data['id_sto']."'>".$data['nama_sto']."</option>";
        }
    }
    public function getCaller_bySTO($id_sto){
        $d = mysql_query("SELECT id_pengguna_web,nama FROM penggunaweb WHERE id_sto='$id_sto' AND hak_pengguna_web='call'");
        echo "<option value=''>Pilih Penelepon</option>";
        while($data=mysql_fetch_array($d)){
            echo "s";
            echo "<option value='".$data['id_pengguna_web']."'>".$data['nama']."</option>";
        }
    }
    
    public function getPicture($id_wo){

        $id_temp=substr($id_wo, 1);
        $id_wo="1".$id_temp;
        echo '
            <div class="control-group span3">
                <label class="control-label">Foto Depan Rumah</label>
                <div class="controls">
                    <div class="widget-nav">
                        <img src="../picture/depanrumah'.$id_wo.'.jpg" class="img-polaroid"/>
                    </div>
                </div>
            </div>
            <div class="control-group span3">
                <label class="control-label">Foto Jaringan</label>
                <div class="controls">
                    <div class="widget-nav">
                        <img src="../picture/jaringan'.$id_wo.'.jpg" class="img-polaroid"/>
                    </div>
                </div>
            </div>
            <div class="control-group span3">
                <label class="control-label">Foto Roset</label>
                <div class="controls">
                    <div class="widget-nav">
                        <img src="../picture/roset'.$id_wo.'.jpg" class="img-polaroid" />
                    </div>
                </div>
            </div>
            <div class="control-group span3">
                <label class="control-label">Foto Bobokan</label>
                <div class="controls">
                    <div class="widget-nav">
                        <img src="../picture/bobokan'.$id_wo.'.jpg" class="img-polaroid" />
                    </div>
                </div>
            </div>';
    }

    public function getPictureMigrasi($id_wo){
        $id_temp=substr($id_wo, 1);
        $id_temp="2".$id_temp;
        echo '
            <div class="control-group span3">
                <label class="control-label" for="inputKecamatan">Foto Peletakan ONT</label>
                <div class="controls">
                    <div class="widget-nav">
                        <img src="../picture/peletakanont'.$id_temp.'.jpg" class="img-polaroid"/>
                    </div>
                </div>
            </div>
            <div class="control-group span3">
                <label class="control-label" for="inputKecamatan">Foto Berita Acara</label>
                <div class="controls">
                    <div class="widget-nav">
                        <img src="../picture/beritaacara'.$id_temp.'.jpg" class="img-polaroid"/>
                    </div>
                </div>
            </div>';
    }

    public function getPagination($type,$page,$sto){

        $limit_data=30;
        if ($type=="call_instalasi"){
            if ($sto==""){
                $query="SELECT DISTINCT lp.id_pelanggan FROM pelanggan AS p,line_pelanggan AS lp 
                WHERE p.id_pelanggan=lp.id_pelanggan AND lp.isactive='1'";
            }else{
                $query="SELECT DISTINCT lp.id_pelanggan FROM pelanggan AS p,line_pelanggan AS lp 
                WHERE p.id_pelanggan=lp.id_pelanggan AND p.id_sto='$sto' AND lp.isactive='1'";
            }
        }elseif ($type=="call_migrasi"){
            if ($sto==""){
                $query="SELECT DISTINCT wm.id_pelanggan FROM womigrasi AS wm 
                WHERE wm.isactive='1'";
            }else{
                $query="SELECT DISTINCT wm.id_pelanggan FROM womigrasi AS wm 
                WHERE wm.id_sto='$sto' AND wm.isactive='1'";
            }
        }elseif ($type=="reject"){
            if ($sto==""){
                $query="SELECT DISTINCT wm.id_pelanggan FROM woreject AS wm 
                WHERE wm.isactive='1'";
            }else{
                $query="SELECT DISTINCT wm.id_pelanggan FROM woreject AS wm 
                WHERE wm.id_sto='$sto' AND wm.isactive='1'";
            }
        }elseif ($type=="reject_fo"){
            if ($sto==""){
                $query="SELECT DISTINCT wm.id_pelanggan FROM tolak_wo AS wm";
            }else{
                $query="SELECT DISTINCT wm.id_pelanggan FROM tolak_wo AS wm 
                WHERE wm.id_sto='$sto'";
            }
        }elseif ($type=="wi_selesai"){
            if ($sto==""){
                $query="SELECT DISTINCT wm.id_pelanggan FROM woinstalasi AS wm 
                WHERE wm.isactive='1' AND wm.status_instalasi='selesai'";
            }else{
                $query="SELECT DISTINCT wm.id_pelanggan FROM woinstalasi AS wm 
                WHERE wm.id_sto='$sto' AND wm.status_instalasi='selesai' AND wm.isactive='1'";
            }
        }elseif ($type=="wm_selesai"){
            if ($sto==""){
                $query="SELECT DISTINCT wm.id_pelanggan FROM womigrasi AS wm 
                WHERE wm.isactive='1' AND wm.status_migrasi='selesai'";
            }else{
                $query="SELECT DISTINCT wm.id_pelanggan FROM womigrasi AS wm 
                WHERE wm.id_sto='$sto' AND wm.status_migrasi='selesai' AND wm.isactive='1'";
            }
        }

        $result=mysql_query($query);
        $jml_data=mysql_num_rows($result);
        if ($jml_data<$limit_data){
            $jml_page=1;
        }else{
            $jml_page=floor($jml_data/$limit_data);
            if ($jml_data % $limit_data !=0){
                $jml_page=$jml_page+1;
            }
        }

        if ($jml_page<4){
            $page_show_min=1;
            $page_show_max=$jml_page;
        }else{
            if ($page==1){
                $page_show_min=1;
                $page_show_max=$page+3;
            }elseif ($page==2) {
                $page_show_min=1;
                $page_show_max=$page+2;
            }elseif($page==$jml_page-1){
                $page_show_min=$page-2;
                $page_show_max=$page+1;
            }elseif($page==$jml_page){
                $page_show_min=$page-3;
                $page_show_max=$page;
            }elseif($page>$jml_page){
                $page=$jml_page;
                $page_show_min=$page-3;
                $page_show_max=$page;
            }else{
                $page_show_min=$page-2;
                $page_show_max=$page+2;
            }
        }

        echo '
            <li><a>Halaman '.$page.' dari '.$jml_page.'</a></li>';
        if ($jml_page==0 OR $page==1){
        echo '
            <li class="disabled"><a id="page_first" href="#">First</a></li>
            <li class="disabled"><a id="page_prev" href="#"><i class="icon-chevron-left"></i></a></li>';
        }else{
        echo '
            <li><a id="page_first" href="#">First</a></li>
            <li><a id="page_prev" href="#"><i class="icon-chevron-left"></i></a></li>';
        }
        for ($i=$page_show_min;$i<=$page_show_max;$i++) { 
            if ($i==$page){
                echo '<li class="active"><a class="page" href="#">'.$i.'</a></li>';
            }else{
                echo '<li><a class="page" href="#">'.$i.'</a></li>';
            }
        }
        
        if ($jml_page==0 OR $page==$jml_page){
        echo '
            <li class="disabled"><a id="page_next" href="#"><i class="icon-chevron-right"></i></a></li>
            <li class="disabled"><a id="page_last" href="#">Last</a></li>';
        }else{
        echo '
            <li><a id="page_next" href="#"><i class="icon-chevron-right"></i></a></li>
            <li><a id="page_last" href="#">Last</a></li>';
        }
        echo '
            <li><div class="input-prepend input-append">
                    <input id="page_input" class="span3" type="text" placeholder="Page" />
                    <button id="page_go" class="btn" type="button">Go!</button>
                </div>
            </li>';
        echo "
            <script> 
                $(document).ready(function(){ 
                    var i=1;
                    var page=".$page.";
                    var t='".$type."';
                    var page_first,page_prev,page_next,page_last;
                    $('.page').click(function(e){
                        page=$( e.target ).closest('.page').html();
                        console.log(page);

                        $('#get_data').load('get_data.php','op=get_all_pelanggan&limit='+(page-1));
                        $('#get_pagination').load('get_data.php','op=get_pagination&t='+t+'&p='+page);
                    });
                    $('#page_first').click(function(){
                        $('#get_data').load('get_data.php','op=get_all_pelanggan&limit=0');
                        $('#get_pagination').load('get_data.php','op=get_pagination&t='+t+'&p=1');
                    });
                    $('#page_prev').click(function(){
                        page_prev=page-1;
                        $('#get_data').load('get_data.php','op=get_all_pelanggan&limit='+(page_prev-1));
                        $('#get_pagination').load('get_data.php','op=get_pagination&t='+t+'&p='+page_prev);
                    });
                    $('#page_next').click(function(){
                        page_next=page+1;
                        $('#get_data').load('get_data.php','op=get_all_pelanggan&limit='+page);
                        $('#get_pagination').load('get_data.php','op=get_pagination&t='+t+'&p='+page_next);
                    });
                    $('#page_last').click(function(){
                        page_last=".$jml_page.";
                        $('#get_data').load('get_data.php','op=get_all_pelanggan&limit='+(page_last-1));
                        $('#get_pagination').load('get_data.php','op=get_pagination&t='+t+'&p='+page_last);
                    });
                    $('#page_go').click(function(){
                        page=$('#page_input').val();
                        $('#get_data').load('get_data.php','op=get_all_pelanggan&limit='+(page-1));
                        $('#get_pagination').load('get_data.php','op=get_pagination&t='+t+'&p='+page);
                    });
                }); 
            </script> ";
    }

}

?> 
   