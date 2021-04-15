<?php
    require('../koneksi.php');
    try {
        //code...
        $id=$_GET['id'];
        $query=$db->prepare("DELETE FROM pegawai WHERE username='$id'");
        $hasil=$query->execute();
        $db=NULL;
        header('location:http://localhost/laundry/index.php?page=data_karyawan');
    } catch (\Throwable $th) {
        //throw $th;
        echo $th;
    }
?>
