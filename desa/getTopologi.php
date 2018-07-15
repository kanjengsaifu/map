<?php
include "../mod/koneksi.php";
include "../mod/fungsi.php";
$id = abs($_GET['id']);
$topo = getAllData($id,"desa","tipologi");
?>
<h2 class='title'>Topologi</h2>
<table class='table'>
    <tr>
        <td>Jenis Hamparan</td>
        <td>: <?php echo $topo['jenishamparan']; ?></td>
    </tr>
    <tr>
        <td>Ketinggian Tempat</td>
        <td>: Terendah <?php echo $topo['terendah']; ?>, Tertinggi <?php echo $topo['tertinggi']; ?> DPL</td>
    </tr>
    <tr>
        <td>Topografi</td>
        <td>: <?php echo $topo['topografi']; ?></td>
    </tr>
    <tr>
        <td>Perkembangan Desa</td>
        <td>: <?php echo $topo['perkembangandesa']; ?></td>
    </tr>
    <tr>
        <td>Status</td>
        <td>: <?php echo $topo['status']; ?></td>
    </tr>
    <tr>
        <td>Aksesibilitas</td>
        <td>: <?php echo $topo['aksesibilitas']; ?></td>
    </tr>
    <tr>
        <td>Akses Belanja</td>
        <td>: <?php echo $topo['aksesbelaja']; ?></td>
    </tr>
    <tr>
        <td colspan='2'>Deskripsi</td>
    </tr>
    <tr>
        <td colspan='2'><?php echo $topo['deskripsi']; ?></td>
    </tr>
</table>