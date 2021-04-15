<?php
if($_SESSION['level']!='admin'){echo "anda tidak memiliki hak untuk akses halaman ini!";}
else {?>
<fieldset class="add_paket">
    <legend>Tambah data operator</legend>
    <form method="post">
    <table class="search">
        <tr>
            <td>Username</td>
            <td>:</td>
            <td><input type="text" name="username" id="nama_lengkap" required></td>
        </tr>
        <tr>
            <td>Password</td>
            <td>:</td>
            <td><input type="text" name="password" id="harga_paket" required></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td><button type="submit" name="in"  id="add_btn" value="add">Tambah</button></td>
        </tr>
    </table>
    <p id="note_profil">
        <?php if (isset($_POST['in'])){
                require('koneksi.php');
                 try {
                        $username=$_REQUEST['username'];
                        $password=md5($_REQUEST['password']);
                        $query=$db->prepare("INSERT INTO `pegawai` (`username`, `password`, `nama_lengkap`, `tanggal_lahir`, `jenis_kelamin`, `alamat`, `level`) VALUES ('$username', '$password', NULL, NULL, NULL, NULL, 'operator') ");
                        $query->execute();
                        $db=NULL;
                        header('location:http://localhost/laundry/index.php?page=data_karyawan');
                    } catch (PDOException $e) {
                            echo $e->getMessage();
                    };
                }
?> </p>
    </form>
</fieldset>
<?php
};
?>
