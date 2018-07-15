<?php
include "../mod/koneksi.php";
include "../mod/fungsi.php";
$id = abs($_GET['id']);
$sosek = getAllData($id,"desa","sosek");
?>
<h2 class='title'>Topologi</h2>
<table class='table'>
    <tr>
        <td>Jumlah KK Miskin</td>
        <td>: <?php echo $sosek['jmlkk']; ?></td>
    </tr>
    <tr>
        <td>Jumlah Yatim Piatu</td>
        <td>: <?php echo $sosek['jmlyatim']; ?></td>
    </tr>
    <tr>
        <td>Lansia</td>
        <td>: <?php echo $sosek['lansia']; ?></td>
    </tr>
    <tr>
        <td>Rutilahu</td>
        <td>: <?php echo $sosek['rutilahu']; ?></td>
    </tr>
    <tr>
        <td>Anak Terlantar</td>
        <td>: <?php echo $sosek['terlantar']; ?></td>
    </tr>
    <tr>
        <td>KDRT</td>
        <td>: <?php echo $sosek['kdrt']; ?></td>
    </tr>
    <tr>
        <td>Penerimaan Raskin/Tahun</td>
        <td>: <?php echo $sosek['raskin']; ?></td>
    </tr>
</table>