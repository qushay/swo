<?php 
$get_dataaa=new get_data();
//if(session_status() != 2) {session_start();}  ///// cek status session
session_start();
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

        if(isset($_GET['limit'])){$limit=($_GET['limit']);}else{$limit="0";};
        if(isset($_GET['p'])){$page=($_GET['p']);}else{$page="1";};

        switch ($op) {
            case 'get_pagination':
               $get_dataaa->getPagination($page);
                break;
            case 'get_material':
               $get_dataaa->getMaterial($id_sto,$limit);
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
 
    public function getMaterial($sto,$limit_start){
        $limit_end=30;
        $i=($limit_start*$limit_end)+1;
        $limit_start=$limit_start*$limit_end;

        if ($sto==""){ /////////////////// Jika STo kosong atau yang Login SUperadmin
            $data = mysql_query(
                "SELECT pm.id_penggunaan_material,pm.id_team,t.nama_team,pm.jumlah_ont,pm.jumlah_roset,pm.kabel_50,pm.kabel_75,
                pm.kabel_100,pm.jumlah_duct,pm.jumlah_flexible_pipe,pm.updatedate,pm.createdate,pm.createby
                FROM penggunaanmaterial AS pm, team AS t
                WHERE pm.id_team=t.id_team
                ORDER BY pm.id_penggunaan_material LIMIT $limit_start,$limit_end;"
            );
        }else{
            $data = mysql_query(
                "SELECT pm.id_penggunaan_material,pm.id_team,t.nama_team,pm.jumlah_ont,pm.jumlah_roset,pm.kabel_50,pm.kabel_75,pm.kabel_100,
                    pm.jumlah_duct,pm.jumlah_flexible_pipe,pm.updatedate,pm.createdate,pm.createby
                FROM penggunaanmaterial AS pm, team AS t
                WHERE pm.id_team=t.id_team AND t.id_sto='$sto'
                ORDER BY pm.id_penggunaan_material LIMIT $limit_start,$limit_end;"
            );
        }

        while ($databaru=mysql_fetch_array($data)){
            $baca_index[$i] = $databaru['id_penggunaan_material'];                                          
            echo "<tr>";
            echo "<td>".$i."</td>";
            echo "<td>".$databaru['nama_team']."</td>";
            echo "<td>".$databaru['jumlah_ont']."</td>";
            echo "<td>".$databaru['jumlah_roset']."</td>";
            echo "<td>".$databaru['kabel_50']."</td>";
            echo "<td>".$databaru['kabel_75']."</td>";
            echo "<td>".$databaru['kabel_100']."</td>";
            echo "<td>".$databaru['jumlah_duct']."</td>";                                                       
            echo "<td>".$databaru['jumlah_flexible_pipe']."</td>";
            if($databaru['updatedate']!=""){
                echo "<td>".$databaru['updatedate']."</td>";
            }else{
                echo "<td>".$databaru['createdate']."</td>";
            }

            
            $q_createby = mysql_query("SELECT nama FROM penggunaweb WHERE id_pengguna_web='$databaru[createby]';");
            $ar_createby = mysql_fetch_array($q_createby);
            echo "<td>".$ar_createby['nama']."</td>";
            echo "<td><a href='#myModalAddMaterial' class='btn btn-small btn-cl' id='filter' data-toggle='modal' onClick=clickAddMaterial('$databaru[id_team]','$databaru[sn_ont]')>Add</td>";
            echo "<td><a href='#myModal' class='btn btn-small btn-primary' id='filter' data-toggle='modal' onClick=setIdValue('$baca_index[$i]','$databaru[jumlah_ont]')>Detail</td>";
            echo "</tr>";
            
            $i++;
            
        }
    }

    public function getPagination($page){
        $query="SELECT * FROM penggunaanmaterial WHERE isactive='1'";

        $result=mysql_query($query);
        $jml_data=mysql_num_rows($result);////////// Jml Data pada database

        $limit_data=30; //////////////////////////// Maksimum data yg ditamplikan dalam table

        //////////////////////////////////////////// Menentukan jml halaman
        if ($jml_data<$limit_data){
            $jml_page=1;
        }else{
            $jml_page=floor($jml_data/$limit_data);
            if ($jml_data % $limit_data !=0){
                $jml_page=$jml_page+1;
            }
        }

        //////////////////////////////////////////// Menentukan jumlah tombol halaman yang ditampilkan
        //////////////////////////////////////////// Jml tombol yang ditampilkan hanya 5, tidak semuanya
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

                        $('#get_material').load('get_data.php','op=get_material&limit='+(page-1));
                        $('#get_pagination').load('get_data.php','op=get_pagination&p='+page);
                    });
                    $('#page_first').click(function(){
                        $('#get_material').load('get_data.php','op=get_material&limit=0');
                        $('#get_pagination').load('get_data.php','op=get_pagination&p=1');
                    });
                    $('#page_prev').click(function(){
                        page_prev=page-1;
                        $('#get_material').load('get_data.php','op=get_material&limit='+(page_prev-1));
                        $('#get_pagination').load('get_data.php','op=get_pagination&p='+page_prev);
                    });
                    $('#page_next').click(function(){
                        page_next=page+1;
                        $('#get_material').load('get_data.php','op=get_material&limit='+page);
                        $('#get_pagination').load('get_data.php','op=get_pagination&p='+page_next);
                    });
                    $('#page_last').click(function(){
                        page_last=".$jml_page.";
                        $('#get_material').load('get_data.php','op=get_material&limit='+(page_last-1));
                        $('#get_pagination').load('get_data.php','op=get_pagination&p='+page_last);
                    });
                    $('#page_go').click(function(){
                        page=$('#page_input').val();
                        $('#get_material').load('get_data.php','op=get_material&limit='+(page-1));
                        $('#get_pagination').load('get_data.php','op=get_pagination&p='+page);
                    });
                }); 
            </script> ";
    }


}
?> 

    