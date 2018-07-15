<?php
include "../mod/koneksi.php";
include "../mod/fungsi.php";
$id = abs($_GET['id']);
$demo = getAllData($id,"desa","demografi");
?>
<h2 class='title'>Demografi Desa</h2>
<table class='table'>
    <tr>
        <td>Jumlah Penduduk Tahun <?php echo $demo['tahun']; ?></td>
        <td>: <?php echo $demo['jmlpenduduk']; ?></td>
    </tr>
    <tr>
        <td>Jumlah KK</td>
        <td>: <?php echo $demo['jmlkk']; ?></td>
    </tr>
    <tr>
        <td>Mata Pencaharian Utama</td>
        <td>: <?php echo $demo['mata']; ?></td>
    </tr>
    <tr>
        <td>Jumlah Hak Pilih</td>
        <td>: <?php echo $demo['hak']; ?></td>
    </tr>
    <tr>
        <td>Kondisi Kependudukan Secara Umum</td>
        <td>: <?php echo $demo['kondisi']; ?></td>
    </tr>
</table>