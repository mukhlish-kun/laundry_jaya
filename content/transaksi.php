<?php
if(!isset($_SESSION)) header("location:www.google.com");
?>

<fieldset class="data_master">
    <legend>TRANSAKSI</legend>
    <br>
    <a href="?page=add_transaksi">Tambah transaksi</a><br><br>
    <a href="?page=add_pelanggan">Tambah pelanggan</a>
    <form method="post">

        <table class="search">
            <tr>
                <td>cari dari telp</td>
                <td>:</td>
                <td><input type="text" name="live-search" onkeyup="search(this.value);"></td>
            </tr>
            <tr>
                <td>cari dari status</td>
                <td>:</td>
                <td><select name="status_pengerjaan" id="status_pengerjaan" onchange="search(this.value);">
                    <option value="">PILIH DISINI</option>
                    <option value="diproses">DIPROSES</option>
                    <option value="selesai">SELESAI</option>
                    <option value="diambil">DIAMBIL</option>
                </select></td>
            </tr>
            <tr>
                <td>cari dari status biaya</td>
                <td>:</td>
                <td><select name="status_biaya" id="status_biaya" onchange="search(this.value);">
                    <option value="">PILIH DISINI</option>
                    <option value="lunas">LUNAS</option>
                    <option value="belum_dibayar">BELUM DIBAYAR</option>
                </select></td>
            </tr>
            <tr>
                <td>cari dari tanggal</td>
                <td>:</td>
                <td><input type="date" name="cari_tanggal" id="cari_tanggal" onchange="search(this.value);"></td>
            </tr>
            
        </table>
    </form>
    <br>
    <div id="konten">
        <table class="data_transaksi" id="data_transaksi">
            <tr>
                <th>ID</th>
                <th>TANGGAL</th>
                <th>NO TELP</th>
                <th>BERAT</th>
                <th>PAKET</th>
                <th>STATUS</th>
                <th>STATUS BIAYA</th>
                <th>BIAYA</th>
                <th>OPERASI</th>
            </tr>
            <?php

         require('koneksi.php');
         include_once('tgl.php');
         $data = $db->query("SELECT * FROM `transaksi` ORDER BY id DESC,tanggal DESC")->fetchAll();
         foreach ($data as $key) {
           echo "<tr>
                    <td>".$key['id']."</td>
                    <td>".tgl(date('Y-m-d', strtotime($key['tanggal'])))."</td>
                    <td>".$key['telp']."</td>
                    <td>".$key['berat']." KG</td>
                    <td>".$key['paket']."</td>
                    <td>".$key['status']."</td>
                    <td>".$key['status_biaya']."</td>
                    <td>Rp. ".number_format($key['biaya'], 2, ",", ".")."</td>
                    <td><a href='transaksi/nota.php?id=$key[id]' target='_BLANK'>nota</a> | <a href='?page=edit_transaksi&id=$key[id]'>edit</a> | <a href='?page=delete_transaksi&id=$key[id]'>delete</a></td>
                </tr>";
         }
         $db=null;
     ?>
        </table>
    </div>

</fieldset>
