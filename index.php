<?php
session_start();
if(!isset($_SESSION['username'])) {
   header('location:login.php');
} else {
   $username = $_SESSION['username'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <meta charset="UTF-8">
    <title>Laundry</title>
</head>

<body>
    <header><?php include 'index/header.php';?></header>
    <nav><?php include 'index/navigation.php'; ?></nav>
    <section id="content">
        <?php
	    if(isset($_GET['page'])){
		    $page = $_GET['page'];
		    switch ($page) {
			case 'home':
				include "content/home.php";
                break;
            case 'edit_profil':
                include "content/edit_profil.php";
                break;
			case 'logout':
				include "content/logout.php";
				break;
			case 'data_master':
				include "content/data_master.php";
                break;
            case 'laporan':
				include "content/laporan.php";
                break;
            case 'transaksi':
                include "content/transaksi.php";
                break;
            case 'tambah_paket':
                include "data_master/add_paket.php";
                break;
            case 'edit_paket':
                include "data_master/edit_paket.php";
                break;
            case 'data_karyawan':
                include "data_master/operator.php";
                break;
            case 'data_konsumen':
                include "pelanggan/data.php";
                break;
            case 'add_pelanggan':
                include "pelanggan/add_pelanggan.php";
                break;
            case 'edit_pelanggan':
                include "pelanggan/edit_pelanggan.php";
                break;
            case 'tambah_operator':
                include "data_master/tambah_operator.php";
                break;
            case 'add_transaksi':
                include "transaksi/add_transaksi.php";
                break;
            case 'edit_transaksi':
                include "transaksi/edit_transaksi.php";
                break;
            case 'delete_transaksi':
                include "transaksi/delete_transaksi.php";
                break;
			default:
				echo "<center><h3>Maaf. Halaman tidak di temukan !</h3></center>";
				break;
		    }
	    } else{
		include "content/home.php";
	}

	 ?></section>
    <footer><?php include 'index/footer.php';?></footer>
    <script src="js/ajax.js"></script>
</body>

</html>