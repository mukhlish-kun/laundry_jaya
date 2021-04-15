<?php
if(!isset($_SESSION)) header("location:www.google.com");
?>
<fieldset>
    <legend>TAMBAH TRANSAKSI BARU</legend>
    <br>
    <form action="" method="post">
        <table class="search">
            <tr>
                <td>Tanggal</td>
                <td>:</td>
                <td><input type="date" name="tanggal" required></td>
            </tr>
            <tr>
                <td>Nomer telp</td>
                <td>:</td>
                <td><input type="text" name="telp" id="telp" onkeyup="namaSearch(this.value)" required></td>

            </tr>
            <tr>
                <td>Nama</td>
                <td>:</td>
                <td id="ajax-nama"></td>
            </tr>
            <tr>
                <td>paket</td>
                <td>:</td>
                <td><select style="width:200px;" name="paket" id="paket_select" onchange="total(document.getElementById('berat_laundry').value)">
                        <?php require('koneksi.php');
                  $query="SELECT * FROM `paket_laundry`";
                  $data= $db->query($query)->fetchALL();
                  foreach ($data as $key ) {
                      # code...
                      echo "<option value='$key[nama_paket]'>".$key['nama_paket']." 1KG= Rp. ".number_format($key['harga_paket'], 2, ",", ".")."</option>";
                  };
                  ?>
                    </select></td>
            </tr>
            <tr>
                <td>Berat</td>
                <td>:</td>
                <td><input type="text" name="berat" id="berat_laundry" onkeyup="total(this.value)" required>&nbsp;KG</td>
            </tr>
            <tr>
                <td>Status</td>
                <td>:</td>
                <td><input type="text" name="status" id="status" value="diproses" readonly></td>
            </tr>
            <tr>
            <tr>
                <td>biaya</td>
                <td>:</td>
                <td>Rp.&nbsp;<input type="text" name="biaya_total" id="biaya_total" readonly>&nbsp;,00</td>
            </tr>
            <tr>
                <td>status biaya</td>
                <td>:</td>
                <td><select name="status_biaya" id="status_biaya">
                        <option value="belum_dibayar">BELUM DIBAYAR</option>
                        <option value="lunas">LUNAS</option>
                    </select></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td><button type="submit" value="submit" name="submit" class="add_btn">TAMBAHKAN</button></td>
            </tr>
        </table>
    </form>
    <?php 
        if(isset($_POST['submit'])){
            $tanggal = $_REQUEST['tanggal'];
            $telp = $_REQUEST['telp'];
            $paket = $_REQUEST['paket'];
            $berat = $_REQUEST['berat'];
            $status = $_REQUEST['status'];
            $biaya = $_REQUEST['biaya_total'];
            $s_biaya = $_REQUEST['status_biaya'];
            $sql = "INSERT INTO `transaksi` VALUES (NULL,?, ?, ?, ?, ?, ?, ?) ";
            $db->prepare($sql)->execute([$tanggal,$telp,$berat,$paket,$status,$s_biaya,$biaya]);
            header('location:?page=transaksi');
        };
    ?>
</fieldset>