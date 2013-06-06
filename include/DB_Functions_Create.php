<?php

class DB_Functions_Create {

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

    public function inputSTO($id_sto,$nama_sto,$prov,$alamat,$lintang,$bujur,$pembuat_sto) {
        //cek existensi sto
        $result = mysql_query("SELECT * FROM sto WHERE nama_sto = '$nama_sto'");
        $no_of_rows = mysql_num_rows($result);
        if ($no_of_rows > 0) {
            return false;
        } else {
            //simpan sto jika belum exist
            $query= "INSERT INTO sto (id_sto,nama_sto,provinsi,alamat,lintang_sto,bujur_sto,createby,createdate) 
                VALUES ('$id_sto','$nama_sto','$prov','$alamat','$lintang','$bujur','$pembuat_sto',NOW())";
            $result = mysql_query($query);
            if ($result) {
                //LOG INSERT DATA STO
                $result_log=mysql_query("INSERT INTO log (aksi,createby,createdate) VALUES('Input STO -> $nama_sto','$pembuat_sto',NOW)");
                $uid = mysql_insert_id(); // last inserted id
                $result = mysql_query("SELECT * FROM sto WHERE id_sto = $uid");
                return mysql_fetch_array($result);
            } else {
                return false;
            }
        }
        
    }

    public function inputTeam($id_sto,$nama_team,$pembuat_team) {
        //cek existensi team
        $result = mysql_query("SELECT * FROM team WHERE nama_team = '$nama_team'");
        $no_of_rows = mysql_num_rows($result);
        if ($no_of_rows > 0) {
            return false;
        } else {
            //simpan team jika belum exist
            $query= "INSERT INTO team (id_sto,nama_team,pembuat_team) VALUES ('$id_sto','$nama_team','$pembuat_team')";
            $result = mysql_query($query);
            if ($result) {
                $uid = mysql_insert_id(); // last inserted id
                $result = mysql_query("SELECT * FROM team WHERE id_team = $uid");
                return mysql_fetch_array($result);
            } else {
                return false;
            }
        }
        
    }

    public function inputArea($id_team,$nama_area,$pembuat_area) {
        //cek existensi area
        $result = mysql_query("SELECT * FROM area WHERE nama_area = '$nama_area'");
        $no_of_rows = mysql_num_rows($result);
        if ($no_of_rows > 0) {
            return false;
        } else {
            //simpan area jika belum exist
            $query= "INSERT INTO area (id_team,nama_area,pembuat_area) VALUES ('$id_team','$nama_area','$pembuat_area')";
            $result = mysql_query($query);
            if ($result) {
                $uid = mysql_insert_id(); // last inserted id
                $result = mysql_query("SELECT * FROM area WHERE id_area = $uid");
                return mysql_fetch_array($result);
            } else {
                return false;
            }
        }
        
    }

    public function inputWO($tgl_pembuatan,$pembuat_wo) {
        $query= "INSERT INTO workorder (tgl_pembuatan,pembuat_wo) VALUES ('$tgl_pembuatan','$pembuat_wo')";
        $result = mysql_query($query);
        if ($result) {
            $uid = mysql_insert_id(); // last inserted id
            $result = mysql_query("SELECT * FROM workorder WHERE id_wo = $uid");
            return mysql_fetch_array($result);
        } else {
            return false;
        }
    }

    public function inputPengerjaanWO($id_wo,$tipe_wo,$status_wo,$pembuat_pengerjaanwo) {
        $query= "INSERT INTO pengerjaanwo (id_wo,tipe_wo,status_wo,pembuat_pengerjaanwo) 
        VALUES ('$id_wo','$tipe_wo','$status_wo','$pembuat_pengerjaanwo')";
        $result = mysql_query($query);
        if ($result) {
            $uid = mysql_insert_id(); // last inserted id
            $result = mysql_query("SELECT * FROM pengerjaanwo WHERE id_pengerjaanwo = $uid");
            return mysql_fetch_array($result);
        } else {
            return false;
        }
    }

    public function inputWOInstalasi($id_wo,$waktu_instalasi,$tgl_instalasi,$status_instalasi,$pembuat_woinstalasi,
        $foto_depan_rumah,$foto_jaringan,$foto_roset,$foto_bobokan,$keterangan) {
        $query= "INSERT INTO woinstalasi (id_wo,waktu_instalasi,tgl_instalasi,status_instalasi,pembuat_woinstalasi
            $foto_depan_rumah,$foto_jaringan,$foto_roset,$foto_bobokan,$keterangan) 
        VALUES ('$id_wo','$waktu_instalasi','$tgl_instalasi','$status_instalasi','$pembuat_woinstalasi',
            '$foto_depan_rumah','$foto_jaringan','$foto_roset','$foto_bobokan','$keterangan')";
        $result = mysql_query($query);
        if ($result) {
            $uid = mysql_insert_id(); // last inserted id
            $result = mysql_query("SELECT * FROM woinstalasi WHERE id_woinstalasi = $uid");
            return mysql_fetch_array($result);
        } else {
            return false;
        }
    }

    public function inputWOMigrasi($id_wo,$waktu_migrasi,$tgl_migrasi,$status_migrasi,$pembuat_womigrasi,
        $foto_depan_rumah,$foto_samping_rumah,$keterangan) {
        $query= "INSERT INTO womigrasi (id_wo,waktu_migrasi,tgl_migrasi,pembuat_womigrasi,
            foto_depan_rumah,foto_samping_rumah,keterangan) 
        VALUES ('$id_wo','$waktu_migrasi','$tgl_migrasi','$pembuat_womigrasi','$foto_depan_rumah','$foto_samping_rumah','$keterangan')";
        $result = mysql_query($query);
        if ($result) {
            $uid = mysql_insert_id(); // last inserted id
            $result = mysql_query("SELECT * FROM womigrasi WHERE id_womigrasi = $uid");
            return mysql_fetch_array($result);
        } else {
            return false;
        }
    }

    public function inputMaterial($nama_material,$pembuat_material) {
        //cek existensi
        $result = mysql_query("SELECT * FROM material WHERE nama_material = '$nama_material'");
        $no_of_rows = mysql_num_rows($result);
        if ($no_of_rows > 0) {
            return false;
        } else {
            //simpan jika belum exist
            $query= "INSERT INTO material (nama_material,pembuat_material) VALUES ('$nama_material','$pembuat_material')";
            $result = mysql_query($query);
            if ($result) {
                $uid = mysql_insert_id(); // last inserted id
                $result = mysql_query("SELECT * FROM material WHERE id_material = $uid");
                return mysql_fetch_array($result);
            } else {
                return false;
            }
        }
    } 

    public function inputPenggunaanMaterial($id_material,$id_team,$serial_number_material,$sisa_material,$pembuat_penggunaan_material) {
        //cek existensi
        $result = mysql_query("SELECT * FROM penggunaanmaterial WHERE serial_number_material = '$serial_number_material'");
        $no_of_rows = mysql_num_rows($result);
        if ($no_of_rows > 0) {
            return false;
        } else {
            //simpan jika belum exist
            $query= "INSERT INTO penggunaanmaterial (id_material,id_team,serial_number_material,sisa_material,pembuat_penggunaan_material) 
            VALUES ('$id_material','$id_team','$serial_number_material','$sisa_material','$pembuat_penggunaan_material')";
            $result = mysql_query($query);
            if ($result) {
                $uid = mysql_insert_id(); // last inserted id
                $result = mysql_query("SELECT * FROM penggunaanmaterial WHERE id_penggunaan_material = $uid");
                return mysql_fetch_array($result);
            } else {
                return false;
            }
        }
    } 

    

    public function inputPenggunaWeb($username_pengguna_web,$password_pengguna_web,$id_sto,$hak_pengguna_web,$pembuat_pengguna_web) {
        //cek existensi
        $result = mysql_query("SELECT * FROM penggunaweb WHERE username_pengguna_web = '$username_pengguna_web'");
        $no_of_rows = mysql_num_rows($result);
        if ($no_of_rows > 0) {
            return false;
        } else {
            //simpan jika belum exist
            $query= "INSERT INTO penggunaweb (username_pengguna_web,password_pengguna_web,id_sto,hak_pengguna_web,pembuat_pengguna_web) 
            VALUES ('$username_pengguna_web','$password_pengguna_web','$id_sto','$hak_pengguna_web','$pembuat_pengguna_web')";
            $result = mysql_query($query);
            if ($result) {
                $uid = mysql_insert_id(); // last inserted id
                $result = mysql_query("SELECT * FROM penggunaweb WHERE id_pengguna_web = $uid");
                return mysql_fetch_array($result);
            } else {
                return false;
            }
        }
    }

    public function inputPenggunaDevice($id_sto,$id_team,$id_area,$username_pengguna_device,$password_pengguna_device,
        $interval_update_posisi,$pembuat_pengguna_device) {
        //cek existensi
        $result = mysql_query("SELECT * FROM penggunadevice WHERE username_pengguna_device = '$username_pengguna_device'");
        $no_of_rows = mysql_num_rows($result);
        if ($no_of_rows > 0) {
            return false;
        } else {
            //simpan jika belum exist
            $query= "INSERT INTO penggunadevice (id_sto,id_team,id_area,username_pengguna_device,password_pengguna_device,
                interval_update_posisi,pembuat_pengguna_device) 
            VALUES ('$id_sto','$id_team','$id_area','$username_pengguna_device','$password_pengguna_device',
                '$interval_update_posisi','$pembuat_pengguna_device')";
            $result = mysql_query($query);
            if ($result) {
                $uid = mysql_insert_id(); // last inserted id
                $result = mysql_query("SELECT * FROM penggunadevice WHERE id_pengguna_device = $uid");
                return mysql_fetch_array($result);
            } else {
                return false;
            }
        }
    } 

    public function inputPerubahanTable($nama_table,$tgl_perubahan) {
        //cek existensi
        $result = mysql_query("SELECT * FROM perubahantable WHERE nama_table = '$nama_table'");
        $no_of_rows = mysql_num_rows($result);
        if ($no_of_rows > 0) {
            return false;
        } else {
            //simpan jika belum exist
            $query= "INSERT INTO perubahantable (nama_table,tgl_perubahan) 
            VALUES ('$nama_table','$tgl_perubahan')";
            $result = mysql_query($query);
            if ($result) {
                $uid = mysql_insert_id(); // last inserted id
                $result = mysql_query("SELECT * FROM perubahantable WHERE id_perubahan = $uid");
                return mysql_fetch_array($result);
            } else {
                return false;
            }
        }
    }

    //Store WO Instalasi
    public function setWOPending($id_pelanggan,$id_sto,$createdby) {

        function generateIDWO($id_pelanggan,$id_sto){
            $id="1-".$id_sto."-".$id_pelanggan;
            return $id;
        }

        $id_woinstalasi=generateIDWO($id_pelanggan,$id_sto);
        $status_instalasi="pending1";

        $result = mysql_query("SELECT * FROM woinstalasi WHERE id_pelanggan = '$id_pelanggan'");
        $no_of_rows = mysql_num_rows($result);

        if ($no_of_rows > 0) {
            $data=mysql_fetch_array($result);
            if ($data['status_instalasi']=="pending1"){$status_instalasi="pending2";}
            if ($data['status_instalasi']=="pending2"){$status_instalasi="ditolak";}
            $query= "UPDATE woinstalasi SET status_instalasi='$status_instalasi',updateby='$createdby',updatedate=NOW()
                    WHERE id_pelanggan='$id_pelanggan'";
            $result = mysql_query($query);
            if ($result) {
                //LOG CALL INSTALASI
                $result_log=mysql_query("INSERT INTO log (aksi,createby,createdate) VALUES ('Call Instalasi ($status_instalasi) > $id_pelanggan','$createdby',NOW())");
                return true;
            } else {
                return false;
            }
        } else {
            //simpan jika belum exist
            $query= "INSERT INTO woinstalasi (id_woinstalasi,id_pelanggan,id_sto,status_instalasi,createby,createdate) 
            VALUES ('$id_woinstalasi','$id_pelanggan','$id_sto','$status_instalasi','$createdby',NOW())";
            $result = mysql_query($query);
            if ($result) {
                //LOG CALL INSTALASI
                $result_log=mysql_query("INSERT INTO log (aksi,createby,createdate) VALUES ('Call Instalasi (pending1) > $id_pelanggan','$createdby',NOW())");
                return true;
            } else {
                return false;
            }
        }
    }
    public function setWONotone($id_pelanggan,$id_sto,$createdby) {
        //cek existensi
        function generateIDWO($id_pelanggan,$id_sto){
            $id="1-".$id_sto."-".$id_pelanggan;
            return $id;
        }

        $id_woinstalasi=generateIDWO($id_pelanggan,$id_sto);
        $status_instalasi="notone";

        $result = mysql_query("SELECT * FROM woinstalasi WHERE id_pelanggan = '$id_pelanggan'");
        $no_of_rows = mysql_num_rows($result);

        if ($no_of_rows > 0) {
            $query= "UPDATE woinstalasi SET status_instalasi='$status_instalasi',updateby='$createdby',updatedate=NOW()
                    WHERE id_pelanggan='$id_pelanggan'";
            $result = mysql_query($query);
            if ($result) {
                //LOG CALL INSTALASI
                $result_log=mysql_query("INSERT INTO log (aksi,createby,createdate) VALUES ('Call Instalasi (no tone) > $id_pelanggan','$createdby',NOW())");
                return true;
            } else {
                return false;
            }
        } else {
            //simpan jika belum exist
            $query= "INSERT INTO woinstalasi (id_woinstalasi,id_pelanggan,id_sto,status_instalasi,createby,createdate) 
            VALUES ('$id_woinstalasi','$id_pelanggan','$id_sto','$status_instalasi','$createdby',NOW())";
            $result = mysql_query($query);
            if ($result) {
                //LOG CALL INSTALASI
                $result_log=mysql_query("INSERT INTO log (aksi,createby,createdate) VALUES ('Call Instalasi (no tone) > $id_pelanggan','$createdby',NOW())");
                return true;
            } else {
                return false;
            }
        }
    }
    public function setWODitolak($id_pelanggan,$id_sto,$catatan,$penerima,$createdby) {
        //cek existensi
        function generateIDWO($id_pelanggan,$id_sto){
            $id="1-".$id_sto."-".$id_pelanggan;
            return $id;
        }

        $id_woinstalasi=generateIDWO($id_pelanggan,$id_sto);
        $status_instalasi="ditolak";

        $result = mysql_query("SELECT * FROM woinstalasi WHERE id_pelanggan = '$id_pelanggan'");
        $no_of_rows = mysql_num_rows($result);

        if ($no_of_rows > 0) {
            $query= "UPDATE woinstalasi SET status_instalasi='$status_instalasi',updateby='$createdby',updatedate=NOW()
                    WHERE id_pelanggan='$id_pelanggan'";
            $result = mysql_query($query);
            if ($result) {
                //LOG CALL INSTALASI
                $result_log=mysql_query("INSERT INTO log (aksi,createby,createdate) VALUES ('Call Instalasi (ditolak) > $id_pelanggan','$createdby',NOW())");
                return true;
            } else {
                return false;
            }
        } else {
            //simpan jika belum exist
            $query= "INSERT INTO woinstalasi (id_woinstalasi,id_pelanggan,id_sto,status_instalasi,createby,createdate) 
            VALUES ('$id_woinstalasi','$id_pelanggan','$id_sto','$status_instalasi','$createdby',NOW())";
            $result = mysql_query($query);
            $query_reject= "INSERT INTO woreject (id_woreject,id_pelanggan,id_sto,keterangan,penerima,createby,createdate) 
            VALUES ('$id_woinstalasi','$id_pelanggan','$id_sto','$keterangan','$penerima','$createdby',NOW())";
            $result_reject = mysql_query($query_reject);
            if ($result) {
                //LOG CALL INSTALASI DITOLAK
                $result_log=mysql_query("INSERT INTO log (aksi,createby,createdate) VALUES ('Call Instalasi (ditolak) > $id_pelanggan','$createdby',NOW())");
                return true;
            } else {
                return false;
            }
        }
    }
    public function setWODiterima($id_pelanggan,$id_sto,$jam_janji,$catatan,$penerima,$createdby) {
        //bikin ID WO
        function generateIDWO($id_pelanggan,$id_sto){
            $id="1-".$id_sto."-".$id_pelanggan;
            return $id;
        }

        $id_woinstalasi=generateIDWO($id_pelanggan,$id_sto);
        $status_instalasi="mulai";


        $result = mysql_query("SELECT * FROM woinstalasi WHERE id_pelanggan = '$id_pelanggan'");
        $no_of_rows = mysql_num_rows($result);
        //cek datanya sudah ada atau belum di table woinstalasi
        if ($no_of_rows > 0) {
            echo "test";
            $data=mysql_fetch_array($result);
            $data_statuswo=$data['status_instalasi'];
            if ($data_statuswo=="pending1"||$data_statuswo=="pending2"||$data_statuswo="notone"){
                $query= "UPDATE woinstalasi SET status_instalasi='$status_instalasi',updateby='$createdby',updatedate=NOW() 
                    WHERE id_pelanggan='$id_pelanggan'";

                //cek datanya sudah ada atau belum di able pekerjaan
                $result_pekerjaan = mysql_query("SELECT * FROM pekerjaan WHERE id_wo = '$id_woinstalasi'");
                $jml_pekerjaan = mysql_num_rows($result_pekerjaan);
                if ($jml_pekerjaan > 0) {
                    $query_pekerjaan="UPDATE pekerjaan SET jam_janji='$jam_janji',keterangan='$catatan',penerima='$penerima',updateby='$createdby',updatedate=NOW()
                        WHERE id_wo='$id_woinstalasi'";
                }else{
                    $query_pekerjaan="INSERT INTO pekerjaan(id_wo,id_pelanggan,jam_janji,keterangan,penerima,createby,createdate) 
                        VALUES('$id_woinstalasi','$id_pelanggan','$jam_janji','$catatan','$penerima','$createdby',NOW())";
                }
                $result = mysql_query($query);
                $result2 = mysql_query($query_pekerjaan);
                if ($result && $result2) {
                    return true;
                } else {
                    return false;
                }
            }
            return false;
        } else {
            //simpan jika belum exist
            $query= "INSERT INTO woinstalasi (id_woinstalasi,id_pelanggan,id_sto,status_instalasi,createby,createdate) 
            VALUES ('$id_woinstalasi','$id_pelanggan','$id_sto','$status_instalasi','$createdby',NOW())";
            $query_pekerjaan="INSERT INTO pekerjaan(id_wo,id_pelanggan,jam_janji,keterangan,penerima,createby,createdate) 
            VALUES('$id_woinstalasi','$id_pelanggan','$jam_janji','$catatan','$penerima','$createdby',NOW())";
            $result = mysql_query($query);
            $result2 = mysql_query($query_pekerjaan);
            if ($result && $result2) {
                //LOG CALL INSTALASI DITERIMA
                $result_log=mysql_query("INSERT INTO log (aksi,createby,createdate) VALUES ('Call Instalasi (diterima) > $id_pelanggan','$createdby',NOW())");
                return true;
            } else {
                return false;
            }
        }
    }


    //Store WO Migrasi  / Bikin WO
    public function setWOPendingMigrasi($id_pelanggan,$id_sto,$createdby) {

        function generateIDWO($id_pelanggan,$id_sto){
            $id="1-".$id_sto."-".$id_pelanggan;
            return $id;
        }

        $id_woinstalasi=generateIDWO($id_pelanggan,$id_sto);
        $status_instalasi="pending1";

        $result = mysql_query("SELECT * FROM womigrasi WHERE id_pelanggan = '$id_pelanggan'");
        $no_of_rows = mysql_num_rows($result);

        if ($no_of_rows > 0) {
            $data=mysql_fetch_array($result);
            if ($data['status_migrasi']=="pending1"){$status_instalasi="pending2";}
            if ($data['status_migrasi']=="pending2"){$status_instalasi="ditolak";}
            $query= "UPDATE womigrasi SET status_migrasi='$status_instalasi',updateby='$createdby',updatedate=NOW()
                    WHERE id_pelanggan='$id_pelanggan'";
            $result = mysql_query($query);
            if ($result) {
                //LOG CALL INSTALASI
                $result_log=mysql_query("INSERT INTO log (aksi,createby,createdate) VALUES ('Call Migrasi ($status_instalasi) > $id_pelanggan','$createdby',NOW())");
                return true;
            } else {
                return false;
            }
        } else {
            //simpan jika belum exist
            $query= "INSERT INTO womigrasi (id_womigrasi,id_pelanggan,id_sto,status_migrasi,createby,createdate) 
            VALUES ('$id_woinstalasi','$id_pelanggan','$id_sto','$status_instalasi','$createdby',NOW())";
            $result = mysql_query($query);
            if ($result) {
                //LOG CALL INSTALASI
                $result_log=mysql_query("INSERT INTO log (aksi,createby,createdate) VALUES ('Call Migrasi (pending1) > $id_pelanggan','$createdby',NOW())");
                return true;
            } else {
                return false;
            }
        }
    }
    public function setWONotoneMigrasi($id_pelanggan,$id_sto,$createdby) {
        //cek existensi
        function generateIDWO($id_pelanggan,$id_sto){
            $id="1-".$id_sto."-".$id_pelanggan;
            return $id;
        }

        $id_woinstalasi=generateIDWO($id_pelanggan,$id_sto);
        $status_instalasi="notone";

        $result = mysql_query("SELECT * FROM womigrasi WHERE id_pelanggan = '$id_pelanggan'");
        $no_of_rows = mysql_num_rows($result);

        if ($no_of_rows > 0) {
            $query= "UPDATE womigrasi SET status_migrasi='$status_instalasi',updateby='$createdby',updatedate=NOW()
                    WHERE id_pelanggan='$id_pelanggan'";
            $result = mysql_query($query);
            if ($result) {
                //LOG CALL INSTALASI
                $result_log=mysql_query("INSERT INTO log (aksi,createby,createdate) VALUES ('Call Migrasi (no tone) > $id_pelanggan','$createdby',NOW())");
                return true;
            } else {
                return false;
            }
        } else {
            //simpan jika belum exist
            $query= "INSERT INTO womigrasi (id_womigrasi,id_pelanggan,id_sto,status_migrasi,createby,createdate) 
            VALUES ('$id_woinstalasi','$id_pelanggan','$id_sto','$status_instalasi','$createdby',NOW())";
            $result = mysql_query($query);
            if ($result) {
                //LOG CALL INSTALASI
                $result_log=mysql_query("INSERT INTO log (aksi,createby,createdate) VALUES ('Call Migrasi (no tone) > $id_pelanggan','$createdby',NOW())");
                return true;
            } else {
                return false;
            }
        }
    }
    public function setWODitolakMigrasi($id_pelanggan,$id_sto,$catatan,$penerima,$createdby) {
        //cek existensi
        function generateIDWO($id_pelanggan,$id_sto){
            $id="1-".$id_sto."-".$id_pelanggan;
            return $id;
        }

        $id_woinstalasi=generateIDWO($id_pelanggan,$id_sto);
        $status_instalasi="ditolak";

        $result = mysql_query("SELECT * FROM womigrasi WHERE id_pelanggan = '$id_pelanggan'");
        $no_of_rows = mysql_num_rows($result);

        if ($no_of_rows > 0) {
            $query= "UPDATE womigrasi SET status_migrasi='$status_instalasi',updateby='$createdby',updatedate=NOW()
                    WHERE id_pelanggan='$id_pelanggan'";
            $result = mysql_query($query);
            if ($result) {
                //LOG CALL INSTALASI
                $result_log=mysql_query("INSERT INTO log (aksi,createby,createdate) VALUES ('Call Migrasi (ditolak) > $id_pelanggan','$createdby',NOW())");
                return true;
            } else {
                return false;
            }
        } else {
            //simpan jika belum exist
            $query= "INSERT INTO womigrasi (id_womigrasi,id_pelanggan,id_sto,status_migrasi,createby,createdate) 
            VALUES ('$id_woinstalasi','$id_pelanggan','$id_sto','$status_instalasi','$createdby',NOW())";
            $result = mysql_query($query);
            $query_reject= "INSERT INTO woreject (id_woreject,id_pelanggan,id_sto,keterangan,penerima,createby,createdate) 
            VALUES ('$id_woinstalasi','$id_pelanggan','$id_sto','$keterangan','$penerima','$createdby',NOW())";
            $result_reject = mysql_query($query_reject);
            if ($result) {
                //LOG CALL INSTALASI DITOLAK
                $result_log=mysql_query("INSERT INTO log (aksi,createby,createdate) VALUES ('Call Migrasi (ditolak) > $id_pelanggan','$createdby',NOW())");
                return true;
            } else {
                return false;
            }
        }
    }
    public function setWODiterimaMigrasi($id_pelanggan,$id_sto,$jam_janji,$catatan,$penerima,$createdby) {
        //bikin ID WO
        function generateIDWO($id_pelanggan,$id_sto){
            $id="2-".$id_sto."-".$id_pelanggan;
            return $id;
        }

        $id_woinstalasi=generateIDWO($id_pelanggan,$id_sto);
        $status_instalasi="mulai";

        $result = mysql_query("SELECT * FROM womigrasi WHERE id_pelanggan = '$id_pelanggan'");
        $no_of_rows = mysql_num_rows($result);
        //cek datanya sudah ada atau belum di table woinstalasi
        if ($no_of_rows > 0) {
            $data=mysql_fetch_array($result);
            $data_statuswo=$data['status_migrasi'];
            if ($data_statuswo=="pending1"||$data_statuswo=="pending2"||$data_statuswo="notone"){
                $query= "UPDATE womigrasi SET status_migrasi='$status_instalasi',updateby='$createdby',updatedate=NOW() 
                    WHERE id_pelanggan='$id_pelanggan'";

                //cek datanya sudah ada atau belum di able pekerjaan
                $result_pekerjaan = mysql_query("SELECT * FROM pekerjaan WHERE id_wo = '$id_woinstalasi'");
                $jml_pekerjaan = mysql_num_rows($result_pekerjaan);
                if ($jml_pekerjaan > 0) {
                    $query_pekerjaan="UPDATE pekerjaan SET jam_janji='$jam_janji',keterangan='$catatan',penerima='$penerima',updateby='$createdby',updatedate=NOW()
                        WHERE id_wo='$id_woinstalasi'";
                }else{
                    $query_pekerjaan="INSERT INTO pekerjaan(id_wo,id_pelanggan,jam_janji,keterangan,penerima,createby,createdate) 
                        VALUES('$id_woinstalasi','$id_pelanggan','$jam_janji','$catatan','$penerima','$createdby',NOW())";
                }
                $result = mysql_query($query);
                $result2 = mysql_query($query_pekerjaan);
                if ($result && $result2) {
                    return true;
                } else {
                    return false;
                }
            }
            return false;
        } else {
            //simpan jika belum exist
            $query= "INSERT INTO womigrasi (id_womigrasi,id_pelanggan,id_sto,status_migrasi,createby,createdate) 
            VALUES ('$id_woinstalasi','$id_pelanggan','$id_sto','$status_instalasi','$createdby',NOW())";
            $query_pekerjaan="INSERT INTO pekerjaan(id_wo,id_pelanggan,jam_janji,keterangan,penerima,createby,createdate) 
            VALUES('$id_woinstalasi','$id_pelanggan','$jam_janji','$catatan','$penerima','$createdby',NOW())";
            $result = mysql_query($query);
            $result2 = mysql_query($query_pekerjaan);
            if ($result && $result2) {
                //LOG CALL INSTALASI DITERIMA
                $result_log=mysql_query("INSERT INTO log (aksi,createby,createdate) VALUES ('Call Migrasi (diterima) > $id_pelanggan','$createdby',NOW())");
                return true;
            } else {
                return false;
            }
        }
    }
}

?>