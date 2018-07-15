<?php
include "../mod/koneksi.php";
include "../mod/fungsi.php";
$id = abs($_GET['id']);
$sly = getAllData($id,"kab","selayangkab");
?>
<h2 class='title'>Selayang Pandang</h2>
<table class='table'>
    <tr>
        <td>Nama Kabupaten</td>
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
        <td>Daftar Pemimpin</td>
        <td>: <?php echo $sly['daftarpemimpin']; ?></td>
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
        <td>Tempat Terkenal</td>
        <td>: <?php echo $sly['tmpterkenal']; ?></td>
    </tr>
    <tr>
        <td valign='top'>Produk Unggulan</td>
        <td>: <?php echo $sly['produkunggulan']; ?></td>
    </tr>
    <tr>
        <td>Tempat Wisata</td>
        <td>: <?php echo $sly['wisata']; ?></td>
    </tr>
    <tr>
        <td>PAD</td>
        <td>: <?php echo $sly['pad']; ?></td>
    </tr>
</table>