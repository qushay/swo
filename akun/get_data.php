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


    if(isset($_GET['limit'])){$limit=($_GET['limit']);}else{$limit="0";};
    if(isset($_GET['p'])){$page=($_GET['p']);}else{$page="1";};
    if(isset($_GET['t'])){$type=($_GET['t']);}else{$type="web";};

    /////////////////////////// GET value OP
    if (isset($_GET['op'])){
        $op=$_GET['op'];
        switch ($op) {
            case 'get_pagination':
               $get_dataaa->getPagination($page,$hak,$type,$id_sto);
                break;
            case 'get_akun':
                if ($type=="web"){
                    $get_dataaa->getAkunWeb($id_sto,$limit);
                }elseif ($type=="device"){
                    $get_dataaa->getAkunDevice($id_sto,$limit);
                }else{
                    $get_dataaa->getAkunTeam($id_sto,$limit);
                }
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
 
    public function getAkunWeb($sto,$limit_start){
        $limit_end=30;
        $i=($limit_start*$limit_end)+1;
        $limit_start=$limit_start*$limit_end;

        if ($sto==""){ /////////////////// Jika STo kosong atau yang Login SUperadmin
            $data = mysql_query("SELECT pw.id_pengguna_web,pw.username_pengguna_web,pw.password_pengguna_web,pw.hak_pengguna_web,
                    s.nama_sto,pw.nama,pw.id_sto
                FROM penggunaweb AS pw, sto AS s
                WHERE pw.isactive=1 AND pw.id_sto=s.id_sto
                LIMIT $limit_start,$limit_end");
        }else{
            $data = mysql_query("SELECT pw.id_pengguna_web,pw.username_pengguna_web,pw.password_pengguna_web,pw.hak_pengguna_web,
                    s.nama_sto,pw.nama,pw.id_sto
                FROM penggunaweb AS pw,sto AS s
                WHERE pw.hak_pengguna_web='call' AND pw.id_sto=s.id_sto AND pw.id_sto='$sto' AND pw.isactive=1 
                LIMIT $limit_start,$limit_end");
        }

        function getHakPenggunaWeb($hak){
            if ($hak=="super"){$prev="Superadmin";}
            elseif ($hak=="admin") {$prev="Administrator";}
            elseif ($hak=="call") {$prev="Call Center";}
            return $prev;
        }
        $i=1;
        while ($databaru=mysql_fetch_array($data)){
            $baca_index[$i] = $databaru["id_pengguna_web"];                                         
            echo "<tr>";
            //echo "<td>".$databaru[$i]."</td>";
            echo "<td>".$i."</td>";
            //echo "<td>".$databaru[id_pengguna_web]."</td>";
            echo "<td>".$databaru['username_pengguna_web']."</td>";
            echo "<td>".$databaru['password_pengguna_web']."</td>";

            echo "<td>".$databaru['nama_sto']."</td>";
            echo "<td>".getHakPenggunaWeb($databaru['hak_pengguna_web'])."</td>";
            echo "<td>".$databaru['nama']."</td>";

            
            echo "<td><a href='#myModalEditUser' class='btn btn-small btn-primary' id='filter' data-toggle='modal' onClick=setIdValue('$baca_index[$i]','$databaru[username_pengguna_web]','$databaru[password_pengguna_web]','$databaru[id_sto]','$databaru[hak_pengguna_web]','$databaru[nama]');>Update</a></td>";
            
            
            /*echo "<td><a class='updateuser btn btn-small btn-primary' data-toggle='modal' hiddenid='$i'>
            <input class='hiddenId' type='hidden' value='$i'/>
            Update</td>";*/
            
            echo "<td><a href='#' class='btn btn-small btn-danger' id='filter' onClick=setDisable('zzzd','$databaru[id_pengguna_web]');>Disable </a></td>";
            
        
            echo "</tr>";
            
            $i++;
            
        }

/*        echo "<html>
        <script type='text/javascript' src='library/js/jquery-1.8.3.min.js'></script>
        <script type='text/javascript'>
        $(document).ready(
            function(){
                $('.updateuser').click(
                    function(){
                        var id=$(this).find('.hiddenid').val();
                        console.log('UPDATEUSER');
                        $('#myModalEditUser').load('get_data_tampil_user.php?id='+1);
                        console.log(id);                
                    }

                    )

            }
        );
        </script>
        <div id='myModalEditUser' class='modal hide fade' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
        </div>
        </html>";*/
    }

    public function getAkunDevice($sto,$limit_start){
        $limit_end=30;
        $i=($limit_start*$limit_end)+1;
        $limit_start=$limit_start*$limit_end;

        if ($sto==""){ /////////////////// Jika STo kosong atau yang Login SUperadmin
            $data = mysql_query("SELECT pd.id_pengguna_device,pd.username_pengguna_device,pd.password_pengguna_device,
                    pd.id_sto,pd.id_team,t.nama_team,s.nama_sto
                FROM penggunadevice AS pd, sto AS s, team AS t
                WHERE pd.isactive=1 AND pd.id_sto=s.id_sto AND pd.id_team=t.id_team
                LIMIT $limit_start,$limit_end");
        }else{
            $data = mysql_query("SELECT pd.id_pengguna_device,pd.username_pengguna_device,pd.password_pengguna_device,
                    pd.id_sto,pd.id_team,t.nama_team,s.nama_sto
                FROM penggunadevice AS pd, sto AS s, team AS t
                WHERE pd.id_sto=s.id_sto AND pd.id_team=t.id_team AND pd.id_sto='$sto' AND pd.isactive=1 
                LIMIT $limit_start,$limit_end");
        }

        function getHakPenggunaWeb($hak){
            if ($hak=="super"){$prev="Superadmin";}
            elseif ($hak=="admin") {$prev="Administrator";}
            elseif ($hak=="call") {$prev="Call Center";}
            return $prev;
        }

        $i=1;
        while ($databaru=mysql_fetch_array($data)){
            $baca_index[$i] = $databaru['id_pengguna_device'];                                          
            echo "<tr >";
            //echo "<td>".$databaru[$i]."</td>";
            echo "<td>".$i."</td>";
            //echo "<td>".$databaru[id_pengguna_web]."</td>";
            echo "<td>".$databaru['username_pengguna_device']."</td>";
            echo "<td>".$databaru['password_pengguna_device']."</td>";
            //echo "<td>".$databaru[id_sto]."</td>";
                                        
            echo "<td>".$databaru['nama_team']."</td>";                                      
            echo "<td>".$databaru['nama_sto']."</td>";
            
            echo "<td><a href='#myModalEditUser' class='btn btn-small btn-primary' id='filter' data-toggle='modal' onClick=setIdValue('$baca_index[$i]','$databaru[username_pengguna_device]','$databaru[password_pengguna_device]','$databaru[id_sto]','$databaru[id_team]')>Update</a>";
            echo "<a href='#' class='btn btn-small btn-danger' id='filter' onClick=setDisable('zzzd','$databaru[id_pengguna_device]');>Disable</a></td>";
            
          
            echo "</tr>";
            
            $i++;
            
        }                         
    }

   

    public function getAkunTeam($sto,$limit_start){
        $limit_end=30;
        $i=($limit_start*$limit_end)+1;
        $limit_start=$limit_start*$limit_end;

        if ($sto==""){ /////////////////// Jika STo kosong atau yang Login SUperadmin
            $data = mysql_query("SELECT t.id_team,t.nama_team,s.id_sto,s.nama_sto
                FROM team AS t, sto AS s
                WHERE t.isactive=1 AND t.id_sto=s.id_sto
                LIMIT $limit_start,$limit_end");
        }else{
            $data = mysql_query("SELECT t.id_team,t.nama_team,s.id_sto,s.nama_sto
                FROM team AS t, sto AS s
                WHERE t.isactive=1 AND t.id_sto='$sto' AND t.id_sto=s.id_sto
                LIMIT $limit_start,$limit_end");
        }
        function getHakPenggunaWeb($hak){
            if ($hak=="super"){$prev="Superadmin";}
            elseif ($hak=="admin") {$prev="Administrator";}
            elseif ($hak=="call") {$prev="Call Center";}
            return $prev;
        }

        function getTeam(){
            $testinglagi = mysql_query("SELECT nama_team from team where id_team=1");
            return $testinglagi;
        }


        $testinglagi = getTeam();

        while ($databaru=mysql_fetch_array($data)){                                          
            echo "<tr>";
            //echo "<td>".$databaru[$i]."</td>";
            echo "<td>".$i."</td>";
                                     
            echo "<td>".$databaru['nama_team']."</td>";
                                            
            echo "<td>".$databaru['nama_sto']."</td>";
            
            
            
            echo "<td><a href='#' class='btn btn-small btn-danger' id='filter' style='float:right' onClick=setDisable('zzzd','$databaru[id_team]');>Disable";
            
            echo "<a href='' class='btn btn-cl btn-small btn-primary' id='filter' data-toggle='modal' style='float:right' onClick=goToAnggotaTeam('$databaru[id_team]','$databaru[id_sto]');>Lihat Anggota";

            echo "<a href='#myModalEditUser' class='btn btn-small btn-primary' id='filter' data-toggle='modal' style='float:right' onClick=setIdValue('$databaru[id_sto]','$databaru[id_team]','$databaru[nama_team]')>Update</td>";                                            
            
            echo "</tr>";
            
            $i++;
            
        }                   
    }

    public function getPagination($page,$hak,$type,$sto){
        if($hak=="super"){
            if ($type=="web"){
                $query="SELECT * FROM penggunaweb WHERE isactive='1'";
            }elseif ($type=="device") {
                $query="SELECT * FROM penggunadevice WHERE isactive='1'";
            }else{
                $query="SELECT * FROM team WHERE isactive='1'";
            }
            
        }else{
            if ($type=="web"){
                $query="SELECT * FROM penggunaweb WHERE hak_pengguna_web='call' AND id_sto='$sto' AND isactive='1'";
            }elseif ($type=="device") {
                $query="SELECT * FROM penggunadevice WHERE id_sto='$sto' AND isactive='1'";
            }else{
                $query="SELECT * FROM team WHERE id_sto='$sto' AND isactive='1'";
            }
            
        }
        

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
                    var t='".$type."';
                    var page_first,page_prev,page_next,page_last;
                    $('.page').click(function(e){
                        page=$( e.target ).closest('.page').html();
                        console.log(page);

                        $('#get_akun').load('get_data.php','op=get_akun&t='+t+'&limit='+(page-1));
                        $('#get_pagination').load('get_data.php','op=get_pagination&t='+t+'&p='+page);
                    });
                    $('#page_first').click(function(){
                        $('#get_akun').load('get_data.php','op=get_akun&t='+t+'&limit=0');
                        $('#get_pagination').load('get_data.php','op=get_pagination&t='+t+'&p=1');
                    });
                    $('#page_prev').click(function(){
                        page_prev=page-1;
                        $('#get_akun').load('get_data.php','op=get_akun&t='+t+'&limit='+(page_prev-1));
                        $('#get_pagination').load('get_data.php','op=get_pagination&t='+t+'&p='+page_prev);
                    });
                    $('#page_next').click(function(){
                        page_next=page+1;
                        $('#get_akun').load('get_data.php','op=get_akun&t='+t+'&limit='+page);
                        $('#get_pagination').load('get_data.php','op=get_pagination&t='+t+'&p='+page_next);
                    });
                    $('#page_last').click(function(){
                        page_last=".$jml_page.";
                        $('#get_akun').load('get_data.php','op=get_akun&t='+t+'&limit='+(page_last-1));
                        $('#get_pagination').load('get_data.php','op=get_pagination&t='+t+'&p='+page_last);
                    });
                    $('#page_go').click(function(){
                        page=$('#page_input').val();
                        $('#get_akun').load('get_data.php','op=get_akun&t='+t+'&limit='+(page-1));
                        $('#get_pagination').load('get_data.php','op=get_pagination&t='+t+'&p='+page);
                    });
                }); 
            </script> ";
    }

}
?> 


    