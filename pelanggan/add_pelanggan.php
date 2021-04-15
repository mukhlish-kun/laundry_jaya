<?php
if(!isset($_SESSION)){echo "anda tidak memiliki hak untuk akses halaman ini!";}
else {?>
<fieldset class="add_paket">
    <legend>Tambah data pelanggan</legend>
    <form method="post">
    <table class="search">
        <tr>
            <td>Nama pelanggan</td>
            <td>:</td>
            <td><input type="text" name="nama_lengkap" id="nama_lengkap" ></td>
        </tr>
        <tr>
            <td>Nomer hp</td>
            <td>:</td>
            <td><input type="text" name="telp" id="harga_paket" onKeyup="validNum()"></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td><button type="submit" name="add"  id="add_btn" value="add">Tambah</button></td>
        </tr>
    </table>
    <p id="note_profil">
        <?php if (isset($_POST['add'])){
                require('koneksi.php');
                 try {
                        $nama=$_REQUEST['nama_lengkap'];
                        $telp=$_REQUEST['telp'];
                        $query=$db->prepare("INSERT INTO `pelanggan` (`nama_lengkap`, `telp`) VALUES ('$nama', '$telp') ");
                        $query->execute();
                        header('location:http://localhost/laundry/index.php?page=data_konsumen');
                    } catch (PDOException $e) {
                            echo $e->getMessage();
                    };
                }
?> </p>
    <script src="js\script.js" type="text/javascript"></script>
    </form>
</fieldset>
<?php
};
$db=NULL;
?>
