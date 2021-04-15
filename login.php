<?php
   session_start();
   if(isset($_SESSION['username'])) {
   header('location:index.php'); };
   require_once("koneksi.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/login.css">
    <title>Login ke sistem laundry jaya</title>
</head>
<body>
    <br>
	<h1>Aplikasi pengelolaan<br>laundry jaya</h1>
	<div class="kotak_login">
		<p class="tulisan_login">Silahkan login</p>
		<form action="proses_login.php" method="POST">
			<label>Username</label>
			<input type="text" name="username" class="form_login" placeholder="Username ..">
			<label>Password</label>
			<input type="text" name="password" class="form_login" placeholder="Password ..">
			<input type="submit" class="tombol_login" value="LOGIN">
		</form>
	</div>
</body>
</html>