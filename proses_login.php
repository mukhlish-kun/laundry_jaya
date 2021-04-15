<?php
   session_start();
   require_once("koneksi.php");
   $username = $_POST['username'];
   $pass = md5($_POST['password']);
   $query = $db->prepare("SELECT * FROM pegawai WHERE username =?");
   $query->execute(array($username));
   $hasil = $query->fetch();
   if($query->rowCount() == 0) {
     echo "<div align='center'>Username Belum Terdaftar! <a href='login.php'>Back</a></div>";
   } else {
     if($pass <> $hasil['password']) {
       echo "<div align='center'>Password salah! <a href='login.php'>Back</a></div>";
     } else {
       $_SESSION['username'] = $hasil['username'];
       $_SESSION['level'] = $hasil['level'];
       $db=NULL;
       header('location:index.php');
     }
   }
?>