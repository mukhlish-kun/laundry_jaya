<?php
    require("koneksi.php");
    $username=$_SESSION['username'];
    $query = $db->prepare("SELECT * FROM pegawai WHERE username = '$username'");
    $query->execute();
    $hasil = $query->fetch();
    if ($query->rowCount() == 0) {
        echo "<div align='center'>Profil kosong...</div>";
    } else {
        ?>
<fieldset>
    <legend>edit profil</legend>
    <form method="post">
        <table id="tbl_edit_profil">
            <tr>
                <td>Nama lengkap</td>
                <td>:</td>
                <td><input type="text" name="nama_lengkap" id="nama_lengkap"
                        value="<?php echo $hasil['nama_lengkap']; ?>"></td>
            </tr>
            <tr>
                <td>Jenis kelamin(L/P)</td>
                <td>:</td>
                <td><input type="text" name="jenis_kelamin" id="jenis_kelamin"
                        value="<?php echo $hasil['jenis_kelamin']; ?>"></td>
            </tr>
            <tr>
                <td>Tanggal lahir</td>
                <td>:</td>
                <td><input type="date" name="tanggal_lahir" id="tanggal_lahir"
                        value="<?php echo $hasil['tanggal_lahir']; ?>"></td>
            </tr>
            <tr>
                <td>alamat</td>
                <td>:</td>
                <td><textarea style="resize:none;" name="alamat" id="alamat" cols="30" rows="7"><?php echo $hasil['alamat']; ?></textarea>
                </td>
            </tr>
            <tr>
                <td>username</td>
                <td>:</td>
                <td><input type="text" name="username" id="username" value="<?php echo $hasil['username']; ?>" disabled>
                </td>
            </tr>
            <tr>
                <td>Password lama</td>
                <td>:</td>
                <td><input type="password" name="password_old" id="password_old" required></td>
            </tr>
            <tr>
                <td>Password baru</td>
                <td>:</td>
                <td><input type="text" name="password_new" id="password_new" required></td>
            </tr>
            <tr>

            <tr>
                <td></td>
                <td></td>
                <td><button type="submit" name="simpan" value="simpan">SIMPAN</button></td>
            </tr>
        </table>
    </form>
    <p id="note_profil">* Jika ingin mengubah password lama, ketikkan ulang dahulu password yang lama!<br>
        <?php
  if (isset($_REQUEST['simpan'])) {
      try {
          $nama=$_REQUEST['nama_lengkap'];
          $jk=$_REQUEST['jenis_kelamin'];
          $tgl=$_REQUEST['tanggal_lahir'];
          $alamat=$_REQUEST['alamat'];
          $passOld=md5($_REQUEST['password_old']);
          $passNew=md5($_REQUEST['password_new']);
          if ($passOld==$hasil['password']) {
              $sql= $db->prepare("UPDATE pegawai SET
                nama_lengkap='$nama',
                jenis_kelamin='$jk',
                tanggal_lahir='$tgl',
                alamat='$alamat',
                password='$passNew'
                WHERE username='$username'");
              $sql->execute();
              echo "* ".$sql->rowCount()." record update successfully";
              header("Refresh:0");
          } else {
              echo "* password lama salah!";
          }
      } catch (PDOException $e) {
          echo $e->getMessage();
      };
  } ?>
</fieldset>
<?php

    $db=null;
    };

    ?>
