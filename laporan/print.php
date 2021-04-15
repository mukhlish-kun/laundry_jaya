<!DOCTYPE html>
<html lang="en">
<?php

require('../koneksi.php');
$sebelum =$_REQUEST['sebelum'];
$sesudah =$_REQUEST['sesudah'];
$total=0;
include('../tgl.php');
$query = "SELECT * FROM `keuntungan` WHERE tanggal>=? AND tanggal<=? ORDER BY id ASC,tanggal ASC";
$params = array("$sebelum","$sesudah");
$stmt = $db->prepare($query);
$stmt->execute($params);?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PEMASUKAN LAUNDRY JAYA <?php echo tgl(date('Y-m-d',strtotime($sebelum)))." - ".tgl(date('Y-m-d',strtotime($sesudah))); ?></title>
    <style>
    caption {
        font-weight: bold;
        padding: 25px;
        font-size: 1.2em;
        text-decoration: underline;
    }

    body {
        text-transform: uppercase;
    }

    ;

    div {
        margin: auto;
        padding: 0em;
    }

    table,
    td,
    th,
    tr {
        border: 1px solid black;
        border-collapse: collapse;
        padding: 15px 30px;
    }

    table {
        width: 750px;
    }
    </style>
</head>

<body>
    <div class="wrapper" align="center">
        <table class="data_transaksi" id="data_transaksi">
            <caption>Pemasukan laundry jaya <br> periode <?php echo tgl(date('Y-m-d', strtotime($sebelum)));?> -
                <?php echo tgl(date('Y-m-d', strtotime($sesudah))); ?></caption>
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
           <td>".tgl(date('Y-m-d', strtotime($key['tanggal'])))."</td>
           <td>".$key['berat']." KG</td>
           <td>".$key['paket']."</td>
           <td>Rp. ".number_format($key['biaya'], 2, ",", ".")."</td>
       </tr>";
       $total=$total+$key['biaya'];
};
?>
            <tr>
                <td colspan="4">TOTAL &nbsp;:</td>
                <td>Rp. <?php echo number_format($total, 2, ",", ".");?></td>
            </tr>
        </table>

    </div>
    <script>
        window.print()
    </script>

</body>

</html>