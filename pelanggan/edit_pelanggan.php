<?php
require('koneksi.php');
try {
       $asli=$_GET['id'];

       $query=$db->prepare("SELECT * FROM `pelanggan` WHERE telp='$asli'");
       $query->execute();
       $data=$query->fetch();
   } catch (PDOException $e) {
           echo $e->getMessage();
   };
if(!isset($_SESSION)){echo "anda tidak memiliki hak untuk akses halaman ini!";}
else {?>
<fieldset>
    <legend>Edit data pelanggan</legend>
    <form method="post">
    <table class="search">
        <tr>
            <td>Nama pelanggan</td>
            <td>:</td>
            <td><input type="text" name="nama_lengkap" id="nama_lengkap" value="<?php echo $data['nama_lengkap']; ?>" ></td>
        </tr>
        <tr>
            <td>Nomer hp</td>
            <td>:</td>
            <td><input type="text" name="harga_paket" id="harga_paket" onKeyup="validNum()" value="<?php echo $data['telp']; ?>" ></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td><button type="submit" name="add_btn"  class="add_btn" value="add">Simpan</button></td>
        </tr>
    </table>
    <p id="note_profil">
        <?php if (isset($_POST['add_btn'])){
                 try {
                        $asli=$_GET['id'];
                        $nama=$_REQUEST['nama_lengkap'];
                        $telp=$_REQUEST['harga_paket'];
                        $query=$db->prepare("UPDATE pelanggan SET nama_lengkap='$nama', telp='$telp' WHERE telp='$asli'");
                        $hasil=$query->execute();
                        header('location:http://localhost/laundry/index.php?page=data_konsumen');
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
