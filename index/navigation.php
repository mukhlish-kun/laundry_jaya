 <?php
 
 if(!isset($_SESSION)) header("location:www.google.com");
 
    require("koneksi.php");
    $username=$_SESSION['username'];
    $query = $db->prepare("SELECT * FROM pegawai WHERE username = '$username'");
    $query->execute();
    $hasil = $query->fetch();
?>
<ul>
    <li><a href="index.php?page=home">home</a></li>
    <li><a href="index.php?page=transaksi">transaksi</a></li>
    <li><a href="index.php?page=laporan">laporan</a></li>
    <li class="dropdown"><a>Data Kantor</a>
      <ul class="isi-dropdown">
        <?php if($_SESSION['level']=='admin') echo"<li><a href='index.php?page=data_master'>data master</a></li>
        <li><a href='index.php?page=data_karyawan'>data operator</a></li>"; ?>
        <li><a href='index.php?page=data_konsumen'>data pelanggan</a></li>
      </ul>
    <li class="dropdown"><a>akun</a>
        <ul class="isi-dropdown">
            <li><a href="index.php?page=edit_profil">edit profil</a></li>
            <li><a href="index.php?page=logout">logout</a></li>
        </ul>
    </li>
    <?php $db=NULL?>
</ul>
