<?php
include "../mod/koneksi.php";
include "../mod/fungsi.php";
$id = abs($_GET['id']);
$sly = getAllData($id,"kec","selayangkec");
?>
<h2 class='title'>Selayang Pandang</h2>
<table class='table'>
    <tr>
        <td>Nama Kecamatan</td>
        <td>: <?php echo $sly['nama']; ?></td>
    </tr>
    <tr>
        <td>Alamat</td>
        <td>: <?php echo $sly['alamat']; ?></td>
    </tr>
    <tr>
        <td>Berdiri Tahun</td>
        <td>: <?php echo $sly['berdiri']; ?></td>
    </tr>
    <tr>
        <td>Pemekaran Dari</td>
        <td>: <?php echo $sly['pemekaran']; ?></td>
    </tr>
    <tr>
        <td>Daftar Camat</td>
        <td>: <?php echo $sly['daftarcamat']; ?></td>
    </tr>
    <tr>
        <td>Jumlah Desa</td>
        <td>: <?php echo $sly['jmldesa']; ?></td>
    </tr>
    <tr>
        <td>Jumlah Kelurahan</td>
        <td>: <?php echo $sly['jmlkel']; ?></td>
    </tr>
    <tr>
        <td>Aksesibilitas</td>
        <td>: <?php echo $sly['aksesibilitas']; ?></td>
    </tr>
    <tr>
        <td valign='top'>Kondisi Kecamatan Secara Umum</td>
        <td>: <?php echo $sly['umum']; ?></td>
    </tr>
</table>