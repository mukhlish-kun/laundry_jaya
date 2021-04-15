
<?php
if(!isset($_SESSION)) header("location:www.google.com");
require('koneksi.php');
try {
       $asli=$_GET['id'];

       $query=$db->prepare("SELECT * FROM paket_laundry WHERE nama_paket='$asli'");
       $query->execute();
       $data=$query->fetch();
   } catch (PDOException $e) {
           echo $e->getMessage();
   };
if($_SESSION['level']!="admin"){echo "anda tidak memiliki hak untuk akses halaman ini!";}
else {?>
<fieldset class="add_paket">
    <legend>Tambah paket laundry</legend>
    <form method="post">
    <table class= "search">
        <tr>
            <td>Nama paket</td>
            <td>:</td>
            <td><input type="text" name="nama_paket" id="nama_paket" onKeyup="this.value=validName();" value="<?php echo $data['nama_paket']; ?>" ></td>
        </tr>
        <tr>
            <td>Harga paket</td>
            <td>:</td>
            <td><input type="text" name="harga_paket" id="harga_paket" onKeyup="validNum()" value="<?php echo $data['harga_paket']; ?>" ></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td><button type="submit" name="add_btn"  id="add_btn" class="add_btn" value="add">Simpan</button></td>
        </tr>
    </table>
    <p id="note_profil">
        <?php if (isset($_POST['add_btn'])){
                 try {
                        $asli=$_GET['id'];
                        $nama=$_REQUEST['nama_paket'];
                        $harga=$_REQUEST['harga_paket'];
                        $query=$db->prepare("UPDATE paket_laundry SET nama_paket='$nama', harga_paket='$harga' WHERE nama_paket='$asli'");
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
