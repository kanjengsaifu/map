<?php
include "../mod/koneksi.php";
include "../mod/fungsi.php";
$id = abs($_GET['id']);
$s = mysql_query("select * from orgkeca where kec = '$id' order by id asc");
?>
<h2 class='title'>Struktur Organisasi Kecamatan</h2>
<table class='table'>
    <tr>
        <td>No.</td>
        <td>NIP</td>
        <td>Nama Lengkap</td>
        <td>Jabatan</td>
    </tr>
    <?php
    $no = 1;
    while($d = mysql_fetch_array($s)){
    ?>
    <tr>
        <td><?php echo $no; ?></td>
        <td><?php echo $d['NIP']; ?></td>
        <td><?php echo $d['nama_pejabat']; ?></td>
        <td><?php echo $d['nama_jabatan']; ?></td>
    </tr>
    <?php
        $no++;
    }
    ?>
</table>