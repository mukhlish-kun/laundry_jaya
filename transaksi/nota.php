<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Nota Transaksi</title>
    <link href="https://fonts.googleapis.com/css?family=Special+Elite&display=swap" rel="stylesheet">
    <style>
        @media print
        {body * { visibility: hidden; }
        .wrapper,table,div,td,th,tr {visibility: visible }
        }
    .wrapper {
        margin: auto;
        width: 400px;
        height: 600px;
        border: 1px solid black;
        padding: 20px;
        font-size: 20px;
        font-family: 'Special Elite', cursive;

    }

    .besar,
    .kecil {
        font-weight: bold;
    }

    .kecil {
        font-size: 14px;
        border-bottom: 2px solid black;
    }

    .baru {
        margin-top: 5px;
        margin-bottom: 10px;
        border-top: 2px solid black;
    }

    table {
        text-align: left;
    }

    .tabel1 {
        margin-bottom: 16px;
    }

    .tabel2 {
        margin-bottom: 10px;
    }
    .bold td{
        font-weight: bold;
    }
    .ttd td{
        text-align: center;
    }
    </style>
</head>

<body>
    <?php
    require("../koneksi.php");
    $id=$_REQUEST['id'];
    $query = $db->prepare("SELECT * FROM `transaksi` WHERE id = '$id'");
    $query->execute();
    $hasil = $query->fetch();

    ?>
    <br>
    <div class="wrapper">
        <div align="center" class="besar">LAUNDRY JAYA</div>
        <div align="center" class="kecil">Jl. Mayjen Sutoyo No.7, Kebumen, Bumirejo, Kec. Kebumen, Kabupaten Kebumen,
            Jawa Tengah 54316, Indonesia</div>
        <div align="center" class="baru"></div>
        <table class="tabel1">
            <tr>
                <td>Nota no</td>
                <td>:</td>
                <td><?php echo $hasil['id']?></td>
            </tr>
            <tr>
                <td>Tanggal</td>
                <td>:</td>
                <td><?php include_once('../tgl.php'); echo tgl(date('Y-m-d', strtotime($hasil['tanggal']))); ?></td>
            </tr>
        </table>
        <br>
        <table class="tabel2">
            <tr>
                <th colspan="3" style="border-bottom: 1px solid black;">Data pelanggan</th>
            </tr>
            <tr>
                <td>Nama</td>
                <td>:</td>
                <td><?php 
                $d=$hasil['telp'];
                $query="SELECT * FROM `pelanggan` WHERE telp = ?";
                $params= array("$d");
                $stmt = $db->prepare($query);
                $stmt->execute($params);
                $data= $stmt->fetch(); echo $data['nama_lengkap'] ?></td>
            </tr>
            <tr>
                <td>Nomer telp</td>
                <td>:</td>
                <td><?php echo $hasil['telp'] ?></td>

            </tr>
        </table>
        <table>
            <tr>
                <th colspan="3" style="border-bottom: 1px solid black;">Detail transaksi</th>
            </tr>
            <tr>
                <td>Paket</td>
                <td>:</td>
                <td><?php echo $hasil['paket']?></td>
            </tr>
            <tr>
                <td>Berat</td>
                <td>:</td>
                <td><?php echo $hasil['berat'] ?>&nbsp;KG</td>
            </tr>
            <tr>
                <td>Status</td>
                <td>:</td>
                <td><?php echo $hasil['status']?></td>
            </tr>
            <tr>
            <tr>
                <td>Status biaya</td>
                <td>:</td>
                <td><?php echo $hasil['status_biaya']?></td>
            </tr>
            <tr>
                <td colspan="3" style="border-bottom: 2px solid black;"></td>
            </tr>
            <tr class="bold">
                <td>Biaya total</td>
                <td>:</td>
                <td><?php echo "Rp. ".number_format($hasil['biaya'], 2, ",", ".") ?></td>
            </tr>
        </table>
        <br>
        <table align="right" class="ttd">
            <tr>
                <td>ttd</td>
            </tr>
            <tr>
                <td></td>
            </tr>
            <tr>
                <td></td>
            </tr>
            <tr>
                <td></td>
            </tr>
            <tr>
                <td></td>
            </tr>
            <tr>
                <td></td>
            </tr>
            <tr>
                <td style="border-top: 1px solid black; padding-top:5px;">Pegawai</td>
            </tr>

        </table>
    </div>

    <script>
    window.print();
    </script>
</body>

</html>