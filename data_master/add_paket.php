<?php
if($_SESSION['level']!="admin"){echo "anda tidak memiliki hak untuk akses halaman ini!";}
else {?>
<fieldset class="add_paket">
    <legend>Tambah paket laundry</legend>
    <form method="post">
    <table class="search">
        <tr>
            <td>Nama paket</td>
            <td>:</td>
            <td><input type="text" name="nama_paket" id="nama_paket" onKeyup="this.value=validName();" required></td>
        </tr>
        <tr>
            <td>Harga paket</td>
            <td>:</td>
            <td><input type="text" name="harga_paket" id="harga_paket" onKeyup="validNum()" required></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td><button type="submit" name="add_btn"  id="add_btn" value="add">Tambah</button></td>
        </tr>
    </table>
    <p id="note_profil">
        <?php if (isset($_POST['add_btn'])){
                include('koneksi.php');
                 try {
                        $nama=$_REQUEST['nama_paket'];
                        $harga=$_REQUEST['harga_paket'];
                        $query=$db->prepare("INSERT into paket_laundry VALUES('$nama','$harga')");
                        $hasil=$query->execute();
                        header('location:http://localhost/laundry/index.php?page=data_master');
                    } catch (PDOException $e) {
                            echo $e->getMessage();
                    }
                }
?> </p>
    <script src="js\script.js" type="text/javascript"></script>
    </form>
</fieldset>
<?php
};
$db=NULL;
?>
