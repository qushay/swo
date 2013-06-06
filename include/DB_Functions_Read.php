<?php

class DB_Functions_Read {

    private $db;

    function __construct() {
        require_once '../include/DB_Connect.php';
        // connect ke database
        $this->db = new DB_Connect();
        $this->db->connect();
    }

    // destructor
    function __destruct() {
        
    }

    public function login_pengguna_web($username,$password) {
        $result = mysql_query("SELECT * FROM penggunaweb WHERE username_pengguna_web='$username' AND password_pengguna_web='$password' AND isactive='1'") or die(mysql_error());
        $no_of_rows = mysql_num_rows($result);
        if ($no_of_rows > 0) {
            $result = mysql_fetch_array($result);
            return $result;
        } else {
            // team not found
            return false;
        }
    }
    public function getAllTeam() {
        $result = mysql_query("SELECT * FROM team") or die(mysql_error());
        $no_of_rows = mysql_num_rows($result);
        if ($no_of_rows > 0) {
            $result = mysql_fetch_array($result);
            return $result;
        } else {
            // team not found
            return false;
        }
    }


    public function getAllWO() {
        $result = mysql_query("SELECT * FROM workorder") or die(mysql_error());
        $no_of_rows = mysql_num_rows($result);
        if ($no_of_rows > 0) {
            $result = mysql_fetch_array($result);
            return $result;
        } else {
            // team not found
            return false;
        }
    }

    public function getAllPengerjaanWO() {
        $result = mysql_query("SELECT * FROM pengerjaanwo") or die(mysql_error());
        $no_of_rows = mysql_num_rows($result);
        if ($no_of_rows > 0) {
            $result = mysql_fetch_array($result);
            return $result;
        } else {
            // team not found
            return false;
        }
    }
    public function getAllWOInstalasi() {
        $result = mysql_query("SELECT * FROM woistalasi") or die(mysql_error());
        $no_of_rows = mysql_num_rows($result);
        if ($no_of_rows > 0) {
            $result = mysql_fetch_array($result);
            return $result;
        } else {
            // team not found
            return false;
        }
    }

    public function getAllWOMigrasi() {
        $result = mysql_query("SELECT * FROM womigrasi") or die(mysql_error());
        $no_of_rows = mysql_num_rows($result);
        if ($no_of_rows > 0) {
            $result = mysql_fetch_array($result);
            return $result;
        } else {
            // team not found
            return false;
        }
    }

    public function getAllMaterial() {
        $result = mysql_query("SELECT * FROM material") or die(mysql_error());
        $no_of_rows = mysql_num_rows($result);
        if ($no_of_rows > 0) {
            $result = mysql_fetch_array($result);
            return $result;
        } else {
            // team not found
            return false;
        }
    }

    public function getDPLama_all() {
        $result = mysql_query("SELECT * FROM dp_lama") or die(mysql_error());
            return $result;
    }
    public function getJenisONT_all() {
        $result = mysql_query("SELECT * FROM jenis_ont") or die(mysql_error());
            return $result;
    }
    
    public function getAllPelangganAndStatusByFilter($nama,$prov,$sto,$dp_lama,$jenis_ont,$pots,$speedy,$iptv) {
        $result = mysql_query("SELECT p.id_pelanggan,p.nama_pelanggan,p.alamat_pelanggan,p.nomor_rumah, 
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
            p.id_pelanggan=l.id_pelanggan AND
            p.id_sto=s.id_sto
            GROUP BY p.id_pelanggan") or die(mysql_error());
        return $result;
    }
    public function getPelangganById($id) {
        $result = mysql_query("SELECT p.nama_pelanggan,l.layanan_pots,p.alamat_pelanggan,p.kelurahan_pelanggan,p.kecamatan_pelanggan,p.kota_kabupaten_pelanggan
            FROM pelanggan AS p, line_pelanggan AS l
            WHERE p.id_pelanggan=l.id_pelanggan AND p.id_pelanggan='$id'") or die(mysql_error());
        return $result;
    }

    public function getAllPenggunaWeb() {
        $result = mysql_query("SELECT * FROM penggunaweb") or die(mysql_error());
        $no_of_rows = mysql_num_rows($result);
        if ($no_of_rows > 0) {
            $result = mysql_fetch_array($result);
            return $result;
        } else {
            // team not found
            return false;
        }
    }

    public function getAllPenggunaDevice() {
        $result = mysql_query("SELECT * FROM penggunadevice") or die(mysql_error());
        $no_of_rows = mysql_num_rows($result);
        if ($no_of_rows > 0) {
            $result = mysql_fetch_array($result);
            return $result;
        } else {
            // team not found
            return false;
        }
    }

    public function getAllPerubahanTable() {
        $result = mysql_query("SELECT * FROM area") or die(mysql_error());
        $no_of_rows = mysql_num_rows($result);
        if ($no_of_rows > 0) {
            $result = mysql_fetch_array($result);
            return $result;
        } else {
            // team not found
            return false;
        }
    }
    public function getAllDivre() {
        $result = mysql_query("SELECT id_divre,nama_divre FROM divre") or die(mysql_error());
        return $result;
    }
    public function getSTO_all($provinsi) {
        $result = mysql_query("SELECT id_sto,nama_sto FROM sto WHERE provinsi='$provinsi'") or die(mysql_error());
        return $result;
    }
    public function getSTO_bySTO($id_sto) {
        $result = mysql_query("SELECT id_sto,nama_sto FROM sto WHERE id_sto='$id_sto'") or die(mysql_error());
        return $result;
    }
    public function getProvinsi_bySTO($id_sto) {
        $result = mysql_query("SELECT id_sto,provinsi FROM sto WHERE id_sto='$id_sto'") or die(mysql_error());
        return $result;
    }
    public function getSTOByDivre($divre) {
        $result = mysql_query("SELECT id_sto,nama_sto FROM sto WHERE id_divre='$divre'") or die(mysql_error());
        return $result;
    }
    public function getAreaById_sto($id_sto) {
        $result = mysql_query("SELECT id_area,nama_area FROM area WHERE id_sto='$id_sto'") or die(mysql_error());
        return $result;
    }

    public function getAllProvinsi() {
        $result = mysql_query("SELECT DISTINCT(provinsi) FROM tb_kab_kec_kel") or die(mysql_error());
        return $result;
    }
    public function getKabupatenByProv($prov) {
        $result = mysql_query("SELECT DISTINCT(kabupaten) FROM tb_kab_kec_kel WHERE provinsi='$prov'") or die(mysql_error());
        return $result;
    }
    public function getKecamatanByProvKab($prov,$kab) {
        $result = mysql_query("SELECT DISTINCT(kecamatan) FROM tb_kab_kec_kel WHERE provinsi='$prov' AND kabupaten='$kab'") or die(mysql_error());
        return $result;
    }
    public function getKelurahanByProvKabKec($prov,$kab,$kec) {
        $result = mysql_query("SELECT DISTINCT(kelurahan) FROM tb_kab_kec_kel WHERE provinsi='$prov' AND kabupaten='$kab' AND kecamatan='$kec'") or die(mysql_error());
        return $result;
    }


    ///////////////////////////////////////////////////////////////////////////
    //GET COORDINAT
    //////////////////////////////////////////////////////////////////////////s
    public function getCoordinatDivre() {
        $result = mysql_query("SELECT nama_divre,lintang_divre,bujur_divre FROM divre ") or die(mysql_error());
        return $result;
    }
    public function getCoordinatSTObyDivre($id_divre) {
        $result = mysql_query("SELECT lintang_sto,bujur_sto FROM sto WHERE id_divre='$id_divre'") or die(mysql_error());
        return $result;
    }
    public function getCoordinatSTO($id_sto) {
        $result = mysql_query("SELECT latitude,longitude FROM sto WHERE id_sto='$id_sto'") or die(mysql_error());
        return $result;
    }
    public function getCoordinatSTObyMapBounds($ne_lat,$ne_lon,$sw_lat,$sw_lon) {
        $result = mysql_query("SELECT id_sto,nama_sto,lintang_sto,bujur_sto FROM sto WHERE (lintang_sto BETWEEN '$ne_lat' AND '$sw_lat') 
            AND (bujur_sto BETWEEN '$sw_lon' AND '$ne_lon')") or die(mysql_error());
        return $result;
    }
    public function getCoordinatFieldOps($id_sto) {
        $result = mysql_query("SELECT a.nama_team,b.lintang_pertama,b.bujur_pertama FROM team a,posisi_team b 
            WHERE a.id_sto='$id_sto' AND a.id_team=b.id_team") or die(mysql_error());
        return $result;
    }
    public function getCoordinatFObyMapBounds($ne_lat,$ne_lon,$sw_lat,$sw_lon) {
        $result = mysql_query("SELECT a.nama_team,b.lintang_pertama,b.bujur_pertama FROM team AS a, posisi_team AS b WHERE (lintang_pertama BETWEEN '$ne_lat' AND '$sw_lat') 
            AND (bujur_pertama BETWEEN '$sw_lon' AND '$ne_lon') AND a.id_team=b.id_team") or die(mysql_error());
        return $result;
    }
    public function getCoordinatFO_byMapBounds_bySTO($sto,$ne_lat,$ne_lon,$sw_lat,$sw_lon) {
        $result = mysql_query("SELECT a.nama_team,b.lintang_pertama,b.bujur_pertama FROM team AS a, posisi_team AS b 
            WHERE (lintang_pertama BETWEEN '$ne_lat' AND '$sw_lat') 
            AND (bujur_pertama BETWEEN '$sw_lon' AND '$ne_lon') AND a.id_team=b.id_team
            AND a.id_sto='$sto'") or die(mysql_error());
        return $result;
    }

    ///////////////////////////////////////////////////////////////////////
    //Work Order
    ///////////////////////////////////////////////////////////////////////

    //Instalasi//////
        //Call

    public function getAllPelangganBelum($limit_start) {
        $limit_end=30;
        $limit_start=$limit_start*$limit_end;
        $result = mysql_query("SELECT a.id_pelanggan,a.nama_pelanggan,a.alamat_pelanggan,b.status_instalasi,l.dp_lama,l.jenis_ont,l.layanan_pots,l.layanan_speedy,l.layanan_iptv
            FROM line_pelanggan AS l,pelanggan AS a LEFT JOIN woinstalasi as b ON a.id_pelanggan=b.id_pelanggan 
            WHERE l.id_pelanggan=a.id_pelanggan AND b.id_pelanggan is null
            LIMIT $limit_start,$limit_end") or die(mysql_error());
        return $result;
    }
    public function getAllPelangganBelum_bySTO($id_sto,$limit_start) {
        $limit_end=30;
        $limit_start=$limit_start*$limit_end;
        $result = mysql_query("SELECT a.id_pelanggan,a.nama_pelanggan,a.alamat_pelanggan,b.status_instalasi,l.dp_lama,l.jenis_ont,l.layanan_pots,l.layanan_speedy,l.layanan_iptv
            FROM line_pelanggan AS l,pelanggan AS a LEFT JOIN woinstalasi as b ON a.id_pelanggan=b.id_pelanggan 
            WHERE l.id_pelanggan=a.id_pelanggan AND a.id_sto='$id_sto' AND b.id_pelanggan is null
            LIMIT $limit_start,$limit_end") or die(mysql_error());
        return $result;
    }
    public function getAllPelangganAndStatus($limit_start) {
        $limit_end=30;
        $limit_start=$limit_end*$limit_start;
        $result = mysql_query(
            "SELECT a.id_pelanggan,a.nama_pelanggan,a.alamat_pelanggan,b.status_instalasi,l.dp_lama,l.jenis_ont,l.layanan_pots,l.layanan_speedy,l.layanan_iptv
            FROM line_pelanggan AS l,pelanggan AS a LEFT JOIN woinstalasi as b ON a.id_pelanggan=b.id_pelanggan 
            WHERE l.id_pelanggan=a.id_pelanggan
            UNION 
            SELECT a.id_pelanggan,a.nama_pelanggan,a.alamat_pelanggan,b.status_instalasi,l.dp_lama,l.jenis_ont,l.layanan_pots,l.layanan_speedy,l.layanan_iptv
            FROM line_pelanggan AS l,pelanggan AS a RIGHT JOIN woinstalasi as b ON a.id_pelanggan=b.id_pelanggan
            WHERE l.id_pelanggan=a.id_pelanggan 
            LIMIT $limit_start,$limit_end") or die(mysql_error());
        return $result;
    }
    public function getAllPelangganAndStatus_bySTO($sto,$penelepon,$limit_start) {
        $limit_end=30;
        $limit_start=$limit_start*$limit_end;
        if($penelepon==""){
            $result = mysql_query(
                "SELECT a.id_pelanggan,a.nama_pelanggan,a.alamat_pelanggan,b.status_instalasi,l.dp_lama,l.jenis_ont,l.layanan_pots,l.layanan_speedy,l.layanan_iptv
                FROM line_pelanggan AS l,pelanggan AS a LEFT JOIN woinstalasi as b ON a.id_pelanggan=b.id_pelanggan 
                WHERE l.id_pelanggan=a.id_pelanggan AND a.id_sto='$sto'
                UNION 
                SELECT a.id_pelanggan,a.nama_pelanggan,a.alamat_pelanggan,b.status_instalasi,l.dp_lama,l.jenis_ont,l.layanan_pots,l.layanan_speedy,l.layanan_iptv
                FROM line_pelanggan AS l,pelanggan AS a RIGHT JOIN woinstalasi as b ON a.id_pelanggan=b.id_pelanggan
                WHERE l.id_pelanggan=a.id_pelanggan AND a.id_sto='$sto'
                LIMIT $limit_start,$limit_end") or die(mysql_error());
            return $result;
        }else{
            $result = mysql_query(
                "SELECT a.id_pelanggan,a.nama_pelanggan,a.alamat_pelanggan,b.status_instalasi,l.dp_lama,l.jenis_ont,l.layanan_pots,l.layanan_speedy,l.layanan_iptv
                FROM line_pelanggan AS l,pelanggan AS a LEFT JOIN woinstalasi as b ON a.id_pelanggan=b.id_pelanggan 
                WHERE l.id_pelanggan=a.id_pelanggan AND a.id_sto='$sto' AND a.id_caller='$penelepon'
                UNION 
                SELECT a.id_pelanggan,a.nama_pelanggan,a.alamat_pelanggan,b.status_instalasi,l.dp_lama,l.jenis_ont,l.layanan_pots,l.layanan_speedy,l.layanan_iptv
                FROM line_pelanggan AS l,pelanggan AS a RIGHT JOIN woinstalasi as b ON a.id_pelanggan=b.id_pelanggan
                WHERE l.id_pelanggan=a.id_pelanggan AND a.id_sto='$sto' AND a.id_caller='$penelepon'
                LIMIT $limit_start,$limit_end") or die(mysql_error());
            return $result;
        }
    }
    public function getAllPelangganAndStatus_byStatus($status,$penelepon,$limit_start) {
        $limit_end=30;
        $limit_start=$limit_start*$limit_end;
        if($penelepon==""){
            $result = mysql_query("SELECT a.id_pelanggan,a.nama_pelanggan,a.alamat_pelanggan,b.status_instalasi,l.dp_lama,l.jenis_ont,l.layanan_pots,l.layanan_speedy,l.layanan_iptv
                FROM line_pelanggan AS l,pelanggan AS a ,woinstalasi as b 
                WHERE l.id_pelanggan=a.id_pelanggan AND a.id_pelanggan=b.id_pelanggan AND b.status_instalasi='$status'
                LIMIT $limit_start,$limit_end") or die(mysql_error());
            return $result;
        }else{
            $result = mysql_query("SELECT a.id_pelanggan,a.nama_pelanggan,a.alamat_pelanggan,b.status_instalasi,l.dp_lama,l.jenis_ont,l.layanan_pots,l.layanan_speedy,l.layanan_iptv
                FROM line_pelanggan AS l,pelanggan AS a ,woinstalasi as b 
                WHERE l.id_pelanggan=a.id_pelanggan AND a.id_pelanggan=b.id_pelanggan AND b.status_instalasi='$status' AND a.id_caller='$penelepon'
                LIMIT $limit_start,$limit_end") or die(mysql_error());
            return $result;
        }
    }
    public function getAllPelangganAndStatus_bySTOStatus($id_sto,$status,$penelepon,$limit_start) {
        $limit_end=30;
        $limit_start=$limit_start*$limit_end;
        if($penelepon==""){
            $result = mysql_query("SELECT a.id_pelanggan,a.nama_pelanggan,a.alamat_pelanggan,b.status_instalasi,l.dp_lama,l.jenis_ont,l.layanan_pots,l.layanan_speedy,l.layanan_iptv
                FROM line_pelanggan AS l,pelanggan AS a ,woinstalasi as b 
                WHERE l.id_pelanggan=a.id_pelanggan AND a.id_pelanggan=b.id_pelanggan AND a.id_sto='$id_sto' AND b.status_instalasi='$status'
                LIMIT $limit_start,$limit_end") or die(mysql_error());
            return $result;
        }else{
            $result = mysql_query("SELECT a.id_pelanggan,a.nama_pelanggan,a.alamat_pelanggan,b.status_instalasi,l.dp_lama,l.jenis_ont,l.layanan_pots,l.layanan_speedy,l.layanan_iptv
                FROM line_pelanggan AS l,pelanggan AS a ,woinstalasi as b 
                WHERE l.id_pelanggan=a.id_pelanggan AND a.id_pelanggan=b.id_pelanggan AND a.id_sto='$id_sto' AND b.status_instalasi='$status' AND a.id_caller='$penelepon'
                LIMIT $limit_start,$limit_end") or die(mysql_error());
            return $result;
        }
    }
      
 
    //Migrasi////////////////
        //Call
    public function getAllPelangganAndStatusMigrasi($limit_start) {
        $limit_end=30;
        $limit_start=$limit_start*$limit_end;
        $result = mysql_query(
            "SELECT a.id_pelanggan,a.nama_pelanggan,a.alamat_pelanggan,l.jenis_ont,l.dp_lama,l.layanan_speedy,l.layanan_pots,l.layanan_iptv,b.status_migrasi 
            FROM pelanggan AS a , womigrasi as b, line_pelanggan AS l 
            WHERE a.id_pelanggan=b.id_pelanggan AND a.id_pelanggan=l.id_pelanggan
            LIMIT $limit_start,$limit_end") or die(mysql_error());
        return $result;
    }
    public function getAllPelangganAndStatusMigrasi_byStatus($status,$limit_start) {
        $limit_end=30;
        $limit_start=$limit_start*$limit_end;
        $result = mysql_query("SELECT a.id_pelanggan,a.nama_pelanggan,a.alamat_pelanggan,b.status_migrasi,l.dp_lama,l.jenis_ont,l.layanan_pots,l.layanan_speedy,l.layanan_iptv
            FROM line_pelanggan AS l,pelanggan AS a ,womigrasi as b 
            WHERE l.id_pelanggan=a.id_pelanggan AND a.id_pelanggan=b.id_pelanggan AND b.status_migrasi='$status'
            LIMIT $limit_start,$limit_end") or die(mysql_error());
        return $result;
    }
    public function getAllPelangganAndStatusMigrasi_bySTO($sto,$limit_start) {
        $limit_end=30;
        $limit_start=$limit_start*$limit_end;
        $result = mysql_query("SELECT a.id_pelanggan,a.nama_pelanggan,a.alamat_pelanggan,l.jenis_ont,l.dp_lama,l.layanan_speedy,l.layanan_pots,l.layanan_iptv,b.status_migrasi 
            FROM pelanggan AS a , womigrasi as b, line_pelanggan AS l
            WHERE a.id_pelanggan=b.id_pelanggan AND a.id_pelanggan=l.id_pelanggan
            AND a.id_sto='$sto'
            LIMIT $limit_start,$limit_end") or die(mysql_error());
        return $result;
    }
    public function getAllPelangganAndStatusMigrasi_bySTOStatus($id_sto,$status,$limit_start) {
        $limit_end=30;
        $limit_start=$limit_start*$limit_end;
        $result = mysql_query("SELECT a.id_pelanggan,a.nama_pelanggan,a.alamat_pelanggan,b.status_migrasi,l.dp_lama,l.jenis_ont,l.layanan_pots,l.layanan_speedy,l.layanan_iptv
            FROM line_pelanggan AS l,pelanggan AS a ,womigrasi as b 
            WHERE l.id_pelanggan=a.id_pelanggan AND a.id_pelanggan=b.id_pelanggan AND a.id_sto='$id_sto' AND b.status_migrasi='$status'
            LIMIT $limit_start,$limit_end") or die(mysql_error());
        return $result;
    }
    public function getAllPelangganBelumMigrasi($limit_start) {
        $limit_end=30;
        $limit_start=$limit_start*$limit_end;
        $result = mysql_query("SELECT a.id_pelanggan,a.nama_pelanggan,a.alamat_pelanggan,b.status_migrasi,l.dp_lama,l.jenis_ont,l.layanan_pots,l.layanan_speedy,l.layanan_iptv 
            FROM line_pelanggan AS l,pelanggan AS a ,womigrasi as b  
            WHERE l.id_pelanggan=a.id_pelanggan AND a.id_pelanggan=b.id_pelanggan AND a.id_sto='$id_sto' AND b.status_migrasi='belum'
            LIMIT $limit_start,$limit_end") or die(mysql_error());
        return $result;
    }
    public function getAllPelangganBelumMigrasi_bySTO($id_sto,$limit_start) {
        $limit_end=30;
        $limit_start=$limit_start*$limit_end;
        $result = mysql_query("SELECT a.id_pelanggan,a.nama_pelanggan,a.alamat_pelanggan,b.status_migrasi,l.dp_lama,l.jenis_ont,l.layanan_pots,l.layanan_speedy,l.layanan_iptv 
            FROM line_pelanggan AS l,pelanggan AS a ,womigrasi as b  
            WHERE l.id_pelanggan=a.id_pelanggan AND a.id_pelanggan=b.id_pelanggan AND a.id_sto='$id_sto' AND b.status_migrasi='belum'
            LIMIT $limit_start,$limit_end") or die(mysql_error());
        return $result;
    }
       
    //Jadwal/////////////////
    public function getAllFO_bySTO($id_sto) {
        if ($id_sto==""){
            $result = mysql_query("SELECT t.id_team,t.nama_team,at.nama_anggotateam,at.no_telpon
                FROM team AS t,anggotateam AS at
                WHERE t.id_team=at.id_team AND at.jabatan_anggotateam='Ketua'") or die(mysql_error());
            return $result;
        }else{
            $result = mysql_query("SELECT t.id_team,t.nama_team,at.nama_anggotateam,at.no_telpon
                FROM team AS t,anggotateam AS at
                WHERE t.id_sto='$id_sto' AND t.id_team=at.id_team AND at.jabatan_anggotateam='ketua'") or die(mysql_error());
            return $result;
        }
    } 
    public function getJadwalFO_byTeam_Tgl($id_team,$wo,$tgl_janji) {
        if($tgl_janji==""){
            $result = mysql_query("SELECT pk.id_wo,pk.jam_janji,p.alamat_pelanggan,p.kelurahan_pelanggan
                        FROM pelanggan AS p,pekerjaan AS pk, womigrasi AS wm
                        WHERE p.id_pelanggan=pk.id_pelanggan AND pk.id_team='$id_team' 
                        AND pk.id_wo=wm.id_womigrasi AND wm.status_migrasi<>'selesai' 
                    UNION
                    SELECT pk.id_wo,pk.jam_janji,p.alamat_pelanggan,p.kelurahan_pelanggan
                        FROM pelanggan AS p,pekerjaan AS pk, woinstalasi AS wi
                        WHERE p.id_pelanggan=pk.id_pelanggan AND pk.id_team='$id_team' 
                        AND pk.id_wo=wi.id_woinstalasi AND wi.status_instalasi<>'selesai'") or die(mysql_error());
                return $result;
            // if ($wo=="instalasi"){
            //     $result = mysql_query("SELECT pk.id_wo,pk.jam_janji,p.alamat_pelanggan
            //         FROM pelanggan AS p,pekerjaan AS pk, woinstalasi AS wi
            //         WHERE p.id_pelanggan=pk.id_pelanggan AND pk.id_team='$id_team' 
            //             AND pk.id_wo=wi.id_woinstalasi AND wi.status_instalasi<>'selesai'
            //         ORDER BY pk.jam_janji ") or die(mysql_error());
            //     return $result;
            // }elseif ($wo=="migrasi") {
            //     $result = mysql_query("SELECT pk.id_wo,pk.jam_janji,p.alamat_pelanggan
            //         FROM pelanggan AS p,pekerjaan AS pk, womigrasi AS wm
            //         WHERE p.id_pelanggan=pk.id_pelanggan AND pk.id_team='$id_team' 
            //             AND pk.id_wo=wm.id_womigrasi AND wm.status_migrasi<>'selesai'
            //         ORDER BY pk.jam_janji ") or die(mysql_error());
            //     return $result;
            // }
        }else{

            $result = mysql_query("SELECT pk.id_wo,pk.jam_janji,p.alamat_pelanggan,p.kelurahan_pelanggan
                        FROM pelanggan AS p,pekerjaan AS pk, womigrasi AS wm
                        WHERE p.id_pelanggan=pk.id_pelanggan AND pk.id_team='$id_team' 
                        AND pk.id_wo=wm.id_womigrasi AND wm.status_migrasi<>'selesai' 
                        AND DATE(pk.jam_janji)='$tgl_janji'
                    UNION
                    SELECT pk.id_wo,pk.jam_janji,p.alamat_pelanggan,p.kelurahan_pelanggan
                        FROM pelanggan AS p,pekerjaan AS pk, woinstalasi AS wi
                        WHERE p.id_pelanggan=pk.id_pelanggan AND pk.id_team='$id_team' 
                        AND pk.id_wo=wi.id_woinstalasi AND wi.status_instalasi<>'selesai'
                        AND DATE(pk.jam_janji)='$tgl_janji'") or die(mysql_error());
                return $result;
            // if ($wo=="instalasi"){
            //     $result = mysql_query("SELECT pk.id_wo,pk.jam_janji,p.alamat_pelanggan
            //         FROM pelanggan AS p,pekerjaan AS pk, woinstalasi AS wi
            //         WHERE p.id_pelanggan=pk.id_pelanggan AND pk.id_team='$id_team' 
            //             AND pk.id_wo=wi.id_woinstalasi AND wi.status_instalasi<>'selesai'
            //             AND DATE(pk.jam_janji)='$tgl_janji'
            //         ORDER BY pk.jam_janji ") or die(mysql_error());
            //     return $result;
            // }elseif ($wo=="migrasi") {
            //     $result = mysql_query("SELECT pk.id_wo,pk.jam_janji,p.alamat_pelanggan
            //         FROM pelanggan AS p,pekerjaan AS pk, womigrasi AS wm
            //         WHERE p.id_pelanggan=pk.id_pelanggan AND pk.id_team='$id_team' 
            //             AND pk.id_pelanggan=wm.id_pelanggan AND wm.status_migrasi<>'selesai'
            //             AND DATE(pk.jam_janji)='$tgl_janji'
            //         ORDER BY pk.jam_janji ") or die(mysql_error());
            //     return $result;
            // }
        }
    }
    public function inputWO($id_team,$id_wo,$tipe_wo,$createby) {
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

    //Wo Reject//////////
    public function getWORejected($limit_start) {
        $limit_end=30;
        $limit_start=$limit_start*$limit_end;
        $result = mysql_query("SELECT s.nama_sto,wr.createdate,wr.keterangan,p.nama_pelanggan,p.alamat_pelanggan,pw.nama 
            FROM woreject AS wr,sto AS s, pelanggan AS p, penggunaweb AS pw, line_pelanggan AS l
            WHERE wr.id_sto=s.id_sto AND wr.id_pelanggan=p.id_pelanggan AND wr.id_pelanggan=l.id_pelanggan AND wr.createby=pw.id_pengguna_web
            LIMIT $limit_start,$limit_end") or die(mysql_error());
        return $result;
    }
    public function getWORejected_bySTO($id_sto,$limit_start) {
        $limit_end=30;
        $limit_start=$limit_start*$limit_end;
        $result = mysql_query("SELECT s.nama_sto,wr.createdate,wr.keterangan,p.nama_pelanggan,p.alamat_pelanggan,pw.nama 
            FROM woreject AS wr,sto AS s, pelanggan AS p, penggunaweb AS pw, line_pelanggan AS l
            WHERE wr.id_sto=s.id_sto AND wr.id_pelanggan=p.id_pelanggan AND wr.id_pelanggan=l.id_pelanggan AND wr.createby=pw.id_pengguna_web
            AND p.id_sto='$id_sto'
            LIMIT $limit_start,$limit_end") or die(mysql_error());
        return $result;
    }

    //WO Selesai//////////
    public function getWOSelesai($limit_start) {
        $limit_end=30;
        $limit_start=$limit_start*$limit_end;
        $result = mysql_query("SELECT DISTINCT s.nama_sto,wi.id_woinstalasi,wi.tgl_instalasi,p.nama_pelanggan,p.alamat_pelanggan,wi.keterangan
            FROM pelanggan AS p, sto AS s, line_pelanggan AS l, woinstalasi AS wi
            LEFT JOIN womigrasi AS wm ON wi.id_pelanggan = wm.id_pelanggan
            WHERE  wi.id_sto=s.id_sto AND wi.id_pelanggan=p.id_pelanggan AND wi.id_pelanggan=l.id_pelanggan
            AND wi.status_instalasi='selesai' AND wm.status_migrasi <> 'selesai'
            LIMIT $limit_start,$limit_end") or die(mysql_error());
        return $result;
    }
    
}

?>
