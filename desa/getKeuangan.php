<?php
include "../mod/koneksi.php";
include "../mod/fungsi.php";
$id = abs($_GET['id']);
$uang = getAllData($id,"desa","keu");
?>
<h2 class='title'>Keuangan Desa</h2>
<table class='table'>
    <tr>
        <td>PADes</td>
        <td>: Rp. <?php echo rp($uang['pades']); ?></td>
    </tr>
    <tr>
        <td>Swadaya</td>
        <td>: Rp. <?php echo rp($uang['swadaya']); ?></td>
    </tr>
    <tr>
        <td>Dana Desa</td>
        <td>: Rp. <?php echo rp($uang['dd']); ?></td>
    </tr>
    <tr>
        <td>Alokasi Dana Desa</td>
        <td>: Rp. <?php echo rp($uang['adds']); ?></td>
    </tr>
    <tr>
        <td>Provinsi</td>
        <td>: Rp. <?php echo rp($uang['prov']); ?></td>
    </tr>
    <tr>
        <td>Bantuan Kabupaten</td>
        <td>: Rp. <?php echo rp($uang['kab']); ?></td>
    </tr>
    <tr>
        <td>Bagi Hasil Pajak</td>
        <td>: Rp. <?php echo rp($uang['pajak']); ?></td>
    </tr>
    <tr>
        <td>Belanja</td>
        <td>: Rp. <?php echo rp($uang['belanja']); ?></td>
    </tr>
    <tr>
        <td>SILPA Tahun Sebelumnya</td>
        <td>: Rp. <?php echo rp($uang['silpa']); ?></td>
    </tr>
    <tr>
        <td>Bantuan Modal ke BUMDES</td>
        <td>: Rp. <?php echo rp($uang['modal']); ?></td>
    </tr>
    <tr>
        <td>Jenis BUMDES</td>
        <td>: <?php echo ($uang['bumdes']); ?></td>
    </tr>
    <tr>
        <td>Nilai Aset BUMDES</td>
        <td>: Rp. <?php echo rp($uang['aset']); ?></td>
    </tr>
    <tr>
        <td>Omset BUMDES per Tahun</td>
        <td>: Rp. <?php echo rp($uang['omset']); ?></td>
    </tr>
</table>