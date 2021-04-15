<?php
    include('../koneksi.php');
    try {
        //code...
        $id=$_GET['id'];
        $query=$db->prepare("DELETE FROM `pelanggan` WHERE telp='$id'");
        $hasil=$query->execute();
        header('location:http://localhost/laundry/index.php?page=data_konsumen');
    } catch (\Throwable $th) {
        //throw $th;
        echo $th;
    }
?>
