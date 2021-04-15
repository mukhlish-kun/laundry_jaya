<?php
         require('../koneksi.php');
         $keyword =$_REQUEST['id'];
         $query = "SELECT * FROM `transaksi` WHERE telp LIKE ? OR status LIKE ? OR status_biaya LIKE ? OR tanggal LIKE ? ORDER BY id DESC,tanggal DESC";
         $params = array("%$keyword%","%$keyword%","%$keyword%","%$keyword%");
         $stmt = $db->prepare($query);
         $stmt->execute($params);
         include_once('../tgl.php');?>
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
         while($key = $stmt->fetch()) {
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
     ?>
</table>