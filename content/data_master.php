<?php
if($_SESSION['level']!="admin"){echo "anda tidak memiliki hak untuk akses halaman ini!";}
else {?>
<fieldset class="data_master">
    <legend>DATA MASTER</legend>
    <br>
    <a href="index.php?page=tambah_paket">Tambah paket baru</a><br /><br />
    <table>

        <tr>
            <th>Nama paket</th>
            <th>Harga paket</th>
            <th>Operasi</th>
        </tr>
        <?php
    require("koneksi.php");
    $query = $db->prepare("SELECT * FROM `paket_laundry` ORDER BY nama_paket");
    $query->execute();
    while ($user_data = $query->fetch()) {
        echo "<tr>";
        echo "<td>".$user_data["nama_paket"]."</td>";
        echo "<td>Rp. ".number_format($user_data["harga_paket"], 2, ",", ".")."</td>";
        echo "<td><a href='index.php?page=edit_paket&id=$user_data[nama_paket]'>Edit</a> | <a href='data_master\delete.php?id=$user_data[nama_paket]'>Delete</a></td></tr>";
    };


?>
    </table>
</fieldset>
<?php
};
?>
