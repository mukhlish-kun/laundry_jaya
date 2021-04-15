<?php
if(!isset($_SESSION)) header("location:www.google.com");

    require("koneksi.php");
    $username=$_SESSION['username'];
    $query = $db->prepare("SELECT * FROM pegawai WHERE username = '$username'");
    $query->execute();
    $hasil = $query->fetch();
?>
<li class="nav-nama"><?php echo "Halo, ".$hasil['nama_lengkap']; $db=NULL?></li>
<input type="radio" id="head" disabled>
<label for="head"><img src="https://img.icons8.com/wired/50/000000/washing-machine.png" alt="laundry"/>&nbsp;laundry jaya</label>

