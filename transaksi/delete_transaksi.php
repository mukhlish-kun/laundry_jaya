<?php
require('koneksi.php');
    try {
        $id=$_GET['id'];
        $query=$db->prepare("DELETE FROM `transaksi` WHERE id='$id'");
        $hasil=$query->execute();
        header('location:http://localhost/laundry/index.php?page=transaksi');
    } catch (\Throwable $th) {
        //throw $th;
        echo $th;
    }

?>