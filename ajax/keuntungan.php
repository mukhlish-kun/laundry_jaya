<?php

         require('../koneksi.php');
         $sebelum =$_REQUEST['sebelum'];
         $sesudah =$_REQUEST['sesudah'];
         $total=0;
         $query = "SELECT * FROM `keuntungan` WHERE tanggal>=? AND tanggal<=? ORDER BY id DESC,tanggal DESC";
         $params = array("$sebelum","$sesudah");
         $stmt = $db->prepare($query);
         $stmt->execute($params);?>
<table class="data_transaksi" id="data_transaksi">
    <tr>
        <th>ID</th>
        <th>TANGGAL</th>
        <th>BERAT</th>
        <th>PAKET</th>
        <th>BIAYA</th>
    </tr>
    <?php
         while($key = $stmt->fetch()) {
           echo "<tr>
                    <td>".$key['id']."</td>
                    <td>".date('d F Y', strtotime($key['tanggal']))."</td>
                    <td>".$key['berat']." KG</td>
                    <td>".$key['paket']."</td>
                    <td>Rp. ".number_format($key['biaya'], 2, ",", ".")."</td>
                </tr>";
                $total=$total+$key['biaya'];
         };
     ?>
    <tr>
        <td colspan="4">TOTAL</td>
        <td>Rp. <?php echo number_format($total, 2, ",", ".");?></td>
    </tr>
</table>