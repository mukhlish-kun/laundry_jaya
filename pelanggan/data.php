<?php
if(!isset($_SESSION)) header("location:www.google.com");
require('koneksi.php');
$query= $db->prepare("SELECT  * FROM `pelanggan` ORDER BY nama_lengkap");
$query->execute();
?>
<fieldset class="data_pelanggan">
<legend>DATA PELANGGAN</legend>
<br>
<a href="index.php?page=add_pelanggan">Tambah data pelanggan</a>
<br>
<br>
<table>
    <tr>
    <th>Nama pelanggan</th>
    <th>No telp</th>
    <th>Operations</th>
    </tr>
    <?php while($user_data=$query->fetch()){
        echo "<tr>";
        echo "<td>".$user_data["nama_lengkap"]."</td>";
        echo "<td>".$user_data["telp"]."</td>";
        echo "<td><a href='index.php?page=edit_pelanggan&id=$user_data[telp]'>Edit</a> | <a href='pelanggan\delete.php?id=$user_data[telp]'>Delete</a></td></tr>";
        };
        $db=NULL;?>
</table>


</fieldset>
