<?php
if(!isset($_SESSION)) header("location:www.google.com");
?>

<fieldset>
    <legend>Laporan</legend>
    <form action="laporan/print.php" method="post">
    <table class="search">
        <tr>
            <td>DARI</td>
            <Td><input type="date" name="sebelum" id="sebelum" onchange="keuntungan();"></Td>
            <td>SAMPAI</td>
            <td><input type="date" name="sesudah" id="sesudah" onchange="keuntungan();"></td>
            <td><button type="submit" name="cetak" id="cetak" >&nbsp;&nbsp;CETAK&nbsp;&nbsp;</button></td>
        </tr>
    </table>
    </form>
    <div id="keuntungan_transaksi"></div>
</fieldset>