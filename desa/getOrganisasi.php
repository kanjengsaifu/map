<?php
include "../mod/koneksi.php";
include "../mod/fungsi.php";
$id = abs($_GET['id']);
$org = getAllData($id,"desa","orgkades");
?>
<h2 class='title'>Struktur Organisasi Desa</h2>
<table class='table'>
    <tr>
        <td>Nama Kades</td>
        <td>: <?php echo $org['namakades']; ?></td>
    </tr>
    <tr>
        <td>Sekdes</td>
        <td>: <?php echo $org['sekdes']; ?></td>
    </tr>
    <tr>
        <td>Kaur Umum</td>
        <td>: <?php echo $org['kaurumum']; ?></td>
    </tr>
    <tr>
        <td>Kaur Keuangan</td>
        <td>: <?php echo $org['kaurkeuangan']; ?></td>
    </tr>
    <tr>
        <td>Kaur Perencanaan</td>
        <td>: <?php echo $org['kaurperencanaan']; ?></td>
    </tr>
    <tr>
        <td>Bendahara</td>
        <td>: <?php echo $org['bendahara']; ?></td>
    </tr>
    <tr>
        <td>Kasie Kesejahteraan</td>
        <td>: <?php echo $org['kasikesra']; ?></td>
    </tr>
    <tr>
        <td>Kasie Pemerintahan</td>
        <td>: <?php echo $org['kasipem']; ?></td>
    </tr>
    <tr>
        <td>Kasie Pelayanan</td>
        <td>: <?php echo $org['kasi']; ?></td>
    </tr>
    <tr>
        <td>BPD</td>
        <td>: <?php echo $org['bpd']; ?></td>
    </tr>
    <tr>
        <td>Ketua</td>
        <td>: <?php echo $org['ketuabpd']; ?></td>
    </tr>
    <tr>
        <td>Wakil Ketua</td>
        <td>: <?php echo $org['ketuabpd']; ?></td>
    </tr>
    <tr>
        <td>Sekertaris</td>
        <td>: <?php echo $org['sekretaris']; ?></td>
    </tr>
    <tr>
        <td>Anggota</td>
        <td>: <?php echo $org['anggotabpd1']; ?></td>
    </tr>
    <tr>
        <td>Anggota</td>
        <td>: <?php echo $org['anggotabpd2']; ?></td>
    </tr>
    <tr>
        <td>Anggota</td>
        <td>: <?php echo $org['anggotabpd3']; ?></td>
    </tr>
    <tr>
        <td>Anggota</td>
        <td>: <?php echo $org['anggotabpd4']; ?></td>
    </tr>
    <tr>
        <td>Anggota</td>
        <td>: <?php echo $org['anggotabpd5']; ?></td>
    </tr>
    <tr>
        <td>Anggota</td>
        <td>: <?php echo $org['anggotabpd6']; ?></td>
    </tr>
    <tr>
        <td>LPM</td>
        <td>: <?php echo $org['lpm']; ?></td>
    </tr>
    <tr>
        <td>Ketua</td>
        <td>: <?php echo $org['ketualpm']; ?></td>
    </tr>
    <tr>
        <td>Sekertaris</td>
        <td>: <?php echo $org['sekretarislpm']; ?></td>
    </tr>
    <tr>
        <td>Bendahara</td>
        <td>: <?php echo $org['bendaharalpm']; ?></td>
    </tr>
    <tr>
        <td>Anggota</td>
        <td>: <?php echo $org['anggotalpm1']; ?></td>
    </tr>
    <tr>
        <td>Anggota</td>
        <td>: <?php echo $org['anggotalpm2']; ?></td>
    </tr>
    <tr>
        <td>Anggota</td>
        <td>: <?php echo $org['anggotalpm3']; ?></td>
    </tr>
</table>