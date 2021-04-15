<?php
    require('../koneksi.php');
    try {
        $id=$_GET['id'];
        $query=$db->prepare("DELETE FROM paket_laundry WHERE nama_paket='$id'");
        $hasil=$query->execute();
        header('location:http://localhost/laundry/index.php?page=data_master');
    } catch (\Throwable $th) {
        //throw $th;
        echo $th;
    }
?>
