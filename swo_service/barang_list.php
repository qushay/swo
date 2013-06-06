<?php

$response = array();
if (isset($_POST['kategori'])) {
    $kategori = $_POST['kategori'];
    require_once 'include/DB_Connect.php';
    $db = new DB_Connect();

    if(isset($_POST['id_retail'])){
        $id_retail=$_POST['id_retail'];
        $result = mysql_query("SELECT b.id_barang id_barang, a.nama_barang nama_barang, b.stok_toko jml_stok
            FROM tb_barang a,tb_barang_retail b 
            WHERE a.kategori='".$kategori."' AND id_retail='".$id_retail."' AND a.id_barang=b.id_barang ") or die(mysql_error());
    }else{
        $result = mysql_query("SELECT * FROM tb_barang WHERE kategori='".$kategori."' ") or die(mysql_error());
    }

    if (mysql_num_rows($result) > 0) {
            $response["barang"] = array();
            
            while ($row = mysql_fetch_array($result)) {
                $product = array();
                $product["id_barang"] = $row["id_barang"];
                $product["nama"] = $row["nama_barang"];
                $product["jml_stok"] = $row["jml_stok"];
                array_push($response["barang"], $product);
            }
            $response["success"] = 1;
            echo json_encode($response);
        } else {
            $response["success"] = 0;
            echo json_encode($response);
        }
 }else {
 $response["success"] = 0;
 echo json_encode($response);
}
?>
