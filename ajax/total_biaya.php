<?php
    require('../koneksi.php');
    $berat=$_GET['berat'];
    $paket=$_GET['paket'];
    $query="SELECT * FROM `paket_laundry` WHERE nama_paket=?";
    $params= array("$paket");
    $stmt = $db->prepare($query);
    $stmt->execute($params);
    $data= $stmt->fetch();
    if ($berat!=""){
        echo $berat*$data['harga_paket'];
    } else echo "";
    
?>