<?php
if($_SESSION['level']!="admin"){echo "anda tidak memiliki hak untuk akses halaman ini!";}
else {?>
<fieldset class="data_master">
    <legend>DATA OPERATOR</legend>
    <br>
    <a href="index.php?page=tambah_operator">Tambah operator baru</a><br /><br />
    <table class="operator">

        <tr>
            <th>Username</th>
            <th>Nama lengkap</th>
            <th>Jenis kelamin</th>
            <th>Tanggal lahir</th>
            <th>Alamat</th>
            <th>Operasi</th>
        </tr>
        <?php
    require("koneksi.php");
    $query = $db->prepare("SELECT * FROM `pegawai` WHERE level='operator' ORDER BY username");
    $query->execute();
    while ($user_data = $query->fetch()) {
        echo "<tr>";
        echo "<td>".$user_data["username"]."</td>";
        echo "<td>".$user_data["nama_lengkap"]."</td>";
        echo "<td>".$user_data["jenis_kelamin"]."</td>";
        echo "<td>".$user_data["tanggal_lahir"]."</td>";
        echo "<td>".$user_data["alamat"]."</td>";
        echo "<td><a href='data_master\delet_operator.php?id=$user_data[username]'>Delete</a></td></tr>";
    };


?>
    </table>
</fieldset>
<?php
$db=null;
};
?>
