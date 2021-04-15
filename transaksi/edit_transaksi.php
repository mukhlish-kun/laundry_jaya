<?php
if(!isset($_SESSION)) header("location:www.google.com");

    
    require("koneksi.php");
    $id=$_REQUEST['id'];
    $query = $db->prepare("SELECT * FROM `transaksi` WHERE id = '$id'");
    $query->execute();
    $hasil = $query->fetch();

    ?>
<fieldset  onmousemove="namaSearch(document.getElementById('telp').value)">
    <legend>EDIT TRANSAKSI </legend>
    <br>
    <form action="" method="post">
        <table class="search">
            <tr>
                <td>Tanggal</td>
                <td>:</td>
                <td><input type="date" name="tanggal" value='<?php echo $hasil['tanggal'] ?>' required></td>
            </tr>
            <tr>
                <td>Nomer telp</td>
                <td>:</td>
                <td><input type="text" name="telp" id="telp" value='<?php echo $hasil['telp'] ?>' readonly></td>

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
            <?php
                  $query="SELECT * FROM `paket_laundry`";
                  $data= $db->query($query)->fetchALL();
                  foreach ($data as $key ) {?>
                      <option value= "<?php echo $key['nama_paket']?>" <?php if($hasil['paket']==$key['nama_paket']) echo "selected" ?>> <?php echo $key['nama_paket']." 1KG= Rp. ".number_format($key['harga_paket'], 2, ",", ".")?></option>
                  <?php
                  };
                  ?>
                    </select></td>
            </tr>
            <tr>
                <td>Berat</td>
                <td>:</td>
                <td><input type="text" name="berat" id="berat_laundry" onkeyup="total(this.value)" value="<?php echo $hasil['berat'] ?>" required>&nbsp;KG</td>
            </tr>
            <tr>
                <td>Status</td>
                <td>:</td>
                <td><select name="status" id="status">
                    <option value="diproses"<?php if($hasil['status']=='diproses') echo "selected"?>>DIPROSES</option>
                    <option value="selesai"<?php if($hasil['status']=='selesai') echo "selected"?>>SELESAI</option>
                    <option value="diambil"<?php if($hasil['status']=='diambil') echo "selected"?>>DIAMBIL</option>
                    
                </select></td>
            </tr>
            <tr>
            <tr>
                <td>biaya</td>
                <td>:</td>
                <td>Rp.&nbsp;<input type="text" name="biaya_total" id="biaya_total" value="<?php echo $hasil['biaya'] ?>" readonly>&nbsp;,00</td>
            </tr>
            <tr>
                <td>status biaya</td>
                <td>:</td>
                <td><select name="status_biaya" id="status_biaya">
                        <option value="belum_dibayar"<?php if($hasil['status_biaya']=='belum_dibayar') echo "selected"?>>BELUM DIBAYAR</option>
                        <option value="lunas"<?php if($hasil['status_biaya']=='lunas') echo "selected"?>>LUNAS</option>
                    </select></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td><button type="submit" value="submit" name="submit" class="add_btn">SIMPAN</button></td>
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
            $sql = "UPDATE `transaksi` SET `tanggal` = ?, `berat` = ?, `paket` = ?, `status` = ?,
                   `status_biaya` = ?, `biaya` = ? WHERE `transaksi`.`id` =?";
            $db->prepare($sql)->execute([$tanggal,$berat,$paket,$status,$s_biaya,$biaya,$id]);
            header('location:?page=transaksi');
        };
    ?>
</fieldset>