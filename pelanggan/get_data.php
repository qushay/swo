<?php 
$get_dataaa=new get_data();
//if(session_status() != 2) {session_start();}
session_start();
if(isset($_SESSION)){
    $id_pengguna=$_SESSION['id_pengguna_web'];
    $hak=$_SESSION['hak'];
    $id_sto=$_SESSION['id_sto'];
}
if(isset($_GET['op'])){
    $op = $_GET['op']; 
    
    if(isset($_GET['divre'])){$divre=$_GET['divre'];}else{$divre="";}
    if(isset($_GET['sto'])){$sto=$_GET['sto'];}else{$sto="";};
    if(isset($_GET['area'])){$area=($_GET['area']);}else{$area="";};
    if(isset($_GET['prov'])){$prov=($_GET['prov']);}else{$prov="";};
    if(isset($_GET['kab'])){$kab=($_GET['kab']);}else{$kab="";};
    if(isset($_GET['kec'])){$kec=($_GET['kec']);}else{$kec="";};
    if(isset($_GET['kel'])){$kel=($_GET['kel']);}else{$kel="";};
    if(isset($_GET['nama'])){$nama=($_GET['nama']);}else{$nama="";};
    if(isset($_GET['dp_lama'])){$dp_lama=($_GET['dp_lama']);}else{$dp_lama="";};
    if(isset($_GET['jenis_ont'])){$jenis_ont=($_GET['jenis_ont']);}else{$jenis_ont="";};
    if(isset($_GET['existing_pots'])){$pots=($_GET['existing_pots']);}else{$pots="";};
    if(isset($_GET['existing_speedy'])){$speedy=($_GET['existing_speedy']);}else{$speedy="";};
    if(isset($_GET['existing_iptv'])){$iptv=($_GET['existing_iptv']);}else{$iptv="";};
    if(isset($_GET['limit'])){$limit=($_GET['limit']);}else{$limit="0";};
    if(isset($_GET['p'])){$page=($_GET['p']);}else{$page="1";};

    switch ($op) {
        case 'get_all_pelanggan':
            $get_dataaa->getPelanggan($nama,$prov,$sto,$dp_lama,$jenis_ont,$pots,$speedy,$iptv,$limit);
            break;
        case 'get_line_pelanggan':
            $get_dataaa->getLinePelanggan($_GET['idp'],$_GET['jml_line'],$hak);
            break;
        case 'get_pagination':
            $get_dataaa->getPagination($page);
            break;
        case 'get_dropdown_sto':
            $get_dataaa->getDropDownSTO($id_sto,$prov,$hak);
            break;
        default:
            # code...
            break;
    }
}
if(isset($_GET['filter'])){
    $filter=$_GET['filter'];
    if ($filter=="get_divre"){
        $get_dataaa->getDivre();
    }elseif ($filter=="get_sto") {
        $get_dataaa->getSTO();
    }elseif ($filter=="get_area") {
        $get_dataaa->getArea($_GET['id_sto']);
    }
    if ($filter=="get_prov") {
        $get_dataaa->getProvinsi();
    }elseif ($filter=="get_kab") {
        $get_dataaa->getKabupaten($_GET['prov']);
    }elseif ($filter=="get_kec") {
        $get_dataaa->getKecamatan($_GET['prov'],$_GET['kab']);
    }elseif ($filter=="get_kel") {
        $get_dataaa->getKelurahan($_GET['prov'],$_GET['kab'],$_GET['kec']);
    }elseif ($filter=="get_coor_sto") {
        $get_dataaa->getCoordinatSTO($_GET['id']);
    }elseif ($filter=="get_coor_fo") {
        $get_dataaa->getCoordinatFieldOps($_GET['id']);
    }elseif ($filter=="get_coor_divre") {
        $get_dataaa->getCoordinatDivre();
    }elseif ($filter=="get_coor_sto_by_map_bounds") {
        $get_dataaa->getCoordinatSTObyMapBounds($_GET['ne_lat'],$_GET['ne_lon'],$_GET['sw_lat'],$_GET['sw_lon']);
    }elseif ($filter=="get_coor_fo_by_map_bounds_by_sto") {
        $get_dataaa->getCoordinatFO_byMapBounds_bySTO($_GET['id_sto'],$_GET['ne_lat'],$_GET['ne_lon'],$_GET['sw_lat'],$_GET['sw_lon']);
    }
}

if(isset($_GET['del'])){
    $del=$_GET['del'];
    switch ($del) {
        case 'del_line_pelanggan':
        
            $get_dataaa->delLinePelanggan($_GET['idlp'],$id_pengguna);
            break;
        
        default:
            # code...
            break;
    }
}
if(isset($_GET['edit'])){
    $edit=$_GET['edit'];
    switch ($edit) {
        case 'edit_pelanggan':
        
            $get_dataaa->getEditPelanggan($_GET['idp']);
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
 
 
    public function getPelanggan($nama,$prov,$sto,$dp_lama,$jenis_ont,$pots,$speedy,$iptv,$limit_start){
        $limit_end=30;
        $limit_start=$limit_end*$limit_start;
        function getStatusWO($status){

            if ($status=="semua"){}
            else if($status=="tunggu"){$stat="warning";}
            else if($status=="dihubungi"){$stat="info";}
            else if($status=="diterima"){$stat="success";}
            else if($status=="ditolak"){$stat="error";}
            else if($status=="selesai"){$stat="muted";}
            return $stat;
        }
        function getButton($jml_line,$id){
            if ($jml_line==1){
                $btn="h";
            }elseif ($jml_line==2) {
                $btn="info";
            }else {
                $btn="primary";
            }
            $button="<a id='Modal' class='modal_edit btn btn-flat btn-mini btn-".$btn."' href='#ModalJmlLine' role='button' data-toggle='modal'>
                    <input class='hiddenId' type='hidden' value='$id'/><input class='hiddenJmlLine' type='hidden' value='$jml_line'/>
                    $jml_line</a>";
            return $button;
        }
        $q = "SELECT p.id_pelanggan,p.nama_pelanggan,p.alamat_pelanggan,p.nomor_rumah, 
                p.kelurahan_pelanggan,p.kecamatan_pelanggan,p.kota_kabupaten_pelanggan,p.kode_pos_pelanggan,
                COUNT(*) AS jml_line
            FROM pelanggan p,sto s,line_pelanggan l
            WHERE p.nama_pelanggan LIKE '%$nama%' AND
                p.provinsi_pelanggan LIKE '%$prov%' AND 
                l.layanan_pots LIKE '%$pots%' AND 
                l.layanan_speedy LIKE '%$speedy%' AND 
                l.layanan_iptv LIKE '%$iptv%' AND 
                s.id_sto LIKE '%$sto' AND 
                l.dp_lama LIKE '%$dp_lama' AND
                l.jenis_ont LIKE '%$jenis_ont' AND
                l.isactive ='1' AND
                p.id_pelanggan=l.id_pelanggan AND
                p.id_sto=s.id_sto
            GROUP BY p.id_pelanggan
            LIMIT $limit_start,$limit_end";
        $d = mysql_query($q) or die(mysql_error());
        
        $i=$limit_start+1;
        while($data=mysql_fetch_array($d)){ 
            echo "<tr>";
            echo "    <td>".$i."</td>";
            echo "    <td>".$data['id_pelanggan']."</td>";
            echo "    <td>".$data['nama_pelanggan']."</td>";
            echo "    <td>".$data['alamat_pelanggan']."</td>";
            echo "    <td>".$data['nomor_rumah']."</td>";
            echo "    <td>".$data['kelurahan_pelanggan']."</td>";
            echo "    <td>".$data['kecamatan_pelanggan']."</td>";
            echo "    <td>".$data['kota_kabupaten_pelanggan']."</td>";
            echo "    <td>".$data['kode_pos_pelanggan']."</td>";
            echo "    <td style='padding-top:0px;padding-bottom:0px;'>".getButton($data['jml_line'],$data['id_pelanggan'])."</td>";
            echo "</tr>";
            $i++;
        } 
        echo '<script> 
                $(document).ready(function(){ 
                    var i=1;
                    var page;
                    $(".modal_edit").click(function(){ 
                        var id=$(this).find(".hiddenId").val();
                        var jml_line=$(this).find(".hiddenJmlLine").val();
                        i++;
                         console.log(i);
                        $("#getLinePelanggan").load("get_data.php","op=get_line_pelanggan&idp="+id+"&jml_line="+jml_line);
                    });
                    
                }); 
            </script> ';
    }
    public function getLinePelanggan($id_pelanggan,$jml_line,$hak){
        $q="SELECT *
            FROM line_pelanggan
            WHERE id_pelanggan='$id_pelanggan' AND isactive='1'";
        $d=mysql_query($q);
        $d_header=mysql_query($q);
        $data_header=mysql_fetch_array($d_header);
        echo '
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="icon-remove-circle"></i></button>
                <input type="hidden" id="myModalId"></input>
                <h3 id="myModalLabel">ID Pelanggan :</i> '.$data_header['id_pelanggan'].'</h3>
            </div>
            <div class="modal-body" >';
        while ($data=mysql_fetch_array($d)) {
        echo '
                <div class="row-fluid"> 
                    <div class="span5">
                        <input type="hidden" class="hiddenIdLinePelanggan" value="'.$data['id_line_pelanggan'].'"></input>
                        <p>Jenis ONT : '.$data['jenis_ont'].'</p>
                        <p>DP Lama : '.$data['dp_lama'].'</p>
                    </div>
                    <div class="span5">
                        <p>POTS :'.$data['layanan_pots'].'</p>
                        <p>Speedy :'.$data['layanan_speedy'].'</p>
                        <p>IPTV :'.$data['layanan_iptv'].'</p>
                    </div>';
                if ($hak!="call"){
        echo '
                    <div class="span2">
                        <button type="button" class="close delline" data-dismiss="modal" aria-hidden="true"><i class="icon-trash"></i></button><br />
                        <a type="button" href="./?tab='.$jml_line.'&edit=1&idp='.$id_pelanggan.'" class="close editline" style="margin-top:5px;"><i class="icon-pencil"></i></a>
                    </div>';
                }
        echo '
                </div>
                <hr />';

        }
        echo "</div>
            <script> 
                $(document).ready(function(){ 
                    var i=1;
                    $('.delline').click(function(){ 
                        var idlp=$('.hiddenIdLinePelanggan').val();
                         console.log(idlp);
                        $('#getLinePelanggan').load('get_data.php','del=del_line_pelanggan&idlp='+idlp,function(){
                            $('#get_data').load('get_data.php','op=get_all_pelanggan&limit=0');
                            $('#get_pagination').load('get_data.php','op=get_pagination&p=1');
                        });
                    });
                    
                }); 
            </script> ";
    }
    public function getEditPelanggan($id){
        $d=mysql_query("SELECT p.nama_pelanggan,p.alamat_pelanggan,p.nomor_rumah,p.kode_pos_pelanggan,
            p.provinsi_pelanggan,s.nama_sto,p.kota_kabupaten_pelanggan,p.kecamatan_pelanggan,p.kelurahan_pelanggan
            FROM pelanggan AS p, sto AS s
            WHERE p.id_sto=s.id_sto AND p.id_pelanggan='$id'");
        $data=mysql_fetch_array($d);

        echo $data['nama_pelanggan']."|".$data['alamat_pelanggan']."|".
            $data['nomor_rumah']."|".$data['kode_pos_pelanggan']."|".
            $data['provinsi_pelanggan']."|".$data['nama_sto']."|".
            $data['kota_kabupaten_pelanggan']."|".$data['kecamatan_pelanggan']."|".$data['kelurahan_pelanggan']."|"; 


        $d_line=mysql_query("SELECT l.id_line_pelanggan,l.jenis_ont,l.dp_lama,l.layanan_pots,l.layanan_speedy,l.layanan_iptv
            FROM pelanggan AS p, line_pelanggan AS l
            WHERE p.id_pelanggan=l.id_pelanggan AND l.id_pelanggan='$id'");
        while($data_line=mysql_fetch_array($d_line)){
            echo $data_line['id_line_pelanggan']."|".$data_line['dp_lama']."|".$data_line['jenis_ont']."|".
                $data_line['layanan_pots']."|".$data_line['layanan_speedy']."|".$data_line['layanan_iptv']."|";
        }
    }
    public function getPagination($page){
        $query="SELECT DISTINCT lp.id_pelanggan FROM pelanggan AS p,line_pelanggan AS lp WHERE p.id_pelanggan=lp.id_pelanggan AND lp.isactive='1'";
        $result=mysql_query($query);
        $jml_data=mysql_num_rows($result);
        $limit_data=30;
        if ($jml_data<$limit_data){
            $jml_page=1;
        }else{
            $jml_page=$jml_data/$limit_data;
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
                    var page_first,page_prev,page_next,page_last;
                    $('.page').click(function(e){
                        page=$( e.target ).closest('.page').html();
                        console.log(page);

                        $('#get_data').load('get_data.php','op=get_all_pelanggan&limit='+(page-1));
                        $('#get_pagination').load('get_data.php','op=get_pagination&p='+page);
                    });
                    $('#page_first').click(function(){
                        $('#get_data').load('get_data.php','op=get_all_pelanggan&limit=0');
                        $('#get_pagination').load('get_data.php','op=get_pagination&p=1');
                    });
                    $('#page_prev').click(function(){
                        page_prev=page-1;
                        $('#get_data').load('get_data.php','op=get_all_pelanggan&limit='+(page_prev-1));
                        $('#get_pagination').load('get_data.php','op=get_pagination&p='+page_prev);
                    });
                    $('#page_next').click(function(){
                        page_next=page+1;
                        $('#get_data').load('get_data.php','op=get_all_pelanggan&limit='+page);
                        $('#get_pagination').load('get_data.php','op=get_pagination&p='+page_next);
                    });
                    $('#page_last').click(function(){
                        page_last=".$jml_page.";
                        $('#get_data').load('get_data.php','op=get_all_pelanggan&limit='+(page_last-1));
                        $('#get_pagination').load('get_data.php','op=get_pagination&p='+page_last);
                    });
                    $('#page_go').click(function(){
                        page=$('#page_input').val();
                        $('#get_data').load('get_data.php','op=get_all_pelanggan&limit='+(page-1));
                        $('#get_pagination').load('get_data.php','op=get_pagination&p='+page);
                    });
                }); 
            </script> ";
    }

    public function delLinePelanggan($id_line_pelanggan,$updateby){
        $result = mysql_query("UPDATE line_pelanggan SET isactive='0',updateby='$updateby',updatedate=NOW() WHERE id_line_pelanggan='$id_line_pelanggan'");
        if ($result) {
            $result = mysql_query("SELECT id_pelanggan FROM line_pelanggan WHERE id_line_pelanggan='$id_line_pelanggan'");
            $data=mysql_fetch_array($result);
            $data_id_pelanggan=$data['id_pelanggan'];
            //LOG DELETE DATA LINE PELANGGAN
            $result_log=mysql_query("INSERT INTO log (aksi,createby,createdate) VALUES('Delete Line Pelanggan -> $data_id_pelanggan','$updateby',NOW())");
            return true;
        } else {
            return false;
        }
    }
    public function getDropDownSTO($id_sto,$provinsi,$hak){
        if ($hak=="super"){
                $this->getSTO($provinsi);
        }else{
                $this->getSTO_bySTO($id_sto,$provinsi);  
        }
    }
    public function getSTO($provinsi){
        $d = $this->db_read->getSTO_all($provinsi);
        echo "<option value=''>Pilih STO</option>";
        while($data=mysql_fetch_array($d)){
            echo "<option value='".$data['id_sto']."'>".$data['nama_sto']."</option>";
        }
    }
    public function getSTO_bySTO($id_sto,$provinsi){
        $d = $this->db_read->getSTO_bySTO($id_sto,$provinsi);
        $data=mysql_fetch_array($d);
        echo "<option value='".$data['id_sto']."' selected>".$data['nama_sto']."</option>";
    }
    public function getProvinsi_bySTO($sto){
        $d = $this->db_read->getProvinsi_bySTO($sto);
        $data=mysql_fetch_array($d);
        echo "<option value='".$data['provinsi']."' selected>".$data['provinsi']."</option>";
    }
    public function getArea($id_sto){
        $d = $this->db_read->getAreaById_sto($id_sto);
        echo "<option value=''>Pilih Area</option>";
        while($data=mysql_fetch_array($d)){
            echo "<option value='".$data['id_area']."'>".$data['nama_area']."</option>";
        }
    }
    public function getProvinsi(){
        $d = $this->db_read->getAllProvinsi();
        echo "<option value=''></option>";
        while($data=mysql_fetch_array($d)){
            echo "<option value='".$data['provinsi']."'>".$data['provinsi']."</option>";
        }
    }
    public function getKabupaten($prov){
        $d = $this->db_read->getKabupatenByProv($prov);
        echo "<option value=''>Pilih Kabupaten</option>";
        while($data=mysql_fetch_array($d)){
            echo "<option value='".$data['kabupaten']."'>".$data['kabupaten']."</option>";
        }
    }
    public function getKecamatan($prov,$kab){
        $d = $this->db_read->getKecamatanByProvKab($prov,$kab,$kec);
        echo "<option value=''>Pilih Kecamatan</option>";
        while($data=mysql_fetch_array($d)){
            echo "<option value='".$data['kecamatan']."'>".$data['kecamatan']."</option>";
        }
    }
    public function getKelurahan($prov,$kab,$kec){
        $d = $this->db_read->getKelurahanByProvKabKec($prov,$kab,$kec);
        echo "<option value=''>Pilih Kelurahan</option>";
        while($data=mysql_fetch_array($d)){
            echo "<option value='".$data['kelurahan']."'>".$data['kelurahan']."</option>";
        }
    }



    public function getJenisONT_all(){
        $d = $this->db_read->getJenisONT_all();
        echo "<option value=''></option>";
        while($data=mysql_fetch_array($d)){
            echo "<option value='".$data['nama_ont']."'>".$data['nama_ont']."</option>";
        }
    }
    public function getDPLama_all(){
        $d = $this->db_read->getDPLama_all();
        echo "<option value=''></option>";
        while($data=mysql_fetch_array($d)){
            echo "<option value='".$data['dp_lama']."'>".$data['dp_lama']."</option>";
        }
    }

    public function getFormNotel($jml_tab){
        $new_jml_tab=$jml_tab+1;
        echo '
        <div class="tabbable tabs-custom" >
            <ul class="nav nav-tabs">';
                for ($i=1;$i<$jml_tab;$i++){
                echo '<li><a href="#'.$i.'A" data-toggle="tab" id="link_'.$i.'";>'.$i.'</a></li>';
                }
        echo '
                <li class="active"><a href="#'.$jml_tab.'A" data-toggle="tab">'.$jml_tab.'</a></li>
                <li><a href="?tab='.$new_jml_tab.'" id="tabPlus"><i class="micon-google-plus-2"></i></a></li>
            </ul>
            <div class="tab-content" >';

            for ($i=1;$i<=$jml_tab;$i++){
        echo '
                <div class="tab-pane active" id="'.$i.'A">
                    <form style="margin-bottom:0px;"/>
                        <input id="inputIDLine'.$i.'" type="hidden"/>
                        <div class="control-group">
                            <label class="control-label" for="inputDPLama">DP Lama</label>
                            <div class="controls">
                                <div class="widget-nav">
                                    <select id="inputDPLama'.$i.'" class="chzn-select-deselect" data-placeholder="Pilih DP Lama">';
                                        $this->getDPLama_all();
        echo'
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="inputJenisONT">Jenis ONT</label>
                            <div class="controls">
                                <div class="widget-nav" style="width:220px;">
                                    <select id="inputJenisONT'.$i.'" class="chzn-select-deselect" data-placeholder="Pilih Jenis ONT">';
                                        $this->getJenisONT_all();
        echo '
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="inputServiceExisting">Service Existing</label>
                            <div class="controls">
                                <div class="input-prepend">
                                    <span class="add-on"><i class="icon-phone"></i></span>
                                    <input id="inputPOTS'.$i.'" class="span7" type="text" placeholder="Nomor POTS" />
                                </div>
                            </div>
                            <div class="controls">
                                <div class="input-prepend">
                                    <span class="add-on"><i class="icon-globe"></i></span>
                                    <input id="inputSpeedy'.$i.'" class="span7" type="text" placeholder="Nomor Speedy" />
                                </div>
                            </div>
                            <div class="controls">
                                <div class="input-prepend">
                                    <span class="add-on"><i class="micon-film"></i></span>
                                    <input id="inputIPTV'.$i.'" class="span7" type="text" placeholder="Nomor IPTV" />
                                </div>
                            </div>
                        </div>
                    </form>
                </div>';
            }
        echo '        
            </div>
        </div>';
        echo "<script>$(document).ready(function(){ $('#link_1').click();});</script>";
    }

}
?> 

    